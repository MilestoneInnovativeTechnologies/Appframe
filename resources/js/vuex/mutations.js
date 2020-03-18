export default {

    updateConfig(state, config) {
        state.serverConfig = Object.assign({}, config);
    },
    updateResponse(state, response) {
        state.serverResponse = Object.assign({}, response);
    },

    addInterceptor(state, payload) {
        state.serverInterceptors[payload.type].push(payload.item);
    },

    addRouteHook(state, payload) {
        state.routeHooks[payload.type].push(payload.item);
    },
    updateRoute(state, {to, from, next}) {
        if(next) state.route = Object.assign({}, {to, from, next})
    },
    proceedRoute(state) {
        state.route.next()
    },

    addHandler(state, payload) {
        if (!state.handler[payload.type]) state.handler[payload.type] = [];
        let methods = _.isArray(payload.item) ? _.map(payload.item, (item) => payload.module + item) : [payload.module + payload.item];
        state.handler[payload.type] = _.concat(state.handler[payload.type], methods);
    },

}