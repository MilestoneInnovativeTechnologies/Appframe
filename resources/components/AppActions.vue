<template>
    <component :is="component" :dataItemId="dataItem"></component>
</template>

<script>
    export default {
        name: "AppActions",
        props: ['dataType','dataItem'],
        computed: {
            component(){ return _.capitalize(this.dataType) + 'Actions' }
        }
    }
</script>