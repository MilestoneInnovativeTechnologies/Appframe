<template>
    <li class="menu-item has-child">
        <a href="#" class="menu-link">
            <span class="menu-icon"></span>
            <span class="menu-text">{{ resource }}</span>
        </a>
        <menu-group name="resources" :items="menus"></menu-group>
    </li>
</template>

<script>
    export default {
        name: "ResourceNav",
        props: ['resource','menus']
    }
</script>