<template>
    <label v-if="label" :class="cls">
        <span>{{ label }}</span>
        <abbr :title="abbr" v-if="abbr">*</abbr>
        <span v-if="hint && !inline" class="text-muted">{{ hint }}</span>
    </label>
</template>

<script>
    export default {
        name: "BSFormFieldLabel",
        inheritAttrs: false,
        props: {
            inline: { default: false },
            label: false, size: null, abbr: false,
            hint: null,
        },
        computed: {
            cls(){
                if(!this.inline) return (this.hint) ? ['d-flex','justify-content-between'] : null;
                let cls = [ 'col-form-label','col-md-'+this.inline];
                if(this.size) cls.push('col-form-label-'+this.size);
                return cls;
            }
        }
    }
</script>