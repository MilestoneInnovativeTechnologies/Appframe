<template>
    <div class="card">
        <div class="card-header">{{ name }}</div>
        <div class="card-body">
            <graph-area v-bind="bind" :labels="labels" :values="values"></graph-area>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TrendMetric",
        props: ['data','name'],
        data(){
            return {
                bind: { width:290, height:100, axisMin:5, axisMax:25, paddingTop:0, paddingRight:0, paddingBottom:0, paddingLeft:0, axisFullMode:true, axisXStyle:'hidden', axisYStyle:'hidden' }
            }
        },
        computed: {
            labels(){ return _.map(this.data,'__FIELD1') },
            values(){ return [_.map(this.data,'__VALUE')] },
        }
    }
</script>