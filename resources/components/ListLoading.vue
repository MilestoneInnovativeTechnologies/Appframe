<template>
    <div class="bslist_loading">
        <div class="card">
            <div class="card-header">
                <div class="float-right w-75">
                    <ul class="nav nav-pills float-right card-header-pills">
                        <li class="nav-item" v-for="n in range(bts)">
                            <a class="nav-link btn btn-secondary text-light mx-1 btn-xs" href="#">{{ random_text() }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm mb-0 table-hover">
                        <thead class="thead-light"><tr><th></th><th v-for="n in range(cls)"><span>{{ random_text() }}</span></th></tr></thead>
                        <tbody><tr v-for="r in range()"><td><input class="mt-1" disabled type="checkbox"></td><td v-for="m in range(cls)"><span>{{ random_text() }}</span></td></tr></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListLoading",
        props: {
            bts: { default:5 },
            cls: { default:5 },
        },
        methods: {
            random_text(){ return _.range(parseInt(Math.random()*10)+6).join(''); },
            range(n){ return _.range(n || parseInt(Math.random()*10)+4) }
        }
    }
</script>

<style scoped>
    span { background: linear-gradient(45deg, #E3E3E3 0%, #E3E3E3 45%, #EFEFEF 50%, #E3E3E3 55%); color: #E3E3E3 !important; animation: load 3s linear 0s infinite; }
    @keyframes load {
        0% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 0%, #E7E7E7 0%, #E3E3E3 0%, #E3E3E3 100%) }
        3% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 5%, #E7E7E7 10%, #E3E3E3 15%, #E3E3E3 100%) }
        6% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 15%, #E7E7E7 20%, #E3E3E3 25%, #E3E3E3 100%) }
        9% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 25%, #E7E7E7 30%, #E3E3E3 35%, #E3E3E3 100%) }
        12% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 35%, #E7E7E7 40%, #E3E3E3 45%, #E3E3E3 100%) }
        15% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 45%, #E7E7E7 50%, #E3E3E3 55%, #E3E3E3 100%) }
        18% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 55%, #E7E7E7 60%, #E3E3E3 65%, #E3E3E3 100%) }
        21% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 65%, #E7E7E7 70%, #E3E3E3 75%, #E3E3E3 100%) }
        24% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 75%, #E7E7E7 80%, #E3E3E3 85%, #E3E3E3 100%) }
        27% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 85%, #E7E7E7 90%, #E3E3E3 95%, #E3E3E3 100%) }
        30%, 100% { background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 95%, #E7E7E7 100%, #E3E3E3 100%, #E3E3E3 100%) }
    }
</style>