<template>
    <tfoot><tr><th>{{ count+1 }}</th><td v-for="(field,fName) in fields" :key="key(fName)">
        <BSFormFieldControl :dataFormId="form" v-bind="field" :name="fName" :parent="parent"></BSFormFieldControl>
    </td><th><BTN type="outline-info" @click.prevent="add">Add</BTN></th></tr></tfoot>
</template>

<script>
    import { mapMutations } from 'vuex'
    export default {
        name: "BSFCTFoot",
        props: ['parent','form','name','fields','count','skip'],
        methods: {
            key(fName){ return ['FC',this.form,'TF',fName].join('-') },
            ...mapMutations('FORM',['addCollectionValue','delCollectionValue']),
            add(){ this.addCollectionValue({ parent:this.parent,form:this.form,collection:this.name,id:this.id() }) },
            del(id){ this.delCollectionValue({ form:this.form,collection:this.name,id }) },
            id(){ return new Date().getTime()%(Math.pow(10,10)) }
        },
        created(){
            if(parseInt(this.count)) this.$nextTick(() => _.last(document.getElementsByName(_.sortBy(this.fields,({id}) => id)[0].name)).focus())
        }
    }
</script>