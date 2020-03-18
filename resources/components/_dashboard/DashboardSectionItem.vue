<template>
    <div :class="['col-'+item.size]">
        <component :is="component" v-bind="{ ids }"></component>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "DashboardSectionItem",
        props: ['dashboard','section','id'],
        computed: {
            ...mapGetters('DBRD',{ getItem:'item' }),
            item(){ return this.getItem(this.id) },
            component(){ return ['Dashboard',this.item.item].join('') },
            ids(){ return { idn1:this.item.item_id,idn2:this.item.item_id2 } }
        },
    }
</script>