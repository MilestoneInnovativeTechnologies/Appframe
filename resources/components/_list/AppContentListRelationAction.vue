<template>
    <component is="AppContentListAction" :idns="listId"></component>
</template>

<script>
    export default {
        name: "AppContentListRelationAction",
        props: ['idns'],
        computed: {
            listId(){ return [this.idns[1]] }
        }
    }
</script>