<template>
    <BTN class="btn-floated" :icon="icon" imargin="0" v-else v-on="$listeners"></BTN>
</template>

<script>
    export default {
        name: "FAButton",
        props: ['icon']
    }
</script>