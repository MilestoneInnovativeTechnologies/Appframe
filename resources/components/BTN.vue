<template>
    <button role="button" class="btn" :class="cls" v-on="listeners" :disabled="disabled"><icon :class="ippcls" v-if="ipp">{{ icon }}</icon><slot></slot><icon :class="iapcls" v-if="iap">{{ icon }}</icon></button>
</template>

<script>
    export default {
        name: "BTN",
        props: {
            type: { default: 'primary' },
            size: { default: null },
            icon: { default: null },
            append: { default: false },
            disabled: { default: false },
            imargin: { default:1 }
        },
        computed: {
            cls(){ let cls = ['btn-'+this.type]; if(this.size) cls.push('btn-'+this.size); return cls; },
            iap(){ return this.icon && this.append !== false },
            ipp(){ return this.icon && this.append === false },
            iapcls(){ return (this.iap) ? _.concat('ml',this.imargin).join('-') : '' },
            ippcls(){ return (this.ipp) ? _.concat('mr',this.imargin).join('-') : '' },
            listeners(){ return this.$listeners }
        }
    }
</script>