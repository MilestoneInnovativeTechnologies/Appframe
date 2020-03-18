<template>
    <textarea readonly class="form-control-plaintext">{{ value }}</textarea>
</template>

<script>
    export default {
        name: "BSFormFieldStatictextarea",
        mixins: [require('./../../../js/common/BSFormFieldValueMixin').fieldValueMixin],
        inheritAttrs: false,
    }
</script>