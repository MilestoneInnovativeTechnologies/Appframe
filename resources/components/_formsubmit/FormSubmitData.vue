<template>
    <div class="section-block">
        <AppContentNotification v-if="notify" title="Success" content="Form submitted successfully" icon="thumbs-up" @click="LeavePage"></AppContentNotification>
        <div class="card">
            <FormSubmitDataBody v-for="(description,title,idx) in list" :title="title" :description="description" :key="['fsd','body',idx].join('-')" :class="{ 'border-top':!!idx }"></FormSubmitDataBody>
        </div>
    </div>

</template>

<script>
    import { mapMutations,mapActions } from 'vuex';
    export default {
        name: "FormSubmitData",
        props: ['data','notify','form'],
        data(){ return {
            removeTitles: ['created_by','created_at','updated_by','updated_at','pivot'],
        }},
        computed: {
            route(){ return this.$route.params },
            list(){ return _.omit(this.data,this.removeTitles) }
        },
        methods: {
            ...mapMutations('FORM',['delFormSubmitData','reset']),
            ...mapActions(['navigate']),
            LeavePage(){
                if(this.route.record) this.$router.go(-2);
                else this.navigate({ name: 'menu-action', params: { action: this.route.action } });
            },
        },
        beforeDestroy () { this.delFormSubmitData(this.form); this.reset(this.form); }
    }
</script>