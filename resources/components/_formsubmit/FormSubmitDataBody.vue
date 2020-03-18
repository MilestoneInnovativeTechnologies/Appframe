<template>
    <component :is="component" :title="title | read" :description="description"></component>
</template>

<script>
    export default {
        name: "FormSubmitDataBody",
        props: ['title','description'],
        computed: {
            type(){ let content = this.description; return _.isArray(content) ? 'List' : _.isObject(content) ? 'Sub' : 'Plain' },
            component(){ return 'FormSubmitData' + this.type; }
        },
        filters: {
            read(text){ return _.upperCase(text.replace(/\W|\_/g,' ')); }
        }
    }
</script>