const state = {
    store: {},
    handler: {
        'FormDataMap': 'addMap',
    }
};

const getters = {
    map: ({ store }) => (form,data) => _.get(store,[form,data],null),
};

const actions = {
    addMap({ state,commit },{ FormDataMap }){
        _.forEach(FormDataMap,(mAry,form) => {
            if(_.isNil(state.store[form])) commit('addForm',{ form });
            let data = _.get(_.head(mAry),'resource_data',null); if(!data) return;
            if(_.isNil(state.store[form][data])) commit('addFormData',{ form,data });
            _.forEach(mAry,(fdmObj) => {
                commit('addField',{ form,data,field:fdmObj.form_field,attribute:fdmObj.attribute,relation:fdmObj.relation })
            })
        });
    }
};

const mutations = {
    addForm: ({ store },{ form }) => _.isNil(store[form]) ? Vue.set(store,form,{}) : true,
    addFormData: ({ store },{ form,data }) => _.isNil(store[form][data]) ? Vue.set(store[form],data,{}) : true,
    addField: ({ store },{ form,data,field,attribute,relation }) => Vue.set(store[form][data],field,{ attribute,relation }),
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}