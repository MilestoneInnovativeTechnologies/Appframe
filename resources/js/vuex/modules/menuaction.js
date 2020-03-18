
const actions = {
    prepareAndSetRequest({ commit,rootState },payload){
        let Action = payload.to.params.Action,
            parent = refreshParents(rootState.request.head.parent),
            route_params = payload.from.params,
            source = { route: payload.from.name, component: null },
            relations = [], relate_items = {},
            data = {},
            request = { head: { parent, route_params, source, relations, relate_items }, data },
            type = 'setRequest';
        commit({ type, request }, { root:true });
    }
};

export default {
    namespaced: true,
    actions
}

function refreshParents(Obj){
    if(!hasParentProperty(Obj)) return {};
    return _.merge({},{ parent:refreshParents(Obj.parent) });
}
function hasParentProperty(Obj){
    return Obj.hasOwnProperty('parent');
}