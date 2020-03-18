<template>
    <li class="menu-item has-child">
        <a href="#" class="menu-link">
            <span class="menu-icon"></span>
            <span class="menu-text">{{ heading }}</span>
        </a>
        <menu-group :items="items" name="user"></menu-group>
    </li>
</template>
<script>
    export default {
        name: "UserNavs",
        data(){
            return{
                'heading': 'User',
                "items": ["Dashboard","Reminders","Events","Tasks","Messages"]
            }
        }
    }
</script>