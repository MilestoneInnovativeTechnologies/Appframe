const state = {
    store: {},
    handler: {
        MetricDetails: 'addMetricDetails',
        Metric: 'setMetricData',
    },
};

const actions = {
    post({ dispatch },request){ dispatch('post',request,{ root:true }); },
    addMetricDetails({ commit },{ MetricDetails }){
        _.each(MetricDetails,(metric,id) => {
            let data = _.pick(metric,['id','name','method','type','field','field_sub','cache','time']);
            commit('storeMetricDetails',{ id,data });
        })
    },
};

const mutations = {
    storeMetricDetails(state,{ id,data }){ state.store = Object.assign({},state.store,_.zipObject([id],[data])) },
    setMetricData({ store },{ Metric }){ _.each(Metric,(data,id) => Vue.set(store[id],'data',data) ) }
};

const getters = {
    metric:(state) => (id) => state.store[id],
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}