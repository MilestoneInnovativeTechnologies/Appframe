<template>
    <section class="fabcontent">
        <FAButton @click="modal = true" v-show="fabStatus" :icon="fabIcon"></FAButton>
        <FABModal @close="modal = false" :rslv="fabRsln" :action="fabAction" :record="routeId" :instance="instance"></FABModal>
    </section>
</template>

<script>
    import { mapState,mapActions } from 'vuex';
    export default {
        name: "FABContent",
        data(){ return {
            instance: null,
            modal: false,
            icon: { List:'plus',ListRelation:'plus',Data:'edit' },
            target: { List:'Form',Data:'FormWithData',ListRelation:'AddRelation' },
            params: { List:['action'],Data:['action','id'],ListRelation:['action','id'] },
            paramData: { action:'fabAction',id:'routeId' },
        }},
        computed: {
            ...mapState('ACTN',['float']), ...mapState('RSLV',['actions']),
            routeAction(){ return _.get(this.$route,['params','action']) },
            routeId(){ return _.get(this.$route,['params','id']) },
            routeType(){ return _.get(this.actions,[this.routeAction,'type']) },
            fabAction(){ return _.get(this.float,this.routeAction) },
            fabIcon(){ return _.get(this.icon,this.routeType) },
            request(){ let vm = this, params = vm.params[vm.routeType]; return _.zipObject(params,_.map(params,(p) => vm[vm.paramData[p]])) },
            fabRsln(){ return _.get(this.actions,this.fabAction) },
            mode(){ return (_.isNil(this.fabAction) || this.fabRsln === null) ? 'ignore' : ((this.fabRsln === undefined) ? 'fetch' : 'proceed'); },
            fabStatus(){ return (this.mode === 'proceed' && this.modal === false) },
        },
        methods: {
            ...mapActions(['post']),
        },
        watch: {
            modal(status){ this.instance = status ? new Date().getTime() : this.instance; Vue.nextTick(function(){ $('#FABModal').modal(['hide','show'][_.toInteger(status)]); }); },
            mode:{ deep:true, handler: function(value){ if(value === 'fetch') this.post(this.request) } },
            fabAction:{ deep:true, handler:function(action){ this.instance = (action) ? new Date().getTime() : this.instance } },
        },
    }
</script>
