<template>
    <div class="modal fade" id="FABModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-overflow modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                </div>
                <div class="modal-body">
                    <component :is="component" v-bind="bind" @dlu="dlu = $event"></component>
                </div>
                <div class="modal-footer">
                    <BTN type="warning" @click="closeModal">Close</BTN>
                    <BTN type="primary" @click="submit">{{ formActionText }}</BTN>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapGetters,mapMutations,mapActions } = createNamespacedHelpers('FORM');
    export default {
        name: "FABModal",
        props: ['rslv','action','record','instance'],
        data(){ return {
            true: true, dlu: null,
            rslvId: { form: { Form:'idn1',FormWithData:'idn1',AddRelation:'idn2' },data: { FormWithData:'idn2' },relation:{ AddRelation:'idn1' },foreign:{ AddRelation:'idn3' } },
            map: {
                Form: { c:'BSForm',b:{ name:'formName',fields:'formFields',layout:'layout','data-form-id':'formId','class':'formClass' },a:{ action:'routeAction',update:'true' } },
                FormWithData: { c:'FABFormWithData',b:{ name:'formName',fields:'formFields',layout:'layout','data-form-id':'formId','class':'formClass',rslv:'rslv',recordId:'record',key:'instance' },a:{ action:'routeAction',data:'dataId',id:'record',last_updated:'dlu' } },
                AddRelation: { c:'FABAddRelation',b:{ name:'formName',fields:'formFields',layout:'layout','data-form-id':'formId','sclass':'formClass',record:'record',key:'instance',foreign:'foreignId' },a:{ action:'routeAction',id:'record',data:'true' } },
            },
        }},
        computed: {
            ...mapGetters({ getForm:'form',getLayout:'layout',getSubmit:'getSubmit' }),
            routeAction(){ return _.get(this.$route,['params','action']) },
            type(){ return _.get(this.rslv,'type') }, formId(){ return _.get(this.rslv,_.get(this.rslvId,['form',this.type])) }, dataId(){ return _.get(this.rslv,_.get(this.rslvId,['data',this.type])) }, relationId(){ return _.get(this.rslv,_.get(this.rslvId,['relation',this.type])) }, foreignId(){ return _.get(this.rslv,_.get(this.rslvId,['foreign',this.type])) },
            form(){ return this.getForm(this.formId) }, formName(){ return _.get(this.form,'name') }, formFields(){ return _.get(this.form,'fields') }, layout(){ return this.getLayout(this.formId) },
            formActionText(){ return _.get(this.form,'action_text') }, formClass(){ return ['w-100'] },
            title(){ return _.get(this.form,'title') },
            component(){ return _.get(this.map,[this.type,'c']) },
            bind(){ let vm = this; return _.mapValues(_.get(vm.map,[vm.type,'b']),(cp) => vm[cp]) },
            submitData(){ return this.getSubmit(this.formId) },
        },
        methods: {
            ...mapActions({ formSubmit:'submit',post:'post' }), ...mapMutations(['delFormSubmitData','reset']),
            closeModal(){ this.$emit('close'); this.delFormSubmitData(this.formId); this.reset(this.formId);  },
            submit(){
                let vm = this, payload = { form:vm.formId,action:vm.action,record:vm.record };
                vm.formSubmit(payload);
            },
            update(){
                let vm = this;
                vm.post(_.mapValues(_.get(vm.map,[vm.type,'a']),(k) => vm[k]))
            }
        },
        watch: {
            submitData: { deep:true, handler: function(value){ if(value) { this.closeModal(); this.update() } } }
        }
    }
</script>

<style scoped>
    * { box-shadow: none !important; }
</style>