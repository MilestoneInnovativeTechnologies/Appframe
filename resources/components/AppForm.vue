<template>
    <transition name="fade">
        <FormLoading v-if="!form"></FormLoading>
        <FormSubmitData v-else-if="submitData" :data="submitData" :notify="true" :form="id"></FormSubmitData>
        <BSForm v-else :name="form.name" :fields="form.fields" :layout="layout" :data-form-id="id" :data-action-text="form.action_text"></BSForm>
    </transition>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    const { mapGetters } = createNamespacedHelpers('FORM');
    export default {
        name: "AppForm",
        props: ['dataIds'],
        computed: {
            id(){ return this.dataIds['idn1'] },
            ...mapGetters({ getForm:'form',getLayout:'layout',getSubmit:'getSubmit' }),
            form(){ return this.getForm(this.id) },
            layout(){ return this.getLayout(this.id) },
            submitData(){ return this.getSubmit(this.id) },
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active { transition: all 0.6s linear; }
    .fade-leave-active { position: absolute; left: 32px; right: 32px; }
    .fade-enter, .fade-leave-to { opacity: 0; }
    .fade-leave, .fade-enter-to { opacity: 1; }
</style>