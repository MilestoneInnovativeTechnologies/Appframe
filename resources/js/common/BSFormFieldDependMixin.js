import { createNamespacedHelpers } from 'vuex';
const { mapState,mapGetters,mapActions } = createNamespacedHelpers('FORM');

export const fieldDependMixin = {

    props: ['dataFormId','name','parent','depends','id'],
    data(){
        return { depend_field_form:{},depends_ignore_null:true }
    },
    computed: {
        depends_has(){ return this.depends && !_.isEmpty(this.depends) },
        ...mapGetters({ getValue:'value' }),
        depend_field_values(){ let vm = this; return (!this.depends_has) ? {} : _.mapValues(vm.depend_field_form,function(form,field){ return (form) ? vm.getValue(form,field) : null })},
        depends_server_request(){ return { form_field:this.id,form:this.dataFormId,field_name:this.name,action:'depend' } },
    },
    methods: {
        ...mapState({
            getDependFieldForm({ data }){
                let dependFieldForm = {}, vm = this;
                _.each(this.depends,function(depend){
                    let field = depend.depend_field;
                    let form = _.includes(_.keys(data[vm.dataFormId]),field) ? vm.dataFormId : (_.includes(_.keys(data[vm.parent]),field) ? vm.parent : null);
                    _.set(dependFieldForm,field,form);
                });
                return dependFieldForm;
            }
        }),
        ...mapActions(['post']),
        doIgnoreFetchingDependValue(data){ return this.depends_ignore_null && _.some(_.map(_.toArray(data), v => _.toString(v)), v => _.isEmpty(v)) }
    },
    created(){
        if(this.depends_has){
            this.depend_field_form = Object.assign({},this.depend_field_form,this.getDependFieldForm());
            this.depends_ignore_null = _.some(this.depends,['ignore_null','Yes']);
        }
    },
    watch: {
        depend_field_values(data){
            if(this.depends_has && !this.doIgnoreFetchingDependValue(data)) this.post({ ...(this.depends_server_request),data })
        }
    }

};