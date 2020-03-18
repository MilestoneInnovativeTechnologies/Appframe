<template>
    <tbody>
        <tr v-if="data.length === 0"><th :colspan="columns.length+1">
            <div class="jumbotron text-center text-info bg-transparent">No Data</div>
        </th></tr>
        <BSListTBodyTR v-else v-for="(record,id) in data"
                       :data-list-id="dataListId"
                       :data-record-id="id"
                       :record="record"
                       :columns="columns"
                       :key="['L'+dataListId,'R'+id,record.updated_at].join('-')">

        </BSListTBodyTR>
    </tbody>
</template>

<script>
    export default {
        name: "BSListTBody",
        props: ['data','columns','dataListId']
    }
</script>