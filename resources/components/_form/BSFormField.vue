<template>
    <div :class="cls">
        <BSFormFieldLabel v-bind="props"></BSFormFieldLabel>
        <div v-if="inline" :class="cntCls">
            <component :is="cntComponent" :invalid="invalid" v-bind="props"></component>
            <BSFormFieldInvalidInfo v-if="invalid && cntComponent === 'BSFormFieldControl'" :invalid="invalid"></BSFormFieldInvalidInfo>
        </div><div v-else>
            <component :is="cntComponent" :invalid="invalid" v-bind="props"></component>
            <BSFormFieldInvalidInfo v-if="invalid && cntComponent === 'BSFormFieldControl'" :invalid="invalid"></BSFormFieldInvalidInfo>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "BSFormField",
        inheritAttrs: false,
        mixins: [require('./../../js/common/BSFormFieldDynamicMixin').fieldDynamicMixin],
        props: {
            inline: { default: false }, dataFormId: null, name:null,
            prepend: { default: false }, append: { default: false },
            prependIcon: { default: false }, appendIcon: { default: false },
        },
        computed: {
            cls(){ return { 'form-group':true, row:this.inline, ...(this.dynamic_field_class) }; },
            cntCls(){ return ['col-md-' + (12 - _.toSafeInteger(this.inline))] },
            inputGroup(){ return this.prepend || this.append || this.prependIcon || this.appendIcon },
            cntComponent(){ return (this.inputGroup) ? 'BSFormFieldInputGroup' : 'BSFormFieldControl' },
            props(){ return _.merge({},{ dataFormId:this.dataFormId,name:this.name },this.$attrs,this.$props,this.dynamic_field_attrs); },
            ...mapGetters('FORM',{ getInvalid:'invalid' }),
            invalid(){ return this.getInvalid(this.dataFormId,this.name) }
        }
    }
</script>
