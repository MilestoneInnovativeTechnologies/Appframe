<template>
    <ul class="pagination pagination-sm">
        <li class="page-item" :class="{ disabled:(page === 1) }"><a class="page-link" href="#" @click.prevent="goToPreviousPage()"><i class="fa fa-lg fa-angle-left"></i></a></li>
        <li class="page-item" :class="{ active:(page === no),disabled:(no === cont) }" v-for="no in range"><a class="page-link" href="#" @click.prevent="goToPage(no)">{{ no }}</a></li>
        <li class="page-item" :class="{ disabled:(page === pages) }"><a class="page-link" href="#" @click.prevent="goToNextPage()"><i class="fa fa-lg fa-angle-right"></i></a></li>
    </ul>
</template>

<script>
    import { mapState,mapMutations,mapActions } from 'vuex';
    export default {
        name: "AppContentListPagination",
        props: ['list','page','pages','search'],
        computed: {
            ...mapState('PGNT',['first','last','cont']),
            action(){ return this.$route.params.action },
            range(){ return getRange(getStartRange(this.page,this.pages,this.first,this.last),getEndRange(this.pages,this.last),this.cont) },
        },
        methods: {
            ...mapMutations('PGNT',['setPage']), ...mapMutations('SRLS',{ setSearchPage:'setPage' }), ...mapActions('PGNT',['post']),
            goToPage(page){ this.setPage({ list:this.list,page }); this.setPageAction(page); },
            goToPreviousPage(){ this.goToPage(this.page-1) }, goToNextPage(){ this.goToPage(this.page+1) },
            setPageAction(page){ return (this.search) ? this.setSearchPage({ id:this.list,page }) : this.loadPageItems(page) },
            loadPageItems(page){ this.post({ action:this.action,page }) }
        }
    }

    function getStartRange(page,pages,first,last){
        let start = (page + Math.ceil(first / 2)) - first; start = (pages <= (first + last) || start < 1) ? 1 : start;
        let end = start + first; end = (end >= pages) ? pages + 1 : end;
        return _.range(start,end);

    }

    function getEndRange(pages,last){
        let start = (pages - last) < 1 ? 1 : (pages - last);
        return _.range(start, pages)
    }

    function getRange(start,end,cont){
        if(_.head(start) !== 1) start.unshift(cont);
        if(_.head(end) - _.last(start) > 1) end.unshift(cont);
        else if(_.head(end) - _.last(start) < 1) end = _.difference(end,start);
        return _.concat(start,end);
    }
</script>