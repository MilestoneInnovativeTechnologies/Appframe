const state = {
    store: {},
    handler: {
        ListRelation: ['checkAndFetchAddRelation'],
        AddRelationAction: ['setRelationFloats']
    },
    display: {},
    menu: {},
    list: {},
    data: {},
    confirm: {},
    resource: {},
    defaults: {},
    float: {},
    on: {},
};

const actions = {
    init({ rootGetters,commit,dispatch }){
        _.forEach(rootGetters._actions,function(action){ _.forEach(actionRunCommits,(mutation) => commit(mutation,action)); });
        commit('setDefaults',_(rootGetters._resources).map('resource.defaults').filter().keyBy('resource').mapValues((O) => _.pick(O,['list','create','read','update']) ).value());
        dispatch('setFloats')
    },
    action({ dispatch },payload){
        dispatch('navigate',payload,{ root:true });
    },
    setFloats({ commit,state }){
        let actions = _(state.store).keys().map(_.toString).value(), maps = { list:'create',read:'update' };
        _.forEach(state.defaults,(defaults) => {
            let data = _.mapValues(defaults,_.toString);
            _.forEach(maps,(d,s) => {
                if(_.includes(actions, data[s]) && _.includes(actions, data[d])) commit('setFloat',{ from:data[s],to:data[d] })
            })
        })
    },
    checkAndFetchAddRelation({ dispatch },{ ListRelation,_response_data }){
        if(!_response_data.Resolve) return;
        _.forEach(_response_data.Resolve,(rslv) => dispatch('post',{ action:'getaddrelations',relation:rslv.idn1,referer:_response_data.request.action },{ root:true }))
    },
    setRelationFloats({ commit,state },{ AddRelationAction }){
        let actns = _(state.store).keys().map(_.toString).value();
        _.forEach(AddRelationAction,(relActionsObj,from) => _.forEach(relActionsObj,(actions) => _.map(actions,(to) => (_.includes(actns,_.toString(to))) ? commit('setFloat',{ from,to }) : null)))
    }
};

const mutations = {
    storeAction(state,{ id,name,description,title }){ state.store = Object.assign({},state.store,_.fromPairs([[id,{ id,name,description,title }]])); },
    setDisplay(state,{ id,type,icon,set,title }){ state.display = Object.assign({},state.display,_.fromPairs([[id,{ id,type,icon,set,title }]])); },
    setMenu(state,{ id,resource,menu }){ if(!menu) return; if(!state.menu[resource]) state.menu = Object.assign({},state.menu,_.fromPairs([[resource,[]]])); state.menu[resource].push({ id,resource,menu }) },
    setResourceActions(state,{ id,resource }){
        if(!state.resource[resource]) state.resource = Object.assign({},state.resource,_.zipObject([resource],[[]]));
        state.resource[resource].push(id);
    },
    setListActions(state,{ id,lists }){ if(_.isEmpty(lists)) return;
        _.forEach(lists,function({ resource_list }){ if(!state.list[resource_list]) state.list = Object.assign({},state.list,_.fromPairs([[resource_list,[]]])); state.list[resource_list].push(id); })
    },
    setDataActions(state,{ id,data }){ if(_.isEmpty(data)) return;
        _.forEach(data,function({ resource_data }){ if(!state.data[resource_data]) state.data = Object.assign({},state.data,_.fromPairs([[resource_data,[]]])); state.data[resource_data].push(id); })
    },
    setConfirm(state,{ id,confirm }){ if(!confirm) return; state.confirm = Object.assign({},state.confirm,_.fromPairs([[id,confirm]])) },
    setOnStatement(state,{ id,on }){ if(!on) return; state.on = Object.assign({},state.on,_.fromPairs([[id,on]])) },
    setDefaults(state,data){ state.defaults = Object.assign({},state.defaults,data) },
    setFloat(state,{ from,to }){ Vue.set(state.float,from,to) },
};

const getters = {
    actions(state){ return (content,id) => _.mapValues(state[_.lowerCase(content)][id],(action) => state.display[action]); },
    confirm(state){ return (id) => state.confirm[id] },
    on(state){ return (id) => state.on[id] },
    resource(state){ return (action) => _.findKey(state.resource,(actions) => _.includes(actions,_.toInteger(action))); },
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}

const actionRunCommits = [
    'storeAction','setDisplay','setMenu','setResourceActions','setListActions','setDataActions','setConfirm','setOnStatement'
];