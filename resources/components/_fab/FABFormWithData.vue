<template>
    <BSForm v-bind="bind"></BSForm>
</template>

<script>
    import { mapGetters,mapMutations } from 'vuex'
    export default {
        name: "FABFormWithData",
        props: ['rslv','recordId'],
        computed: {
            formId(){ return _.get(this.rslv,['idn1']) },
            dataId(){ return _.get(this.rslv,['idn2']) },
            ...mapGetters('FWDM',['map']),
            ...mapGetters('DATA',{ getRecord: 'record', getUpdated: 'updated' }),
            record(){ return this.getRecord(this.dataId,this.recordId) },
            updated(){ return this.getUpdated(this.dataId,this.recordId) },
            maps(){ return this.map(this.formId,this.dataId) },
            bind(){ return _.clone(this.$attrs) }
        },
        methods: {
            ...mapMutations('FORM',{ setValue: 'updateValue' }),
            setFormValue(data){
                let vm = this, form = vm.formId, maps = vm.maps; _.forEach(vm.$attrs.fields,function(Obj,field){
                    let map = (_.isNil(maps)) ? null : _.get(maps,Obj.id,null),
                        value = _.isNil(map) ? _.get(data,field,null) : _.get(data,_.compact(_.concat(_.split(map.relation,'.'),map.attribute)),null);
                    value = _.isArray(value) ? _.map(value,'id') : value;
                    vm.setValue({ form,field,value });
                });
            }
        },
        watch: {
            record: { immediate:true, deep:true, handler:function(data){ this.setFormValue(data); } },
            updated: { immediate:true, deep:true, handler:function(data){ if(data) this.$emit('dlu',data); } },
        },
    }
</script>