<template>
    <BSForm :name="name" :fields="fields" :layout="layout" :data-form-id="dataFormId" :class="sclass"></BSForm>
</template>

<script>
    import { mapMutations } from 'vuex'
    export default {
        name: "FABAddRelation",
        props: ['name','dataFormId','sclass','record'],
        computed: {
            foreign(){ return _.head(_.keys(this.$attrs.fields)) },
            fields(){ return _.omit(this.$attrs.fields,this.foreign) },
            layout(){ return _.omit(this.$attrs.layout,this.foreign) },
        },
        methods: mapMutations('FORM',['updateValue']),
        created(){ this.updateValue({ form:this.dataFormId,field:this.foreign,value:this.record }) }
    }
</script>