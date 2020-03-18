<template>
    <div class="card-text">
        <template v-for="(obj,label) in items">
            <dt>{{ label }}</dt>
            <dd v-html="getValue(obj)"></dd>
        </template>
    </div>
</template>

<script>
    export default {
        name: "BSDataCardItems",
        props: ['record','items'],
        data(){ return { fk:'__upload_file_details' } },
        computed: {
            files(){ return (_.has(this.record,this.fk) && !_.isEmpty(this.record[this.fk])) ? _.keys(this.record[this.fk]) : []; },
            records(){ return _.omit(this.record,this.fk) }
        },
        methods: {
            getValue({ relation,attribute }){
                let value = relation ? this.getRelationValue(relation,attribute) : _.get(this.records,attribute);
                return (_.includes(this.files,attribute)) ? this.getFileDisplay(attribute) : value;
            },
            getRelationValue(relation,attribute){
                let data = _.get(this.records,relation);
                return (_.isArray(data)) ? _.map(data,attribute).join(', ') : _.get(data,attribute)
            },
            getFileDisplay(attribute){
                let file = this.record[this.fk][attribute];
                return _.includes(file.mime,'image') ? getImageThumb(file) : getAnchorFile(file);
            }
        }
    }

    function getImageThumb(file) { return `<a href="${file.url}" target="_blank"><img src="${file.url}" width="20%" class="img-thumbnail rounded"></a>`; }
    function getAnchorFile(file) { return `<a href="${file.url}" target="_blank">[File: ${file.name_client}]</a>`; }
</script>
