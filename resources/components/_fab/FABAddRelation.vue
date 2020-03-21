<template>
    <BSForm :name="name" :fields="fields" :layout="layout" :data-form-id="dataFormId" :class="sclass"></BSForm>
</template>

<script>
    import { mapMutations } from 'vuex'
    export default {
        name: "FABAddRelation",
        props: ['name','dataFormId','sclass','record','foreign'],
        computed: {
            foreignField(){ return _(this.$attrs.fields).filter(({ id }) => id == this.foreign).get(0).name },
            fields(){ return _.omit(this.$attrs.fields,this.foreignField) },
            layout(){ return _.omit(this.$attrs.layout,this.foreignField) },
        },
        methods: mapMutations('FORM',['updateValue']),
        created(){ this.updateValue({ form:this.dataFormId,field:this.foreignField,value:this.record }) }
    }
</script>