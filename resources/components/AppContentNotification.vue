<template>
    <div :class="cls" class="alert alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" v-on="listeners">&cross;</button>
        <div class="alert-icon" v-if="icon">
            <icon>{{ icon }}</icon>
        </div>
        <h4 class="alert-heading"> {{ title }} </h4>
        <p class="mb-0"> {{ content }}</p>
    </div>
</template>

<script>
    export default {
        name: "AppContentNotification",
        props: {
            type: { default: 'success' },
            icon: { default: false },
            title: { default: 'Success' },
            content: { default: '-' },
        },
        computed: {
            cls(){ let cls = ['alert-'+this.type]; if(this.icon) cls.push('has-icon'); return cls; },
            listeners(){ return this.$listeners }
        }
    }
</script>