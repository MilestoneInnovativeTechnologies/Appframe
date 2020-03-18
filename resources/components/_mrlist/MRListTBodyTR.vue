<template>
    <tr style="cursor: pointer">
        <td style="width: 39px"><MRListCheckbox v-bind="properties" :value="dataRecordId"></MRListCheckbox></td>
        <td v-for="(pathProps,key) in columns" :key="['L'+dataListId,'R'+dataRecordId,key].join('-')">{{ data(pathProps) }}</td>
    </tr>
</template>

<script>
    export default {
        name: "MRListTBodyTR",
        props: ['columns','record','dataListId','dataRecordId','properties'],
        methods: {
            data(pathProps){ return (pathProps.path) ? this.dataFromPath(pathProps.path,pathProps.field): _.get(this.record,pathProps.field); },
            dataFromPath(path,field){ let initData = _.get(this.record,path); return (_.isArray(initData)) ? _.map(initData,field).join(', ') : _.get(initData,field); },
        }
    }
</script>
