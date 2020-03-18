<template>
    <AppContentListSearch v-if="active" :id="id" class="mr-auto my-0"></AppContentListSearch>
</template>

<script>
    export default {
        name: "AppListSearch",
        computed: {
            action(){ return this.$route.params.action }, resolution(){ return this.$store.getters.resolution(this.action) },
            type(){ return this.resolution.type }, active(){ return this.resolution && this.type === 'List' },
            id(){ return this.resolution.idn1 },
        }
    }
</script>