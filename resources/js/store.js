
import getters from './vuex/getters'
import mutations from './vuex/mutations'
import actions from './vuex/actions'

const vuexModules = {
    'AUTH': 'authentication',
    'PAGE': 'page',
    'RSLV': 'resolve',
    'SRVR': 'server',
    'CONT': 'content',
    'FORM': 'form',
    'LIST': 'list',
    'DATA': 'data',
    'ACTN': 'actions',
    'PTTL': 'pagetitle',
    'HSTR': 'history',
    'FOPT': 'fieldoption',
    'PGNT': 'pagination',
    'SRLS': 'searchlist',
    'DBRD': 'dashboard',
    'MTRC': 'metrics',
    'FFRM': 'fileform',
    'FWDM': 'formwithdatamap',
};

const modules = {
    ..._.mapValues(vuexModules,(Path) => require('./vuex/modules/' + Path + '.js').default)
};

global.AppVuexStore = new Vuex.Store({
    state: {
        ...(window.VuexStoreState),
        ...require('./vuex/state').default,
    },
    getters, mutations, actions,
    modules
});
