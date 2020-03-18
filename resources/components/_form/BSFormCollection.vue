<template>
    <div class="card-body px-0">
        <div class="card-title font-weight-bold">{{ title  }}</div>
        <div class="card-text">
            <div class="table-responsive"><table class="table table-sm">
                <thead><tr><th>#</th><th v-for="(label,idx) in Labels" :key="['FC',form,'THC',idx+1].join('-')">{{ label }}</th><th></th></tr></thead>
                <BSFCTBody :form="form" :name="name" :names="Names" :collectiondata="collectiondata" :display_option="display_option"></BSFCTBody>
                <BSFCTFoot :form="form" :name="name" :fields="Fields" :skip="skip" :count="Object.keys(collectiondata).length" :parent="parent" :key="tfkey"></BSFCTFoot>
            </table></div>
        </div>
    </div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex'
    const { mapGetters } = createNamespacedHelpers('FORM');
    export default {
        name: "BSFormCollection",
        props: ['parent','form','name','skip'],
        computed: {
            ...mapGetters({ getForm:'form',getInvalid:'invalid' }),
            Form(){ return this.getForm(this.form) },
            title(){ return this.Form.title },
            Fields(){ return _.omit(this.Form.fields,this.skip) },
            Labels(){ return _.map(this.Fields,'label') },
            Names(){ return _.map(this.Fields,'name') },
            ...mapGetters({ getData:'collectiondata' }),
            collectiondata(){ return this.getData(this.form,this.name) },
            tfkey(){ return _.last(_.keys(this.collectiondata)) },
            display_option(){ return _(this.Fields).filter((v) => v.type === 'select').keyBy('name').mapValues('options.id').value() },
        }
    }
</script>
