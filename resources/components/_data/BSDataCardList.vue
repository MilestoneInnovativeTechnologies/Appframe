<template>
    <div class="table-responsive">
        <table class="table table-sm mb-0 table-bordered">
            <thead class="thead-light"><tr>
                <th>#</th><th v-for="hd in rows">{{ hd }}</th>
            </tr></thead>
            <BSDataCardListItems :cols="cols" :record="record"></BSDataCardListItems>
        </table>
    </div>
</template>

<script>
    export default {
        name: "BSDataCardList",
        props: ['items','record'],
        computed: {
            rows(){ return _.keys(this.items) },
            cols(){ return _.values(this.items) },
        }
    }
</script>