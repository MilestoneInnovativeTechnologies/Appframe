const state = {
    handler: {
        Form: 'newForm',
        Validation: 'newValidation',
        FormSubmitData: ['addFormSubmitData','showResponsePage'],
        DependValue: 'addFormFieldData',
    },
    forms: {},
    layout:{},
    data: {},
    defaultdata: {},
    invalids: {},
    submitting: {},
    collection: {},
    collectiondata: {},
    submit: {},
};

const actions = {

    newForm({ commit,dispatch },{ Form }){
        _.forEach(Form,(Obj,id) => {
            let form = _.pick(Obj,['name','title','action_text']), fields = getFieldExtract(Obj.fields), data = getValueExtract(fields);
            form['fields'] = fields;
            commit('storeForm',{ id,form,data,defaultdata:_.cloneDeep(data),invalids:getInvalidExtract(fields),layout:getLayoutExtract(Obj.layout,Obj.fields) });
            if(Obj.collections && !_.isEmpty(Obj.collections)) dispatch('addCollection',{ form:id,Collection:Obj.collections })
        });
    },

    submit({ state,commit,dispatch },{ form,action,record }){
        let data = state.data[form];
        if(!_.isEmpty(state.collection[form])) _.each(state.collection[form],(details,collection) => _.set(data,collection,state.collectiondata[details.form][collection]) );
        commit('submitting',{ form,status:true });
        dispatch('post', { data,action,form,record }, { root:true });
    },

    newValidation({ getters,commit },{ Validation }){
        _.each(Validation,(validation,form) => {
            if(!validation.status && !_.isEmpty(validation.errors)){
                _.forEach(validation.errors,function(invalids,field){
                    let value = getters.value(form,field), text = invalids[0];
                    commit('addInvalid',{ form,field,value,text });
                })
            }
            commit('submitting',{ form,status: false })
        })
    },

    loadOptions({ getters,commit,dispatch },payload){
        let item = { type:'List', item: getters.form.fields[payload.field].options.resource_list };
        commit('setRequestItems', item, { root:true });
        dispatch('SPST/postRequestServer', null, { root:true });
    },

    showResponsePage({ rootGetters,dispatch },{ _response_data }){
        if(_response_data.request.action != rootGetters["CONT/action"]('AppContent')) return;
        let request = _response_data.request, name = 'form-submit-' + (request.record ? 'update' : 'new'),
            params = { action:request.action,form:request.form,record:request.record,id:request.record };
        dispatch('navigate', { name,params }, { root:true });
    },

    addCollection({ dispatch,commit },{ form,Collection }){
        _.each(Collection,(collection) => {
            dispatch('newForm',{ Form:_.zipObject([collection.collection_form],[collection.form]) });
            commit('addCollection',{ form,collection });
        })
    },

    addFormFieldData({ commit },{ DependValue }){
        _.each(DependValue,(FieldValue,form) => _.each(FieldValue,(value,field) => commit('updateValue',{ form,field,value })))
    },

    post({ dispatch },request){ dispatch('post',request,{ root:true }); }

};

const mutations = {
    storeForm(state,payload){
        let id = payload.id, submitting = {};
        submitting[id] = false;
        Vue.set(state.forms,id,payload.form);
        _.each(['layout','data','invalids','defaultdata'],(itm) => Vue.set(state[itm],id,payload[itm]));
        state.submitting = Object.assign({},state.submitting,submitting);
    },
    updateValue({ data },{ form,field,value }){ let curVal = data[form][field]; data[form][field] = _.isArray(curVal) ? _(_.concat(curVal,value)).compact().uniq().map(_.toString).value() : value; },
    updateDefaultData({ defaultdata },{ form,field,value }){ let curVal = defaultdata[form][field]; defaultdata[form][field] = _.isArray(curVal) ? [value] : value; },
    removeValue({ data },{ form,field,value }){ (_.isArray(data[form][field]) && _.includes(data[form][field],value)) ? data[form][field].splice(_.indexOf(data[form][field],value),1) : data[form][field] = '' },
    addInvalid(state,{ form,field,value,text }){ Vue.set(state.invalids[form][field],value,text); },
    submitting(state,{ form,status }){ state.submitting[form] = status },
    addFormSubmitData(state,{ FormSubmitData }){ let id = _.keys(FormSubmitData)[0]; if(!state.submit[id]) state.submit = Object.assign({},state.submit,_.fromPairs([[id,null]])); state.submit[id] = FormSubmitData[id]; },
    delFormSubmitData(state,id){ state.submit[id] = null; },
    reset(state,id){ Vue.set(state.data,id,_.cloneDeep(state.defaultdata[id])) },
    addCollection(state,{ form,collection }){
        if(!state.collection[form]) Vue.set(state.collection,form,{});
        let cForm = collection.form.id, cRel = collection.relation ? _.snakeCase(collection.relation.method) : null, skip = collection.foreign_field ? getFieldNameFromId(collection.foreign_field,collection.form.fields) : null;
        let cObj = Object.assign({},{ form:cForm },{ skip });
        if(!state.collectiondata[cForm]) Vue.set(state.collectiondata,cForm,{});
        Vue.set(state.collection[form],cRel,cObj); Vue.set(state.collectiondata[cForm],cRel,{});
    },
    addCollectionValue(state,{ parent,form,collection,id }){
        let data = _.omit(_.clone(state.data[form]),state.collection[parent][collection].skip);
        _.each(state.data[form],(val,name) => Vue.set(state.data[form],name,_.isArray(val) ? [] : ''));
        Vue.set(state.collectiondata[form][collection],id,data)
    },
    delCollectionValue(state,{ form,collection,id }){
        Vue.delete(state.collectiondata[form][collection],id);
    },
    delAllCollectionValue(state,{ form,collection }){
        Vue.set(state.collectiondata[form],collection,{});
    }
};

const getters = {
    form(state){ return (id) => state.forms[id] },
    layout(state){ return (id) => state.layout[id] },
    value(state){ return (formId,fieldName) => state.data[formId][fieldName] },
    invalid(state,getters){
        return function(formId,fieldName){
            return (state.invalids &&
                state.invalids[formId] &&
                state.invalids[formId][fieldName] &&
                state.invalids[formId][fieldName][getters.value(formId,fieldName)])
                ? state.invalids[formId][fieldName][getters.value(formId,fieldName)]
                : null;
        }
    },
    submitting(state){ return (formId) => state.submitting[formId] },

    list(state,getters,rootState){ return function(field){
        let listId = getters.form.fields[field].options.resource_list;
        return (rootState.LIST.store && rootState.LIST.store[listId])
            ? rootState.LIST.store[listId].data
            : null;
    } },
    getSubmit(state){ return (id) => state.submit[id] },
    collection(state){ return (id) => state.collection[id] },
    collectiondata(state){ return (form,collection) => (collection) ? state.collectiondata[form][collection] : state.collectiondata[form] },
    option(state,getters){ return (form,field) => getters.form(form).fields[field].options },
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}

function getFieldExtract(fieldsObj){
    return _(fieldsObj).flatMapDepth(function(v){
        return _.merge(
            _.pick(v,['name','value','type','label','id']),
            _(v.attributes).keyBy('name').mapValues(V => V.value).value(),
            { options:_.omit(v.options,['created_at','updated_at']) },
            { depends:_.map(v.depends,(depend) => _.pick(depend,['depend_field','ignore_null'])) },
            { dynamics:_.map(v.dynamics,(dynamic) => _.omit(dynamic,['created_at','updated_at'])) },
        )
    },1).keyBy('name').value();
}

function getValueExtract(fields){
    let ArrayValues = ['checkbox','multiselect'];
    return _.mapValues(fields,function(obj){
        return _.includes(ArrayValues,obj.type) ? [] : ''
    });
}

function getInvalidExtract(fields){
    return _.mapValues(fields,function(){
        return { '': null };
    });
}

function getLayoutExtract(layout,fields){
    if(_.isEmpty(layout)) return [];
    let Fields = _(fields).keyBy('id').mapValues('name').value();
    return _(layout).keyBy(function(l){ return Fields[l.form_field] }).mapValues('colspan').value();
}

function getFieldNameFromId(id,fields) {
    return _.chain(fields).find((field) => field.id == id).pick('name').value().name || null;
}
