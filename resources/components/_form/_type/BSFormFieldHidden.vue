<template>
    <input type="hidden" :name="name" v-model.lazy="value" class="form-control" />
</template>

<script>
    export default {
        name: "BSFormFieldHidden",
        props: ['name','dataFormId'],
        mixins: [
            require('./../../../js/common/BSFormFieldValueMixin').fieldValueMixin,
            require('./../../../js/common/BSFormFieldDependMixin').fieldDependMixin
        ]
    }
</script>