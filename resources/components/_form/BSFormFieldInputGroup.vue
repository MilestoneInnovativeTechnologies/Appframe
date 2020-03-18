<template>
    <div class="input-group input-group-alt">
        <component v-bind="fullProps" :invalid="invalid" :is="position === 'prepend' ? 'BSFormFieldInputGroupItem' : 'BSFormFieldControl'"></component>
        <component v-bind="fullProps" :invalid="invalid" :is="position === 'append' ? 'BSFormFieldInputGroupItem' : 'BSFormFieldControl'"></component>
        <BSFormFieldInvalidInfo v-if="invalid" :invalid="invalid"></BSFormFieldInvalidInfo>
    </div>
</template>

<script>
    export default {
        name: "BSFormFieldInputGroup",
        inheritAttrs: false,
        props: {
            prepend: { default: false },
            append: { default: false },
            prependIcon: { default: false },
            appendIcon: { default: false },
            invalid: { default: null }
        },
        computed: {
            position(){ return (this.append || this.appendIcon) ? 'append' : 'prepend' },
            type(){ return (this.prependIcon || this.appendIcon) ? 'icon' : 'text' },
            icon() { return (this.type === 'icon') ? (this.prependIcon || this.appendIcon) : null },
            text() { return (this.type === 'text') ? (this.prepend || this.append) : null },
            itemProps() { return { iPosition: this.position, iType: this.type, iIcon: this.icon, iText: this.text } },
            props(){ return _.merge({},this.$attrs) },
            fullProps(){ return _.merge({},this.itemProps,this.props) }
        }
    }
</script>