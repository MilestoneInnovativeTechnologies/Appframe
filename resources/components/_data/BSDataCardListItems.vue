<template>
    <tbody><tr v-for="(item,idx) in record">
        <th>{{ idx+1 }}</th><td v-for="colObj in cols">{{ text(item,colObj) }}</td>
    </tr></tbody>
</template>

<script>
    export default {
        name: "BSDataCardListItems",
        props: ['cols','record'],
        methods: {
            text(item,obj){ return obj.relation ? this.getRelationText(item,obj) : _.get(item,obj.attribute); },
            getRelationText(item,{ relation,attribute }){
                let data = _.get(item,relation);
                return (_.isArray(data)) ? _.map(data,attribute).join(', ') : _.get(data,attribute)
            }
        }
    }
</script>