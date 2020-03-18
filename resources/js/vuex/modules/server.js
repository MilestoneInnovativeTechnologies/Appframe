const state = {
    queue: [],
    wait: false,
    timeout: 50,
};

const actions = {
    post({ commit,dispatch },request){ commit('queue',request); dispatch('process'); },
    responseInterceptor({ dispatch }){ dispatch('process') },
    process({ state,getters,commit,dispatch,rootGetters }){
        if(getters.queue && !rootGetters.pageLoading && state.wait === false){
            server(state.queue.shift()).then(function({ data }){ dispatch('handleResponseData',data,{ root:true }) });
            commit('wait',setTimeout(function({ dispatch,commit }){ commit('wait',false); dispatch('process') },state.timeout,{ dispatch,commit }))
        }
    }
};

const mutations = {
        queue(state,request){ state.queue.push(request); },
        wait(state,sec) { state.wait = sec },
    };

const getters = {
    queue(state){ return state.queue.length }
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}