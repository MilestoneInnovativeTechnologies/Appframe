<template>
    <BTN class="ml-1" :icon="icon" :type="type" size="xs" @click="clicked">{{ title }}</BTN>
</template>

<script>
    import { mapActions } from 'vuex';
    export default {
        name: "DataAction",
        props: ['dataId','id','type','icon','title','confirm'],
        computed: {
            record(){ return this.$route.params.id }
        },
        methods: {
            ...mapActions('ACTN',['action']),
            clicked(){ return this.confirm ? this.warn(this.confirm) : this.clickGo(); },
            clickGo(){ let params = { action:this.id,id:this.record,data:this.dataId }; this.action({ params,name:'data-action' }); },
            warn(msg){
                let btnActn = this.clickGo;
                $('#DataWarningModal').on('show.bs.modal',function(){
                    let modal = $(this);
                    modal.find('.warning-msg').text(msg);
                    modal.find('#DataWarningDismiss').bind('click',{ btnActn,modal },function({ data }){ data.btnActn(); data.modal.modal('hide') });
                }).modal('show') }
        }
    }
</script>