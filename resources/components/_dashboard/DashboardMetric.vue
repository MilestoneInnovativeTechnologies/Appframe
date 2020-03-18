<template>
    <transition name="fade">
        <MetricLoading v-if="!metric"></MetricLoading>
        <component v-else :is="component" v-bind="metric"></component>
    </transition>
</template>

<script>
    import { mapActions,mapGetters,mapState } from 'vuex';
    export default {
        name: "DashboardMetric",
        props: ['ids'],
        computed: {
            id() { return this.ids['idn1'] }, action(){ return this.$route.params.action },
            ...mapGetters('MTRC', { getMetric:'metric' }),
            metric(){ return this.getMetric(this.id) },
            component(){ return this.metric ? [_.upperFirst(this.metric.type),'Metric'].join('') : null },
            request(){ return { action:this.action,item:'Metric',item_id:this.id } },
        },
        methods: {
            ...mapActions('MTRC',['post'])
        },
        created(){
            if(!this.metric) this.post({ ...(this.request),'item_action':'fetch' });
        },
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>