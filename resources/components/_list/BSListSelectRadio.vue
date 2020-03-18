<template>
    <input type="radio" name="selectList" :value="dataRecordId" v-model="selected" class="form-check-input ml-2" />
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapMutations,mapGetters } = createNamespacedHelpers('LIST');
    export default {
        name: "BSListSelectRadio",
        props: ['dataRecordId','dataListId'],
        computed: {
            ...mapGetters({ value:'selected' }),
            selected:{
                get(){ return this.value(this.dataListId) },
                set(){ this.setSelected({ list:this.dataListId, record:this.dataRecordId }) }
            }
        },
        methods: {
            ...mapMutations(['setSelected']),
        }
    }
</script>