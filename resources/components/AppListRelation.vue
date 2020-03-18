<template>
    <transition name="fade">
        <ListLoading v-if="!data"></ListLoading>
        <BSList v-else :data-list-id="list" :layout="layout" :data="data"></BSList>
    </transition>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapActions,mapGetters } = createNamespacedHelpers('LIST');
    export default {
        name: "AppListRelation",
        props: ['dataIds'],
        computed: {
            list(){ return this.dataIds['idn2'] }, relation(){ return this.dataIds['idn1'] },
            record(){ return this.$route.params.id }, action(){ return this.$route.params.action },
            ...mapGetters({ getList:'list',getLayout:'layout',getRelation:'relation' }),
            lists(){ return this.getList(this.list) },
            relations(){ return this.getRelation(this.list,this.relation,this.record) },
            data(){ return _.pick(this.lists,this.relations); },
            layout(){ return this.getLayout(this.list) || this.defaultLayout(this.data) },
            request(){ return { action:this.action,id:this.record,data:true } }
        },
        methods: {
            ...mapActions({ post: 'post' }),
            fetchRelation(){ this.post(this.request) },
            fetchList(get){ this.post({ ...(this.request),get }) }
        },
        created(){
            this.fetchRelation();
        },
        watch: {
            relations(relations){
                let get = _.difference(_.map(relations,_.toString),_.keys(this.data));
                if(this.relations && !_.isEmpty(get)) this.fetchList(get);
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>