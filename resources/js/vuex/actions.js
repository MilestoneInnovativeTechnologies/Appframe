export default {

    serverRequestInterceptor({ state,dispatch },config){
        let methods = state.serverInterceptors.request;
        _.forEach(methods,function(method){ dispatch('runModuleMethod',{ method,payload:config }) });
    },

    serverResponseInterceptor({ state,dispatch },response){
        let methods = state.serverInterceptors.response;
        _.forEach(methods,function(method){ dispatch('runModuleMethod',{ method,payload:response }) });
    },

    serverResponseError({ dispatch },error){
        dispatch('AUTH/responseError',error.response.data)
    },

    routeHook({ state,dispatch,commit },payload){
        commit('updateRoute',payload);
        let methods = state.routeHooks[payload.type];
        _.forEach(methods,function(method){ dispatch('runModuleMethod',{ method,payload }) });
        if(_.isEmpty(methods) && payload.next) payload.next();
    },

    handleResponseData({ state,dispatch },data){
        _.forEach(_.keys(data),function(prop){
            if(state.handler[prop] && !_.isEmpty(state.handler[prop])) {
                let payload = { _response_data:data }; payload[prop] = data[prop];
                _.forEach(state.handler[prop], (method) => dispatch('runModuleMethod', { method, payload }))
            }
        })
    },

    runModuleMethod({ dispatch,commit },{ method,payload }){
        if(this._actions[method]) dispatch(method,payload);
        else if(this._mutations[method]) commit(method,payload)
    },

    post({ dispatch },request){
        dispatch('SRVR/post',request);
    },

    navigate(ctx,{ name,params }){
        VueApp.$router.push({ name,params })
    }

};
