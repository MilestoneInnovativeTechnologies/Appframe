<template>
    <transition name="fade">
        <ListLoading v-if="!data"></ListLoading>
        <BSList v-else :data-list-id="id" :layout="layout" :data="data"></BSList>
    </transition>
</template>

<script>
    import { mapActions,mapGetters,mapState } from 'vuex';
    export default {
        name: "AppList",
        props: ['dataIds'],
        computed: {
            id(){ return this.dataIds['idn1'] }, action(){ return this.$route.params.action },
            ...mapGetters('LIST',{ getList:'list',getLayout:'layout' }), ...mapGetters('PGNT',{ getDetails:'list',listItems:'items' }),
            ...mapGetters('SRLS',{ srcItems:'items' }),
            ...mapState('SRLS',{ src_page({ list }){ return list[this.id].page }, src_term({ list }){ return list[this.id].term } }),
            list(){ return this.getList(this.id) }, layout(){ return this.getLayout(this.id) },
            details(){ return this.getDetails(this.id) },
            list_items(){ return this.listItems(this.id) },
            src_items(){ return this.getPageItems(this.srcItems(this.id),this.src_page,this.details.items) },
            is_search(){ return this.src_term && !_.isEmpty(_.trim(this.src_term)) }, items(){ return (this.is_search) ? this.src_items : this.list_items },
            fetchable(){ return _.difference(_.map(this.items,_.toString),_.keys(this.list)) },
            data(){ return _.pick(this.list,this.items); },
        },
        methods: {
            getPageItems(items,page,perpage){ return _.get(_.chunk(items,perpage),page-1,[]); },
            ...mapActions('LIST',{ updateList: 'update',post: 'post' }),
        },
        created(){
            this.updateList(this.action);
        },
        watch: {
            fetchable(get){ if(!_.isEmpty(get)) this.post({ action:this.action,get }) }
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>