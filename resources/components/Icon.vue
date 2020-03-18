<template>
    <i v-if="name" :class="cls"></i>
</template>

<script>
    export default {
        name: "Icon",
        props:{ set:{ default:'fas' } },
        computed:{
            name(){ return this.$slots.default ? this.$slots.default[0].text : null },
            cls(){ return [].concat(this.set).concat('fa-'+this.name); }
        }
    }
</script>