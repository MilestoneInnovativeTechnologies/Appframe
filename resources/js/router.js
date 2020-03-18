
const components = {
    appcontent: require('../components/AppContent').default,
    fabcontent: require('../components/FABContent').default,
};

const props = new Object({ ..._.mapValues(components,()=>true) });

const routes = [
    { path: '/action/:action', meta:{ target:'AppContent' }, name: 'menu-action', props, components },
    { path: '/action/:action/record/:id', meta:{ target:'AppContent' }, name: 'list-action', props, components },
    { path: '/action/:action/record/:id', meta:{ target:'AppContent' }, name: 'data-action', props, components },
    { path: '/action/:action/form/:form/submit/new', meta:{ target:'AppContent' }, name: 'form-submit-new', props, components },
    { path: '/action/:action/form/:form/submit/update/:record', meta:{ target:'AppContent' }, name: 'form-submit-update', props, components },
];

global.AppVueRouter = new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: 'has-active'
});
AppVueRouter.beforeEach(function(to, from, next){ CallVueAppStoreAction({ type:'beforeEach', to, from, next }); });
AppVueRouter.afterEach((to,from) => CallVueAppStoreAction({ type:'afterEach', to, from }));

const CallVueAppStoreAction = function(payload){
    if(window.VueApp && window.VueApp.$store) return window.VueApp.$store.dispatch('routeHook',payload);
    setTimeout(CallVueAppStoreAction,400,payload);
};
