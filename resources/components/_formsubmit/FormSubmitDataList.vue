<template>
    <div class="card-body">
        <div class="card-title font-weight-bold">{{ title }}</div>
        <div class="table-responsive"><table class="table table-sm">
            <thead><tr><th v-for="(hd,idx) in heads" :key="['fsd','list','hd',idx].join('-')">{{ hd | read }}</th></tr></thead>
            <tbody><tr v-for="(tr,idx) in data"><td v-for="(hd,idx2) in heads" :key="['fsd','list','bd',idx,idx2].join('-')">{{ content(tr,hd) }}</td></tr></tbody>
        </table></div>
    </div>
</template>

<script>
    export default {
        name: "FormSubmitDataList",
        props: ['title','description'],
        data(){ return {
            removeHeads: ['created_at','updated_at','pivot','created_by','updated_by'],
        }},
        computed: {
            data(){ return this.description; },
            heads() { return _.difference(_.keys(_.head(this.data)), this.removeHeads); }
        },
        methods: {
            content(Obj,Hd){ let cnt = _.get(Obj,Hd); return _.isObject(cnt) ? '' : cnt }
        },
        filters: {
            read(text){ return _.upperFirst(text.replace(/\W|\_/g,' ')); }
        }
    }
</script>