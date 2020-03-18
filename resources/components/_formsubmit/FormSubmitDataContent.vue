<template>
    <dl class="row"><dt class="col-3">{{ title }}</dt><dd class="col-9">{{ description }}</dd></dl>
</template>

<script>
    export default {
        name: "FormSubmitDataContent",
        props: ['title','description'],
    }
</script>