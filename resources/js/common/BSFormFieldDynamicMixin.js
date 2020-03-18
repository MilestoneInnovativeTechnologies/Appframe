import { createNamespacedHelpers } from 'vuex';
const { mapState,mapGetters } = createNamespacedHelpers('FORM');

export const fieldDynamicMixin = {

    props: ['dataFormId','name','parent','dynamics','id'],
    data(){
        return {
            dynamic_field_form:{},
            dynamic_field_class:{},
            dynamic_field_attrs:{},
            //dynamic_field_class:{ 'd-none':false },
            criteria: {
                visible:['dynamic_field_class','d-none',[false,true]],
                hidden:['dynamic_field_class','d-none',[true,false]],
                editable:['dynamic_field_attrs','readonly',[false,'readonly']],
                readonly:['dynamic_field_attrs','readonly',['readonly',false]],
                disabled:['dynamic_field_attrs','disabled',['disabled',false]],
                enabled:['dynamic_field_attrs','disabled',[false,'disabled']],
            }
        }
    },
    computed: {
        dynamics_has(){ return this.dynamics && !_.isEmpty(this.dynamics) },
        ...mapGetters({ getValue:'value' }),
        dynamic_field_values(){ let vm = this; return (!this.dynamics_has) ? {} : _.mapValues(vm.dynamic_field_form,function(form,field){ return (form) ? vm.getValue(form,field) : null })},
        //dynamic_field_classs(){ return { 'd-dgf':'tust' } }
    },
    methods: {
        ...mapState({
            getDynamicFieldForm({ data }){
                let dynamicFieldForm = {}, vm = this;
                _.each(this.dynamics,function(dynamic){
                    let field = dynamic.depend_field;
                    let form = _.includes(_.keys(data[vm.dataFormId]),field) ? vm.dataFormId : (_.includes(_.keys(data[vm.parent]),field) ? vm.parent : null);
                    _.set(dynamicFieldForm,field,form);
                });
                return dynamicFieldForm;
            }
        }),
        process_dynamics(data){
            let vm = this;
            _.each(vm.dynamics,dynamic => {
                let evaluate = vm.evaluate_dynamic_value(dynamic,data[dynamic.depend_field]);
                vm.process_output(dynamic.type.split('-')[0],_.toSafeInteger(evaluate))
            });
        },
        evaluate_dynamic_value(obj,val){
            let alteron = obj.alter_on;
            return (alteron === 'value')
                ? match_value(val,obj.value || _.split(obj.values,','),obj.operator)
                : ( (alteron === 'null') ? _.isNull(val) : !_.isNull(val) )
        },
        process_output(initial,evaluate){
            let data = this.criteria[initial];
            Vue.set(this[data[0]],data[1],data[2][evaluate]);
        }
    },
    created(){
        if(this.dynamics_has){
            this.dynamic_field_form = Object.assign({},this.dynamic_field_form,this.getDynamicFieldForm());
        }
    },
    watch: {
        dynamic_field_values(data){
            if(this.dynamics_has) this.process_dynamics(data);
        }
    }

};

function match_value(value1,value2,operator){
    return (_.isObject(value2)) ? _.includes(value2,value1) : (
        (operator === '=') ? _.isEqual(_.toString(value1),_.toString(value2)) : (
            _.includes(['>','<','>=','<='],operator) ? (eval(_.concat(value1,operator,value2).join(''))) : (
               (operator === '<>') ? (value1 !== value2) : null
           ))
        )
}