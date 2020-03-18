<template>
    <div class="card w-75">
        <div v-show="submitting" :style="{ opacity:0.5 }" style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; background-color: #F5F5F5; opacity: 0; z-index: 100; transition: opacity 0.2s linear"></div>
        <div class="card-body">
            <form :name="name">
                <template v-if="formLayout">
                    <div class="form-row" v-for="rows in formLayout">
                        <div v-for="(span,fName) in rows" :class="spanClass(span)">
                            <BSFormField :key="[name,fName].join('-')" v-bind="fields[fName]" :data-form-name="name" :data-form-id="dataFormId"></BSFormField>
                        </div>
                    </div>
                </template>
                <BSFormField v-else v-for="(props,fieldName) in fields" :key="[name,fieldName].join('-')" v-bind="props" :data-form-name="name" :data-form-id="dataFormId"></BSFormField>
                <BSFormCollection v-if="collection" v-for="(cForm,cName) in collection" v-bind="cForm" :name="cName" :parent="dataFormId" :key="['F',dataFormId,'C',cName].join('-')"></BSFormCollection>
            </form>
            <div class="card-title clearfix" v-if="dataActionText">
                <div class="float-right">
                    <BTN @click="submit">{{ dataActionText }}</BTN>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapActions,mapGetters } = createNamespacedHelpers('FORM');
    export default {
        name: "BSForm",
        props: ['name','fields','dataFormId','dataActionText','layout'],
        computed: {
            formLayout(){ let layout = this.getLayout(); return _.isEmpty(layout) ? false : layout },
            submitting(){ return this.$store.state.FORM.submitting[this.dataFormId] },
            action(){ return this.$route.params.action }, record(){ return this.$route.params.id },
            ...mapGetters({ getCollection:'collection' }),
            collection(){ return this.getCollection(this.dataFormId) }
        },
        methods: {
            ...mapActions({ formSubmit:'submit' }),
            submit(){
                let vm = this, payload = { form:vm.dataFormId,action:vm.action,record:vm.record };
                vm.formSubmit(payload);
            },
            getLayout(){
                let rows = [], cols = new Object({}), count = 0;
                _.each(this.layout,function(span,name){
                    if(count + parseInt(span) > 12) { rows.push(cols); cols = new Object({}); count = 0; }
                    cols = Object.assign({},cols,_.fromPairs([[name,span]])); count += parseInt(span);
                });
                if(!_.isEmpty(cols)) rows.push(cols);
                return rows;
            },
            spanClass(span){ let cls = 'col'; return (span && _.toSafeInteger(span) > 0) ? [cls,'md',span].join('-') : cls; }
        },
    }
</script>