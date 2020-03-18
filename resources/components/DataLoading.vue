<template>
    <div class="bsdata_loading">
        <div class="card">
            <div class="card-header clearfix">
                <h3 class="float-left mb-0"><span>{{ random_text() }}</span></h3>
                <div class="float-right w-75">
                    <ul class="nav nav-pills float-right card-header-pills">
                        <li class="nav-item" v-for="n in range(3)">
                            <a class="nav-link btn btn-secondary text-light mx-1 btn-xs" href="#">{{ random_text() }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4" v-for="m in range(3)">
                        <div class="card-text"><h4 class="card-title"><span>{{ random_text() }}</span></h4>
                            <dl v-for="n in range(2)">
                                <dt><span>{{ random_text() }}</span></dt>
                                <dd><span>{{ random_text() }}</span></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card-text"><h5><span>{{ random_text() }}</span></h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">
                                    <thead class="thead-light"><tr><th v-for="m in range(4)"><span>{{ random_text() }}</span></th></tr></thead>
                                    <tbody><tr v-for="m in range()"><td v-for="n in range(4)"><span>{{ random_text() }}</span></td></tr></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" v-for="n in range(3)">
                        <div class="card-text"><h4 class="card-title"><span>{{ random_text() }}</span></h4>
                            <dl v-for="o in range()">
                                <dt><span>{{ random_text() }}</span></dt>
                                <dd><span>{{ random_text() }}</span></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DataLoading",
        methods: {
            random_text() {
                return _.range(parseInt(Math.random() * 10) + 6).join('');
            },
            range(n) {
                return _.range(n || parseInt(Math.random() * 10) + 4)
            }
        }
    }
</script>

<style scoped>
    span {background: linear-gradient(45deg, #E3E3E3 0%, #E3E3E3 45%, #EFEFEF 50%, #E3E3E3 55%);color: #E3E3E3 !important;animation: load 3s linear 0s infinite;}
    @keyframes load {
        0% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 0%, #E7E7E7 0%, #E3E3E3 0%, #E3E3E3 100%)}
        3% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 5%, #E7E7E7 10%, #E3E3E3 15%, #E3E3E3 100%)}
        6% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 15%, #E7E7E7 20%, #E3E3E3 25%, #E3E3E3 100%)}
        9% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 25%, #E7E7E7 30%, #E3E3E3 35%, #E3E3E3 100%)}
        12% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 35%, #E7E7E7 40%, #E3E3E3 45%, #E3E3E3 100%)}
        15% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 45%, #E7E7E7 50%, #E3E3E3 55%, #E3E3E3 100%)}
        18% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 55%, #E7E7E7 60%, #E3E3E3 65%, #E3E3E3 100%)}
        21% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 65%, #E7E7E7 70%, #E3E3E3 75%, #E3E3E3 100%)}
        24% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 75%, #E7E7E7 80%, #E3E3E3 85%, #E3E3E3 100%)}
        27% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 85%, #E7E7E7 90%, #E3E3E3 95%, #E3E3E3 100%)}
        30%, 100% {background: linear-gradient(135deg, #E3E3E3 0%, #E3E3E3 95%, #E7E7E7 100%, #E3E3E3 100%, #E3E3E3 100%)}
    }
</style>