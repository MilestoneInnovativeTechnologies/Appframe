<template>
    <thead><tr><th>&nbsp;</th><th v-for="(column,key) in columns" :key="['T'+dataListId,key].join('-')">{{ column }}</th></tr></thead>
</template>

<script>
    export default {
        name: "BSListTHead",
        props: ['columns','dataListId']
    }
</script>