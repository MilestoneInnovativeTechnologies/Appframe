<template>
    <div v-if="invalid" class="invalid-feedback"><icon>exclamation-circle</icon> {{ invalid }}</div>
</template>

<script>
    export default {
        name: "BSFormFieldInvalidInfo",
        props: {
            'invalid': { default: null },
        }
    }
</script>