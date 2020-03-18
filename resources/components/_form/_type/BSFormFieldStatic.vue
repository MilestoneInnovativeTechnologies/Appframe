<template>
    <input type="text" readonly :value="value" class="form-control-plaintext" />
</template>

<script>
    export default {
        name: "BSFormFieldText",
        props: ['type','name','dataFormId'],
        mixins: [
            require('./../../../js/common/BSFormFieldValueMixin').fieldValueMixin,
            require('./../../../js/common/BSFormFieldDependMixin').fieldDependMixin
        ]
    }
</script>