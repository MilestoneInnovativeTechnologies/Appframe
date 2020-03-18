<template>
    <span class="account-summary">
        <span class="account-name">{{ user.name }}</span>
        <span class="account-description">{{ user.role }}</span>
    </span>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "AccountSummary",
        computed:{
            ...mapGetters(['user']),
        }
    }
</script>