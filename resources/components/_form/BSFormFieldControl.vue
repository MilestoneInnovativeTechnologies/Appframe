<template>
    <component :is="component" :class="cls" :data-form-id="dataFormId" :name="name" v-bind="props"></component>
</template>

<script>
    import { mapMutations } from 'vuex';
    export default {
        name: "BSFormFieldControl",
        inheritAttrs: false,
        props: {
            type: { default:'text' },
            name: null, form: null,
            invalid: { default: null }, size: null,
            dataFormId: false,
        },
        data(){
            return {
                componentPrefix: 'BSFormField',
                textComponentTypes: ['text','number','email','password'],
                allControlAttrs: ['disabled','readonly','required'],
                forwardProps: ['parent','depends','id'],
            }
        },
        computed: {
            compType(){ return _.includes(this.textComponentTypes,this.type) ? 'text' : this.type },
            component(){ return this.componentPrefix + _.capitalize(_.camelCase(this.compType)) },
            group(){ return this.prepend || this.append },
            cls(){
                let cls = {};
                if(this.invalid) cls['is-invalid'] = true;
                if(this.size) cls['form-control-'+this.size] = true;
                return cls;
            },
            props(){
                let vm = this, props = { };// console.log(vm.$props,vm.$attrs);
                _.forEach(vm.allControlAttrs,(v) => { if(vm.$attrs.hasOwnProperty(v) && vm.$attrs[v] !== false) props[v] = v; } );
                _.forEach(vm.forwardProps,(v) => { if(vm.$props.hasOwnProperty(v)) props[v] = vm.$props[v]; } );
                _.forEach(vm.$attrs,(v,k) => { props[k] = v; } );
                if(_.includes(vm.textComponentTypes,this.type)) props['type'] = this.type;
                return props;
            }
        },
        methods: mapMutations('FORM',['updateValue']),
        watch: {
            props({ disabled }){ if(disabled) this.updateValue({ form:this.dataFormId,field:this.name,value:null }) }
        }
    }
</script>
