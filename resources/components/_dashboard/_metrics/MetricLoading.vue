<template>
    <div class="metric_loading">
        <div class="card">
            <div class="card-body" style="min-height: 100px">
                <span>{{ random_text() }}</span> <span>{{ random_text() }}</span> <span>{{ random_text() }}</span><br>
                <span>{{ random_text() }}</span> <span>{{ random_text() }}</span> <span>{{ random_text() }}</span><br>
                <span>{{ random_text() }}</span> <span>{{ random_text() }}</span> <span>{{ random_text() }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MetricLoading",
        methods: {
            random_text(){ return _.range(parseInt(Math.random()*10)+6).join(''); },
        }
    }
</script><style scoped>
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