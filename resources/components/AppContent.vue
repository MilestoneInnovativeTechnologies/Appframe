<template>
    <div class="appcontent"><component v-if="component" :is="component" :data-ids="idns" :key="$route.fullPath"></component></div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex'
    const { mapState,mapGetters } = createNamespacedHelpers('CONT');
    export default {
        name: "AppContent",
        computed: {
            ...mapState({ action:'AppContent' }),
            ...mapGetters(['resolution']),
            component(){ return (this.resolution(this.action)) ? 'App' + this.resolution(this.action)['type'] : null },
            idns(){ return (this.resolution(this.action)) ? _.omit(this.resolution(this.action),['type','method']): null },
        }
    }
</script>

<style scoped>
    .appcontent-enter-active, .appcontent-leave-active { transition: all 0.4s linear; }
    .appcontent-leave-active { position: absolute; left: 32px; right: 32px; }
    .appcontent-enter { transform: scale(1.1,1.1); opacity: 0; }
    .appcontent-leave, .appcontent-enter-to { transform: scale(1,1); opacity: 1; }
    .appcontent-leave-to { transform: scale(0,0); opacity: 0; }
</style>