<template>
    <div class="bsform_loading">
        <div class="card w-75">
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6"><label>{{ random_text() }}</label><input type="text" class="form-control"></div>
                        <div class="form-group col-md-6"><label>{{ random_text() }}</label><input type="text" class="form-control"></div>
                    </div>
                    <div class="form-group"><label>{{ random_text() }}</label><textarea class="form-control"></textarea></div>
                    <div class="form-row">
                        <div class="form-group col-md-6"><label>{{ random_text() }}</label><input type="text" class="form-control"></div>
                        <div class="form-group col-md-4"><label>{{ random_text() }}</label><input type="text" class="form-control"></div>
                        <div class="form-group col-md-2"><label>{{ random_text() }}</label><input type="text" class="form-control"></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">{{ random_text() }}</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">{{ random_text() }}</label></div>
                    </div>
                    <button type="submit" class="btn btn-light" disabled>{{ random_text() }} {{ random_text() }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FormLoading",
        methods: {
            random_text(){ return _.range(parseInt(Math.random()*10)+3).join(''); }
        }
    }
</script>

<style scoped>
    label, input[type='text'], textarea, button { background: linear-gradient(45deg, #E3E3E3 0%, #E3E3E3 45%, #EFEFEF 50%, #E3E3E3 55%); color: #E3E3E3 !important; animation: load 3s linear 0s infinite; }
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