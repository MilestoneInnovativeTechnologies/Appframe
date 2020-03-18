<template>
    <div v-if="!status" class="modal modal-alert fade" id="authModalWarning" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertWarningLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <icon class="text-warning mr-1">bullhorn</icon> {{ title }}
                    </h5>
                </div>
                <div class="modal-body">
                    <p v-html="description"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" @click="cancelAuthWarning(200)">Cancel</button>
                    <a v-if="extra && extra === 'login'" :href="logout" class="btn btn-info">Proceed to Login</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState,mapGetters,mapMutations } from 'vuex'
    export default {
        name: "AuthWarning",
        computed:{
            ...mapGetters('AUTH',['status','title','description','extra']),
            ...mapState({
                login:'login_url', logout:'logout_url'
            })
        },
        methods:mapMutations('AUTH',{
            cancelAuthWarning: 'respStatus'
        }),
        updated(){
            this.$nextTick(function(){
                $('#authModalWarning').modal(this.status ? 'hide' : 'show');
            });
        }
    }
</script>
