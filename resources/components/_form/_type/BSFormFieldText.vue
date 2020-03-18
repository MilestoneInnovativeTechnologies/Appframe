<template>
    <input :type="type" :name="name" v-model.lazy="value" class="form-control" autocomplete="off" />
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