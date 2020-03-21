<template>
    <select v-bind="data_attrs" :name="name" v-model="value" class="custom-select" :id="control_id">
        <option v-for="(label,value) in options" :value="value" :key="['SO',dataFormId,name,value].join('-')">{{ label }}</option>
    </select>
</template>

<script>
    import { mapState,mapGetters,mapMutations,mapActions } from 'vuex';
    export default {
        name: "BSFormFieldSelect",
        props:['dataFormId','name','id'],
        data(){ return {
            toggle: 'select2', minimumResultsForSearch: 12, allowClear: true, placeholder: '',
            dataAttrs: ['toggle','minimumResultsForSearch','allowClear','placeholder'],
        }},
        mixins: [require('./../../../js/common/BSFormFieldValueMixin').fieldValueMixin,require('./../../../js/common/BSFormFieldDependMixin').fieldDependMixin],
        computed: {
            ...mapState({ asset_root:(state) => _.replace(_.join(['/',_.trim(state.root_path,["\\","/"]),'/appframe/'],''),'//','/') }),
            ...mapGetters('FORM',{ getOption:'option' }),
            ...mapGetters('FOPT',{ getOptions:'get',getLatest:'latest' }),
            data_attrs(){ let vm = this; return _.transform(vm.dataAttrs,(obj,attr) => _.set(obj,'data-'+_.kebabCase(attr),vm[attr]),{}) },
            select2Jq(){ return $(`select#${this.control_id}`) },
            option(){ return this.getOption(this.dataFormId,this.name); },
            option_id(){ return this.option ? this.option.id : null },
            options(){ return this.getOptions(this.option_id); },
            control_id(){ return [this.name,this.dataFormId,this.id].join('_') },
            init_value(){ return this.value || ((this.option.type === 'Enum' && this.options) ? _.head(_.keys(this.options)) : (_.has(this.$attrs,'multiple') ? [] : null)) }
        },
        methods: {
            ...mapActions('FOPT',{ fetchOptions:'fetch' }), ...mapMutations('FORM',['updateDefaultData']),
            select2Init(){
                let vm = this;
                $.fn.select2.defaults.set("width", "100%");
                this.select2Jq
                    .select2(this.select2Jq.data())
                    .on('select2:select',function(e){ vm.value = e.params.data.id; })
                    .on('select2:unselect',function(e){ vm.unvalue = e.params.data.id; });
                if(!_.isEmpty(this.init_value)) this.select2Jq.val(this.init_value).trigger('change');
            },
            select2Destroy(){ try { this.select2Jq.select2('destroy'); } catch(e){ } },
            select2Reload(){ this.select2Destroy(); this.select2Init(); },
            optionsChanged(options){
                if(this.option.type === 'Enum' && _.isEmpty(this.value)) { this.value = _.head(_.keys(options)); this.updateDefaultData({ form:this.dataFormId,field:this.name,value:this.value }) }
                else if(!_.isEmpty(this.value)) $(`select#${this.control_id}`).val(this.value).trigger('change');
                if(this.depends_has) this.select2Reload();
            }
        },
        created(){
            if(!$('script[name="select2"]').length) $('head:first').append([$('<script>').attr({ name:'select2',src:this.asset_root+'js/select2.min.js' }),$('<link>').attr({ name:'select2',rel:'stylesheet',href:this.asset_root+'css/select2.min.css' })]);
            if(this.option.preload === 'Yes' && (!this.options || this.option.type !== 'Enum')) this.fetchOptions({ id:this.option_id,latest:this.getLatest(this.option_id) });
        },
        beforeDestroy () {
            this.select2Destroy();
        },
        mounted(){
            this.select2Init();
        },
        watch: {
            options: {
                immediate: true, deep: true, handler: 'optionsChanged'
            }
        }
    }
</script>
