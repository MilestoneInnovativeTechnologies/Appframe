<template>
    <section class="section-deck">
        <div class="card card-fluid" v-for="(secObj,index) in columns" :class="cardClass(secObj.colspan)" :key="['dd',section,index].join('-')">
            <BSDataCard v-bind="secObj" :data-record="dataRecord"></BSDataCard>
        </div>
    </section>
</template>

<script>
    export default {
        name: "BSDataDeck",
        props: ['columns','section','dataRecord'],
        methods: {
            cardClass(col){ return (col && _.toSafeInteger(col) > 0) ? ['col','md',col].join('-') : []; },
        }
    }
</script>