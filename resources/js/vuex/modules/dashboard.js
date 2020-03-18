const state = {
    store: {},
    section: {},
    item: {},
    handler: {
        Dashboard: 'addDashboard',
    }
};

const actions = {
    addDashboard({ commit },{ Dashboard }){
        _.each(Dashboard,(dashboard,id) => {
            let data = _.pick(dashboard,['name','method','title']); data['sections'] = _.map(dashboard.sections,'id'); commit('storeDashboard',{ id,data });
            _.each(dashboard.sections,(section) => {
                let { id,name,title,height } = section; commit('storeSection',{ id,data:{ name,title,height,items:_.map(section.items,'id') } });
                _.each(section.items,(_item) => {
                    let { id,title,size,item,item_id,item_id2 } = _item; commit('storeItem',{ id,data:{ title,size,item,item_id,item_id2 } });
                })
            })
        })
    },
};

const mutations = {
    storeDashboard(state,{ id,data }){ state.store = Object.assign({},state.store,_.zipObject([id],[data])) },
    storeSection(state,{ id,data }){ state.section = Object.assign({},state.section,_.zipObject([id],[data])) },
    storeItem(state,{ id,data }){ state.item = Object.assign({},state.item,_.zipObject([id],[data])) },
};

const getters = {
    dashboard:(state) => (id) => state.store[id],
    section:(state) => (id) => state.section[id],
    item:(state) => (id) => state.item[id],
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}