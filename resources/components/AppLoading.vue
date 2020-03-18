<template>
    <div class="loading-container" v-show="loading">
        <div class="app-loading"></div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        name: "AppLoading",
        computed:mapState('PAGE',{
            loading: state => state.loading,
            backdrop: function(){ return App[(this.loading?'open':'close')+'Backdrop']().hasClass('show'); }
        })
    }
</script>

<style scoped>
    .loading-container .app-loading {display: block;position: fixed;z-index: 1030;top: 4.5rem;right: 1rem;width: 1.25rem;height: 1.25rem;border: 3px solid transparent;border-top-color: #00a28a;border-left-color: #00a28a;border-radius: 1rem;-webkit-animation: load-spinner .4s linear infinite;animation: load-spinner .4s linear infinite;}
    @-webkit-keyframes load-spinner { 0% {-webkit-transform: rotate(0deg);transform: rotate(0deg)} to {-webkit-transform: rotate(1turn);transform: rotate(1turn)} }
    @keyframes load-spinner { 0% {-webkit-transform: rotate(0deg);transform: rotate(0deg)} to {-webkit-transform: rotate(1turn);transform: rotate(1turn)} }
</style>