<template>
    <transition name="fade">
        <FormLoading v-if="!form"></FormLoading>
        <FormSubmitData v-else-if="submitData" :data="submitData" :notify="true" :form="id"></FormSubmitData>
        <BSForm v-else :name="form.name" :fields="fields" :layout="layout" :data-form-id="id" :data-action-text="form.action_text"></BSForm>
    </transition>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapGetters,mapMutations } = createNamespacedHelpers('FORM');
    export default {
        name: "AppAddRelation",
        props: ['dataIds'],
        computed: {
            id(){ return this.dataIds['idn2'] }, record(){ return this.$route.params.id }, list(){ return this.$route.params.list }, foreign_field_id(){ return _.get(this.dataIds,'idn3') },
            ...mapGetters({ getForm:'form',getLayout:'layout',getSubmit:'getSubmit' }),
            form(){ return this.getForm(this.id) },
            foreign(){ return _.findKey(this.form.fields,Obj => Obj.id == this.foreign_field_id) },
            fields(){ return _.omit(this.form.fields,this.foreign) },
            layout(){ return _.omit(this.getLayout(this.id),this.foreign) },
            submitData(){ return this.getSubmit(this.id) },
        },
        methods: mapMutations(['updateValue']),
        created(){
            if(this.form && this.foreign) this.updateValue({ form:this.id,field:this.foreign,value:this.record })
        },
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>
