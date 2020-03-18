const state = {
    store: {},
    updated: {},
    sections: {},
    handler: {
        'Data': 'addData',
        'DataDetails' : 'addView'
    }
};

const actions = {
    fetch({ dispatch },request){
        dispatch('post',request,{ root:true })
    },
    update({ getters,dispatch },request){
        request['last_updated'] = getters.updated(request.data,request.id);
        dispatch('post',request,{ root:true });
    }
};

const mutations = {
    addData({ store,updated },{ Data }){
        _.forEach(Data,(Obj,id) => {
            if(_.isNil(store[id])) { Vue.set(store,id,{}); Vue.set(updated,id,{}); }
            if(Obj){
                Vue.set(store[id],_.get(Obj,'id'),Obj);
                Vue.set(updated[id],_.get(Obj,'id'),Obj.updated_at);
            }
        })
    },
    addView(state,{ DataDetails }){
        let id = _.keys(DataDetails)[0], sections = getExtractSectionAndItems(DataDetails[id].sections);
        state.sections = Object.assign({},state.sections,_.fromPairs([[id,sections]]));
    },
};

const getters = {
    record({ store }){ return (data,id) => _.get(store,[data,id],null) },
    updated({ updated }){ return (data,id) => _.get(updated,[data,id],null) },
    section({ sections }){ return (data) => _.get(sections,data) },
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}

function getExtractSectionAndItems(data) {
    return _.map(data,function(obj){
        let secObj = _.pick(obj,['title','title_field','colspan']);
        secObj['relation'] = getRelationMethod(obj.relation);
        let items = _(obj.items).keyBy('label').mapValues(function(itemObj){ obj = _.pick(itemObj,['attribute']);
        obj.relation = getRelationMethod(itemObj.relation); return obj; }).value() ;
        return Object.assign(secObj,{ items });
    })
}
function getRelationMethod(relation){
    return (relation) ? _.snakeCase(relation.method) : null;
}