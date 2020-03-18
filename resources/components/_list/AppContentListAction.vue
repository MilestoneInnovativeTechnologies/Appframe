<template>
    <div class="btn-toolbar mt-1 mt-md-0" v-if="visible">
        <ListAction v-for="actn in contentActions" v-bind="actn" :list-id="id" :key="['list',id,'action',actn.id].join('-')" :confirm="getConfirm(actn.id)"></ListAction>
        <ListActionWarning></ListActionWarning>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "AppContentListAction",
        props: ['idns'],
        computed: {
            id(){ return this.idns[0] },
            ...mapGetters('ACTN',{ getActions:'actions',getConfirm:'confirm' }),
            contentActions(){ return this.getActions('List',this.id) },
            visible(){ return this.contentActions && !_.isEmpty(this.contentActions) },
        }
    }
</script>