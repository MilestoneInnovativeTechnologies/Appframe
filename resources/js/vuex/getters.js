import * as VX from '../common/Vuex';

export default {

    config(state){ return state.serverConfig; },
    response(state){ return state.serverResponse; },

    logout(state){ return state.logout_url },
    profile(state){ return state.profile_url },
    user(state){ return _.pick(state.data,['name','email']); },
    groups(state){ return VX.getKeyedObject(state.data.groups,'id',['name','title']) },
    roles(state){ return VX.getKeyedObject(VX.extractPropertyFromAll(state.data.groups,'roles'),'id',['name','title']) },

    pageLoading(state){ return state.PAGE.loading; },

    _resources(state){ return VX.extractPropertyFromAll(state.data.groups,['roles','resources']) },
    resources(state,getters){ return _.mapValues(_.keyBy(getters._resources,'resource.id'),'resource.title') },

    _actions(state,getters){ return _.flatMap(getters._resources,'actions') },

    resolution(state,getters){ return (action) => getters['RSLV/resolution'](action) },
    contentAction(state,getters){ return (content) => getters['CONT/action'](content) },
    criteriaAction(state,getters){ return (criteria) => getters['RSLV/action'](criteria) },

    pageTitle(state,getters){ return getters['PTTL/current'] },

    actionResource(state,getters){ return (action) => getters['ACTN/resource'](action) },

    data(state,getters){ return (dataId,recordId) => getters['DATA/record'](dataId,recordId) },

}