<template>
    <component v-if="resolution && types.indexOf(contentType) > -1" :is="component" :idns="contentIdns" class="align-items-end ml-auto"></component>
</template>

<script>
    export default {
        name: "AppContentAction",
        data(){ return { types:['List','Data','ListRelation'] }},
        computed: {
            action(){ return this.$store.getters.contentAction('AppContent'); },
            resolution(){ return this.$store.getters.resolution(this.action) },
            contentType(){ return this.resolution.type },
            contentIdns(){ return _(this.resolution).omit('type').values().value() },
            component(){ return ['App','Content',this.contentType,'Action'].join(''); },
        }
    }
</script>