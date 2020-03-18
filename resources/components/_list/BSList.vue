<template>
    <div class="card"><div class="card-body"><form>
        <div class="table-responsive">
            <table class="table table-sm mb-0 table-hover">
                <BSListTHead :columns="Object.keys(layout)" :data-list-id="dataListId"></BSListTHead>
                <BSListTBody :columns="Object.values(layout)" :data="data" :data-list-id="dataListId"></BSListTBody>
            </table>
        </div>
    </form></div></div>
</template>

<script>
    export default {
        name: "BSList",
        props: ['layout','data','dataListId']
    }
</script>