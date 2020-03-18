<template>
    <div v-if="sections" class="data-sections">
        <BSDataDeck v-for="(columns,index) in sections" :columns="columns" :data-record="dataRecord" :section="index" :key="['ds',index].join('-')"></BSDataDeck>
    </div>
    <div v-else class="display-4">No section defined</div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapGetters } = createNamespacedHelpers('DATA');
    export default {
        name: "BSData",
        props: ['dataDataId','dataRecordId','dataRecord'],
        data(){ return { fk:'__upload_file_details' } },
        computed: {
            ...mapGetters({ getSection:'section' }),
            section(){ return this.getSection(this.dataDataId) },
            sections(){ return _.isEmpty(this.section) ? this.getDefaultSections() : this.getSections(this.section) }
        },
        methods: {
            getDefaultSections(){ return this.getSections([ { colspan:12,relation:null,title:null,title_field:null,items:this.sectionItems(_.keys(_.omit(this.dataRecord,this.fk))) } ]) },
            sectionItems(fields){ return _(fields).mapKeys((field) => _.startCase(_.replace(field,/(\W|_)/g,' '))).mapValues((field) => _.zipObject(['attribute','relation'],[field,null])).value(); },
            getSections(section){
                let rows = [], cols = [], count = 0;
                _.each(section,function(secObj){
                    if(count + _.toSafeInteger(secObj.colspan) > 12) { rows.push(cols); cols = []; count = 0; }
                    cols.push(secObj); count += _.toSafeInteger(secObj.colspan);
                });
                if(!_.isEmpty(cols)) rows.push(cols);
                return rows;
            }
        }
    }
</script>
