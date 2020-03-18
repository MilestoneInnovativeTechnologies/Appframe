<template>
    <div class="form-group">
        <div class="input-group input-group-sm input-group-alt">
            <input type="text" class="form-control" placeholder="Search record" v-model.lazy="term" @keyup.enter="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <BTN icon="search" size="xs" type="btn-outline-info" class="bg-transparent py-0 border-0" @click="search">&nbsp;</BTN>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex'
    const { mapState,mapMutations,mapActions } = createNamespacedHelpers('SRLS');
    export default {
        name: "AppContentListSearch",
        props: ['id'],
        computed: {
            action(){ return this.$route.params.action },
            term: {
                ...mapState({ get(state){ return state.list[this.id].term } }),
                set(term){ this.setTerm({ id:this.id,term }); }
            },
        },
        methods: {
            ...mapActions([ 'post' ]), ...mapMutations([ 'setTerm','setPage' ]),
            search(){ let term = _.trim(this.term); if(_.isEmpty(term)) return; this.post({ action:this.action,term }); this.setPage({ page:1,id:this.id }) }
        }
    }
</script>