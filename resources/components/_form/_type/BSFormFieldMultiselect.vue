<template>
    <BSFormFieldSelect v-bind="props" multiple></BSFormFieldSelect>
</template>

<script>
    export default {
        name: "BSFormFieldMultiselect",
        inheritAttrs: false,
        computed: {
            props(){ return this.$attrs },
        },
    }
</script>
