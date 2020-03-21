<template>
    <tbody>
        <tr v-if="empty"><td :colspan="names.length+2" class="text-center">no data, start adding..</td></tr>
        <tr v-else v-for="(values,id,no) in collectiondata" :key="['FCD',form,name,id].join('-')">
            <th>{{ no+1 }}</th>
            <td v-for="(name,idx) in names" :key="['cftb',id,idx].join('-')">{{ displayText(name,values[name]) }}</td>
            <th><BTN size="xs" type="outline-warning" @click.prevent="del(id)">Del</BTN></th>
        </tr>
    </tbody>
</template>

<script>
    import { mapMutations,mapGetters } from 'vuex'
    export default {
        name: "BSFCTBody",
        props: ['form','name','names','collectiondata','display_option'],
        computed: {
            empty(){ return _.isEmpty(this.collectiondata) },
            ...mapGetters('FOPT',{ options:'get' }),
        },
        methods: {
            ...mapMutations('FORM',['delCollectionValue','delAllCollectionValue']),
            displayText(name,value){ return _.has(this.display_option,name) ? this.optionText(_.get(this.display_option,name),value) : value },
            optionText(opt,key){ return _.get(this.options(opt),key,'-') },
            del(id){ this.delCollectionValue({ form:this.form,collection:this.name,id }) },
        },
        beforeDestroy(){
            this.delAllCollectionValue({ form:this.form, collection:this.name })
        }
    }
</script>