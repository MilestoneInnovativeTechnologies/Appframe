<template>
    <input type="file"  @input="input" class="form-control-file" :name="name" />
</template>

<script>
    export default {
        name: "BSFormFieldFile",
        props: ['name'],
        mixins: [require('./../../../js/common/BSFormFieldValueMixin').fieldValueMixin,require('./../../../js/common/BSFormFieldDependMixin').fieldDependMixin],
    }
</script>