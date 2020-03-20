<template>
    <textarea readonly class="form-control-plaintext">{{ value }}</textarea>
</template>

<script>
    export default {
        name: "BSFormFieldStatictextarea",
        mixins: [require('./../../../js/common/BSFormFieldValueMixin').fieldValueMixin,require('./../../../js/common/BSFormFieldDependMixin').fieldDependMixin],
        inheritAttrs: false,
    }
</script>