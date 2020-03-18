<template>
    <div class="section-block">
        <h1 class="section-title pt-0" v-if="section.title">{{ section.title }}</h1>
        <div class="form-row" :style="{ minHeight:section.height+'px' }">
            <DashboardSectionItem v-for="item in section.items" v-bind="{ dashboard,id:item,section:id }" :key="['DBRD',dashboard,'SCT',id,'ITM',item].join('-')"></DashboardSectionItem>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "DashboardSection",
        props: ['dashboard','id'],
        computed: {
            ...mapGetters('DBRD',{ getSection:'section' }),
            section(){ return this.getSection(this.id) }
        },
    }
</script>