<template>
    <div class="card"><div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm mb-0 table-hover">
                <BSListTHead :columns="Object.keys(layout)" :data-list-id="dataListId"></BSListTHead>
                <MRListSelectedTBody :columns="columns" :data="data" :data-list-id="dataListId" :properties="properties"></MRListSelectedTBody>
            </table>
        </div>
    </div></div>
</template>

<script>
    export default {
        name: "MRSelected",
        props: ['properties','dataListId','layout','data'],
        computed: {
            columns(){ return _.values(this.layout) }
        }
    }
</script>
