<template>
    <span :class="cls"><img :src="user.avatar" alt=""></span>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "UserAvatar",
        props: {
            size:{ type:String, default:'md' }
        },
        computed:{
            ...mapGetters(['user']),
            cls(){ return ['user-avatar','user-avatar-'+this.size] }
        }
    }
</script>