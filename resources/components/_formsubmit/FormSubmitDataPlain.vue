<template>
    <div class="card-body pt-2 pb-0">
        <FormSubmitDataContent :title="title" :description="description"></FormSubmitDataContent>
    </div>
</template>

<script>
    export default {
        name: "FormSubmitDataPlain",
        props: ['title','description'],
    }
</script>