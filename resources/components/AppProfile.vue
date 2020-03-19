<template>
    <AppFormWithData :dataIds="dataIds" />
</template>

<script>
    export default {
        name: "AppProfile",
        props: ['dataIds'],
    }
</script>