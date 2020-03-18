const state = {
    loading: false,
};

const actions = {
};

const mutations = {
    requestInterceptor(state){ state.loading = true; },
    responseInterceptor(state){ state.loading = false; },
    loading(state,payload){ state.loading = _.isObject(payload) ? (payload.loading || payload.status || payload.load) : payload; },
};

const getters = {
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}