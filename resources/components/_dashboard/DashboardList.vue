<template>
    <transition name="fade">
        <ListLoading v-if="!list" bts="2" cls="2"></ListLoading>
        <BSList v-else :data-list-id="id" :layout="layout" :data="list"></BSList>
    </transition>
</template>

<script>
    import { mapActions,mapGetters,mapState } from 'vuex';
    export default {
        name: "DashboardList",
        props: ['ids'],
        computed: {
            id() { return this.ids['idn1'] }, action(){ return this.$route.params.action },
            ...mapGetters('LIST', { getList:'list', getLayout:'layout'}),
            list(){ return this.getList(this.id) },
            layout(){ return this.getLayout(this.id) },
            request(){ return { action:this.action,item:'List',item_id:this.id } },
        },
        methods: {
            ...mapActions('LIST',['post'])
        },
        created(){
            if(!this.list) this.post({ ...(this.request),'item_action':'fetch' }); else this.post({ ...(this.request),'item_action':'update' });
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>