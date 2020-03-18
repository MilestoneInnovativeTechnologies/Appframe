<template>
    <textarea class="form-control" v-model.lazy="value"></textarea>
</template>

<script>
    export default {
        name: "BSFormFieldTextarea",
        mixins: [require('./../../../js/common/BSFormFieldValueMixin').fieldValueMixin],
        inheritAttrs: false,
    }
</script>