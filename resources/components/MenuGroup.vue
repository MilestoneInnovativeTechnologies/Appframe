<template>
    <ul class="menu">
        <menu-item v-for="(item,index) in items" :key="['mg',name,index].join('-')" :action="item.id">
            {{ item.menu }}
        </menu-item>
    </ul>
</template>

<script>
    export default {
        name: "MenuGroup",
        props:['items','name'],
    }
</script>