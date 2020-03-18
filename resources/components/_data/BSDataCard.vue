<template>
    <div class="card-body">
        <h1 class="card-title" v-if="heading">{{ heading }}</h1>
        <component :is="component" :record="data" :items="items"></component>
    </div>
</template>

<script>
    export default {
        name: "BSDataCard",
        props: ['dataRecord','title_field','title','relation','items','colspan'],
        computed: {
            heading(){ return this.title_field ? _.get(this.dataRecord,this.title_field) : this.title },
            data(){ return this.relation ? _.get(this.dataRecord,this.relation) : this.dataRecord },
            component(){ return _.isArray(this.data) ? 'BSDataCardList' : 'BSDataCardItems' }
        },
    }
</script>

<style scoped>

</style>