<template>
    <input type="checkbox" name="relation" @click="clicked" :checked="checked" class="form-check-input ml-2" />
</template>

<script>
    import { mapMutations } from 'vuex';
    export default {
        name: "MRListCheckbox",
        props: ['list','relation','record','current','value'],
        computed: {
            checked(){ return _.includes(this.current,_.toString(this.value)) },
            request(){ return { list:this.list,relation:this.relation,id:this.record,data:this.value } },
        },
        methods: {
            ...mapMutations('LIST',['updateRelation']),
            clicked(e){ this.updateRelation({ ...(this.request),status:e.target.checked }) },
        }
    }
</script>
