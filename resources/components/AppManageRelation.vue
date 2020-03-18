<template>
    <transition name="fade">
        <ListLoading v-if="!data"></ListLoading>
        <template v-else>
            <MRList :data-list-id="list" :layout="layout" :data="data" :properties="property"></MRList>
        </template>
    </transition>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapActions,mapGetters } = createNamespacedHelpers('LIST');
    export default {
        name: "AppManageRelation",
        props: ['dataIds'],
        computed: {
            list(){ return this.dataIds['idn2'] }, relation(){ return this.dataIds['idn1'] },
            ...mapGetters({ getList:'list',getLayout:'layout',getRelation:'relation' }),
            data(){ return this.getList(this.list) }, layout(){ return this.getLayout(this.list) },
            action(){ return this.$route.params.action }, record(){ return this.$route.params.id },
            current(){ return _.map(this.getRelation(this.list,this.relation,this.record),_.toString) },
            property(){ return { list:this.list,relation:this.relation,record:this.record,current:this.current } }
        },
        methods: mapActions(['post']),
        created(){
            this.post({ action:this.action,id:this.record,update:true  });
        },
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>
