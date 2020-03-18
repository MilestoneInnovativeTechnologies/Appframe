<template>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><icon>search</icon></span>
        </div>
        <input id="table-search" type="text" class="form-control" v-model="text" placeholder="Filter Records">
    </div>
</template>

<script>
    export default {
        name: "MRListFilter",
        data(){ return { value:'' }},
        computed: {
            text: {
                set(value){ this.$emit('text',value); this.value = value },
                get(){ return this.value }
            }
        }
    }
</script>
