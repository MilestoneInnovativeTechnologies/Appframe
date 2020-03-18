<template>
    <tbody>
        <tr v-if="data.length === 0"><th :colspan="columns.length+1">
            <div class="jumbotron text-center text-info bg-transparent">No more available</div>
        </th></tr>
        <MRListTBodyTR v-else v-for="(record,id) in filtered"
                       :data-list-id="dataListId"
                       :data-record-id="id"
                       :record="record"
                       :columns="columns"
                       :properties="properties"
                       :key="['L'+dataListId,'R'+id,record.updated_at].join('-')">
        </MRListTBodyTR>
    </tbody>
</template>

<script>
    export default {
        name: "MRListAvailableTBody",
        props: ['data','columns','dataListId','properties'],
        data(){ return { filter_text: '' } },
        computed: {
            filtered(){ return (!!this.filter_text) ? _.pickBy(this.data,(obj) => _.includes(_.join(_.values(obj),'|'),this.filter_text)) : this.data }
        },
        methods: {
            filter(text){ this.filter_text = text; }
        }
    }
</script>
