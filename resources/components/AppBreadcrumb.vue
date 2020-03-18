<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" v-for="(route,index) in list">
                <a v-if="!index" href="#"><icon class="breadcrumb-icon mr-2">angle-left</icon>{{ route }}</a>
                <a v-else @click.prevent="go(route)" href="#">{{ compress(route.title,route.prepend,route.append) }}</a>
            </li>
        </ol>
    </nav>
</template>

<script>
    import { mapGetters,mapActions } from'vuex';
    export default {
        name: "AppBreadcrumb",
        data(){ return { max:20,threshold:20 } },
        computed: {
            ...mapGetters('HSTR',['set']),
            list(){ return this.set() }
        },
        methods: {
            ...mapActions(['navigate']),
            go({ name,params }){ this.navigate({ name,params }) },
            compress(text,prepend,append){ text = textModify(text,prepend,append);
                return (text.length > this.max * (1+this.threshold/100))
                    ? [ text.substr(0,this.max/2-3),text.substr(text.length-this.max/2+3) ].join('.....')
                    : text;
            }
        }
    };
    function textModify(text,prepend,append){
        if(_.isEmpty(text)) return '';
        if(!_.isEmpty(prepend)) text = ['(',prepend,') ',text].join('');
        if(!_.isEmpty(append)) text = [text,' (',append,')'].join('');
        return text;
    }
</script>

<style scoped>
    .breadcrumb-enter-active, .breadcrumb-leave-active {transition: all 0.2s linear;}
    .breadcrumb-leave-active {position: absolute;}
    .breadcrumb-enter {transform: translateY(-0.5rem);opacity: 0;}
    .breadcrumb-leave, .breadcrumb-enter-to {transform: translateY(0);opacity: 1;}
    .breadcrumb-leave-to {transform: translateY(0.5rem);opacity: 0;}
</style>