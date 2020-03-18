const state = {
    AppContent: null,
    resource: null,
    FabContent: null,
};

const actions = {
    beforeEachRoute({ state,commit },{ to }){
        if(to && to.meta && to.meta.target) commit('setContentAction',{ content:to.meta.target,action:to.params.action });
        commit('proceedRoute',null,{ root:true });
    },
    afterEachRoute({ rootGetters,commit },{ to }){
        commit('setResource',rootGetters.actionResource(to.params.action));
    },
};

const mutations = {
    setContentAction(state,{ content,action }){ state[content] = action; },
    setResource(state,resource){ state.resource = resource; },
};

const getters = {
    resolution(state,getters,rootState,rootGetters){ return (action) => rootGetters.resolution(action); },
    action(state){ return (target) => state[target]; }
};

export default {
    namespaced: true,
    state, getters, actions, mutations
};
