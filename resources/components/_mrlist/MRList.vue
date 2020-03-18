<template>
    <transition name="fade">
        <AppContentNotification v-if="notification" icon="bullhorn" title="Update Success" content="Data successfully updated" @click="clearRelationUpdate"></AppContentNotification>
        <div class="section" v-else>
            <MRSelected :properties="properties" :dataListId="dataListId" :data="selected" :layout="layout"></MRSelected>
            <div class="text-right"><BTN @click.prevent="submit"> Update </BTN></div>
            <div class="section-block mb-0 clearfix"><h2 class="section-title font-weight-bold pb-0 w-50 float-left"> Available </h2>
                <MRListFilter class=" w-50 float-right" @text="filter_text = $event"></MRListFilter>
            </div>
            <MRAvailable :properties="properties" :dataListId="dataListId" :data="filtered" :layout="layout"></MRAvailable>
        </div>
    </transition>
</template>

<script>
    import { mapState,mapMutations,mapActions } from 'vuex';
    export default {
        name: "MRList",
        props: ['layout','data','dataListId','properties'],
        data(){ return { filter_text: '' } },
        computed: {
            route(){ return this.$route.params },
            ...mapState('LIST',{ notification:(state) => state.relation_update }),
            selected(){ return _.pick(this.data,this.properties.current) },
            available(){ return _.omit(this.data,this.properties.current) },
            filtered(){ return (this.filter_text) ? _.pickBy(this.available,(obj) => _.includes(_.join(_.values(obj),'|'),this.filter_text)) : this.available }
        },
        methods: {
            ...mapMutations('LIST',['delListRelationUpdate']),
            clearRelationUpdate(){ this.delListRelationUpdate() },
            ...mapActions('LIST',['updateRelation']),
            submit(){ this.updateRelation({ action:this.route.action,id:this.route.id,list:this.properties.list,relation:this.properties.relation }) }
        },
        beforeDestroy(){ this.clearRelationUpdate() }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>
