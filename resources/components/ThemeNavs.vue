<template>
    <li class="menu-item has-child">
        <a href="" class="menu-link">
            <span class="menu-icon"></span>
            <span class="menu-text">{{ heading }}</span>
        </a>
        <menu-group :items="items" name="theme"></menu-group>
    </li>
</template>

<script>
    export default {
        name: "ThemeNavs",
        data(){
            return{
                'heading': 'Theme',
                "items": ["Background Color","Font Size","Header Image"]
            }
        }
    }
</script>