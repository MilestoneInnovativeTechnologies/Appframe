<template>
    <div class="dashboard">
        <DashboardSection  v-for="section in dashboard.sections" :id="section" :dashboard="id" :key="['DBRD',id,'SCT',section].join('-')"></DashboardSection>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "AppDashboard",
        props: ['dataIds'],
        computed: {
            id(){ return this.dataIds['idn1'] },
            ...mapGetters('DBRD',{ getDashboard:'dashboard' }),
            dashboard(){ return this.getDashboard(this.id) }
        },
    }
</script>