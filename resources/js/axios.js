
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

global.axios = require('axios');

let token = document.head.querySelector('meta[name="csrf-token"]');
if (!token) { console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token'); }

const axiosInstance = axios.create({
    baseURL: location.origin + "/" + (_.isEmpty(window.VuexStoreState.root_path) ? 'server' : _.trimEnd(window.VuexStoreState.root_path,'/') + '/server'),
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': token.content
    },
    validateStatus: function(status){ return status < 500; }
});

const interceptorErrorFunction = function (error) {
    window.VueApp.$store.commit('PAGE/loading',false);
    window.VueApp.$store.dispatch('serverResponseError', error).then(null);
    return Promise.reject(error);
};
axiosInstance.interceptors.request.use(function (config) {
    window.VueApp.$store.commit('updateConfig',config);
    window.VueApp.$store.dispatch('serverRequestInterceptor', config).then(null);
    return window.VueApp.$store.getters.config;
    } ,interceptorErrorFunction);
axiosInstance.interceptors.response.use(function (response) {
    window.VueApp.$store.commit('updateResponse',response);
    window.VueApp.$store.dispatch('serverResponseInterceptor', response).then(null);
    return window.VueApp.$store.getters.response;
    }, interceptorErrorFunction);

global.server = (params = null) => axiosInstance.post('',params);
