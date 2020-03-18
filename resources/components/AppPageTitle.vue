<template>
    <div class="d-md-flex align-items-md-start"><h1 class="page-title"> {{ title }} </h1></div>
</template>

<script>
    import { mapGetters,mapMutations } from 'vuex';
    export default {
        name: "AppPageTitle",
        computed: {
            action(){ return this.$route.params.action },
            id(){ return this.$route.params.id },
            ...mapGetters('PTTL',{ getTitle:'title' }),
            title(){ let title = this.getTitle(this.action,this.id); this.setTitles(title); return title; },
        },
        methods: {
            ...mapMutations('PTTL',{ setPageTitle:'setTitle' }),
            ...mapMutations('HSTR',{ setHistoryTitle:'setTitle' }),
            setTitles(title){ this.setPageTitle(title); if(title) this.setHistoryTitle(title) }
        }
    }
</script>

<style scoped>
    .pagetitle-enter-active, .pagetitle-leave-active { transition: all 0.2s linear; }
    .pagetitle-leave-active { position: absolute; }
    .pagetitle-enter { transform: translateX(1rem); opacity: 0; }
    .pagetitle-leave, .pagetitle-enter-to { transform: translateX(0); opacity: 1; }
    .pagetitle-leave-to { transform: translateX(-3rem); opacity: 0;}
</style>