<template>
    <router-link :to="{ name:'menu-action',params:{ action:action } }" tag="li" class="menu-item">
        <a class="menu-link"><slot></slot></a>
    </router-link>
</template>

<script>
    export default {
        name:'MenuItem',
        props:['action']
    }
</script>