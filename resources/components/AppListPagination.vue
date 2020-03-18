<template>
    <AppContentListPagination v-if="active" v-bind="vbind" class="my-0"></AppContentListPagination>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        name: "AppListPagination",
        computed: {
            action(){ return this.$route.params.action }, resolution(){ return this.$store.getters.resolution(this.action) },
            contentType(){ return this.resolution.type }, active(){ return this.resolution && this.contentType === 'List' },
            id(){ return this.resolution.idn1 },
            ...mapState('PGNT',{
                perpage({ list }){ return list[this.id].items },
                list_page({ list }){ return list[this.id].page },
                list_count({ list }){ return list[this.id].count },
            }),
            ...mapState('SRLS',{
                src_term({ list }){ return list[this.id].term },
                src_page({ list }){ return list[this.id].page },
                src_count({ items }){ return _.size(items[this.id][this.src_term]) },
                src_pages(){ return Math.ceil(this.src_count/this.perpage) },
            }),
            obj(){ return _.isEmpty(_.trim(this.src_term)) ? 'list_' : 'src_' },
            page(){ return this[this.obj+'page'] }, total(){ return this[this.obj+'count'] }, pages(){ return Math.ceil(this.total/this.perpage) },
            vbind(){ return { list:this.id,page:this.page,pages:this.pages,search:!_.isEmpty(_.trim(this.src_term)) } }
        }
    }
</script>