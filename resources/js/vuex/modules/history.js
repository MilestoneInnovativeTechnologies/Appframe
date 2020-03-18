const state = {
    count: -1,
    routes: {},
    set: [],
};

const actions = {
    afterEachRoute({ state,rootGetters,commit,dispatch },{ to,from }){
        commit('increment'); commit('addRoute',to); if(!state.count || _.includes(discardRoutes,to.name)) return;
        if(to.name === 'list-action' && to.params.list) dispatch('setTitlePrepend',{ list:to.params.list,record:to.params.id });
        else if(_.includes(discardRoutes,from.name)){  }
        else if(to.name === 'menu-action') commit('addNewSet',rootGetters.resources[rootGetters.actionResource(to.params.action)]);
        dispatch('addToSet',to);
    },
    addToSet({ state,getters,commit },{ name,params }){
        let set = getters.set(), route = null; if(_.isEmpty(set)) commit('addNewSet','-');
        _.forEachRight(set,function(setItem,index){ if(!index) return; if(isRouteObjectsEqual({ name,params },_.pick(setItem,['name','params']))) { route = index; return false; } });
        if(route) commit('setNewSet',state.set[state.set.length-1].slice(0,route));
        commit('addToSet')
    },
    setTitlePrepend({ commit,rootGetters },{ list,record }){
        let List = rootGetters['LIST/list'](list), identifier = _.split(rootGetters['LIST/detail'](list).identity,'.');
        commit('setTitlePrepend',_.get(List,_.concat(record,identifier)));
    }
};

const mutations = {
    increment(state){ state.count++ },
    addRoute(state,to){ state.routes = Object.assign({},state.routes,_.zipObject([state.count],valuesToString([{ name:to.name,params:to.params,title:null }]))) },
    addNewSet(state,resource){ state.set.push([resource]) },
    addToSet(state){ let setInd = (state.set.length || 1)-1; state.set[setInd].push(state.count) },
    setTitle(state,title){ state.routes[state.count].title = title },
    setNewSet(state,set){ state.set.push(set) },
    setTitlePrepend(state,title){ Vue.set(state.routes[state.count],'prepend',title) },
};

const getters = {
    set(state){ return (n = null) => _.map(state.set[n === null ? state.set.length-1 : n],function(route,index){ return (index) ? state.routes[route] : route}) },
};

import { valuesToString } from '../../common/Vuex';
export default {
    namespaced: true,
    state, getters, actions, mutations
}

function isRouteObjectsEqual(Obj1,Obj2){
    let equal = true;
    _.forEach(Obj1,function(Val,Key){
        if(_.has(Obj2,Key) && typeof Val === typeof Obj2[Key]){
            if(_.isObject(Val)) equal = isRouteObjectsEqual(Val,Obj2[Key]);
            else equal = (Obj2[Key] == Val)
        } else equal = false;
        return equal;
    });
    return equal;
}

const discardRoutes = ['form-submit-new','form-submit-update'];