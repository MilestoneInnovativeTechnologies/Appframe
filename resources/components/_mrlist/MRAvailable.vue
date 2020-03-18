<template>
    <div class="card"><div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm mb-0 table-hover">
                <BSListTHead :columns="Object.keys(layout)" :data-list-id="dataListId"></BSListTHead>
                <MRListAvailableTBody :columns="Object.values(layout)" :data="data" :data-list-id="dataListId" :properties="properties"></MRListAvailableTBody>
            </table>
        </div>
    </div></div>
</template>

<script>
    export default {
        name: "MRAvailable",
        props: ['properties','dataListId','layout','data'],
    }
</script>
