<template>
    <div :class="cls">
        <h6 v-if="ifHeader" class="dropdown-header d-none d-md-block d-lg-none"> {{ user.name }} </h6>
        <a class="dropdown-item" href="#!" @click.prevent="Profile()"><span class="dropdown-icon oi oi-person"></span> Profile </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#!">Help Center</a>
        <a class="dropdown-item" href="#!">Ask Forum</a>
        <a class="dropdown-item" href="#!">Keyboard Shortcuts</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" :href="logout"><span class="dropdown-icon fa fa-sign-out-alt"></span> Logout</a>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "AccountOptions",
        props: {
            area:{ default:'dropdown-menu' }
        },
        computed:{
            ...mapGetters(['logout','user','profile']),
            cls(){ return this.area; },
            ifHeader(){ return this.cls === 'dropdown-menu' }
        },
        methods:{
            Profile(){ this.$router.push(this.profile.replace(location.origin,'')) }
        }
    }
</script>