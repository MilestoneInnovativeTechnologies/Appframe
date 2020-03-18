
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./axios');
require('./framework');

require('./store');
require('./router');
require('./components');

global.VueApp = new Vue({
    el: '#app',
    store: AppVuexStore,
    router: AppVueRouter,
    beforeCreate(){ $("#slow_connection_page_loading").remove(); },
    created(){
        let vuex = this.$store, checks = ['_actions','_mutations'], items = {
            'requestInterceptor': { action:'addInterceptor',type:'request' },
            'responseInterceptor': { action:'addInterceptor',type:'response' },
            'beforeEachRoute': { action:'addRouteHook',type:'beforeEach' },
            'afterEachRoute': { action:'addRouteHook',type:'afterEach' },
        };
        _.forEach(vuex._modulesNamespaceMap,function(Obj,Module) {
            let init = Module + 'init'; if(vuex._actions[init]) vuex.dispatch(init).then(null); if(vuex._mutations[init]) vuex.commit(init);
            if(vuex.state[_.replace(Module,"/",'')] && vuex.state[_.replace(Module,"/",'')].handler) _.forEach(vuex.state[_.replace(Module,"/",'')].handler,function(item,type){ vuex.commit('addHandler',{ type,item,module:Module }) });
            _.forEach(items, function ({action, type}, mItem) {
                let item = Module + mItem;
                _.forEach(checks, function (check) {
                    if (vuex[check][item]){
                        vuex.commit(action, {type, item});
                        return false;
                    }
                })
            });
        });
    },
});
