<template>
    <transition name="fade">
        <FormSubmitData v-if="submitData" :data="submitData" :notify="true" :form="formId"></FormSubmitData>
        <AppForm v-else-if="record" :data-ids="dataIds"></AppForm>
        <FormLoading v-else></FormLoading>
    </transition>
</template>

<script>
    import { mapGetters,mapMutations,mapActions } from 'vuex'
    export default {
        name: "AppFormWithData",
        props: ['dataIds'],
        computed: {
            formId(){ return this.dataIds['idn1'] },
            dataId(){ return this.dataIds['idn2'] },
            ...mapGetters('FWDM',['map']),
            recordId(){ return this.$route.params.id },
            action(){ return this.$route.params.action },
            ...mapGetters('FORM',{ getForm: 'form',getSubmit:'getSubmit' }),
            fields(){ return this.getForm(this.formId).fields },
            submitData(){ return this.getSubmit(this.formId) },
            ...mapGetters('DATA',{ getRecord: 'record', getUpdated: 'updated' }),
            record(){ return this.getRecord(this.dataId,this.recordId) },
            updated(){ return this.getUpdated(this.dataId,this.recordId) },
            maps(){ return this.map(this.formId,this.dataId) },
        },
        methods: {
            ...mapMutations('FORM',{ setValue: 'updateValue', resetForm: 'reset' }),
            ...mapActions(['post']),
            setFormValue(data){
                let vm = this, form = vm.formId, maps = vm.maps; _.forEach(vm.fields,function(Obj,field){
                    let map = (_.isNil(maps)) ? null : _.get(maps,Obj.id,null),
                        value = _.isNil(map) ? _.get(data,field,null) : _.get(data,_.compact(_.concat(_.split(map.relation,'.'),map.attribute)),null);
                    value = _.isArray(value) ? _.map(value,'id') : value;
                    vm.setValue({ form,field:field,value });
                });
            }
        },
        created(){ this.post({ data:this.dataId,id:this.recordId,action:this.action,last_updated:this.updated }); },
        beforeDestroy(){ this.resetForm(this.formId); },
        watch: {
            record: { immediate:true, deep:true, handler:function(data){ this.setFormValue(data); } },
        },
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>