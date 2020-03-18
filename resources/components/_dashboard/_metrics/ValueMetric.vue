<template>
    <div class="card">
        <div class="card-header">{{ name }}</div>
        <div class="card-body">
            <div class="card-text d-flex justify-content-between align-items-center">
                <div class="display-4 font-weight-bold float-left">{{ current }}</div>
                <div class="slot text-center d-flex">
                    <div class="icon"><Icon :class="cls" class="fa-3x">long-arrow-alt-up</Icon></div>
                    <div class="text text-center ml-3">
                        <p class="m-0">{{ percentage }}% - {{ position }}</p>
                        <p class="m-0">{{ previous }} - Previous</p>
                    </div>
                </div>
                <div class="slot"></div>
            </div>

            <div class="card-text">

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ValueMetric",
        props: ['data','name'],
        computed: {
            action(){ return this.$route.params.action },
            current(){ let current = _.find(this.data,['__STATE','CURRENT']); return (current) ? current.__VALUE : 0 },
            previous(){ let previous = _.find(this.data,['__STATE','PREVIOUS']); return (previous) ? previous.__VALUE : 0 },
            sign(){ return (this.previous <= this.current) ? 1 : 0 },
            cls(){ let arr = { text:['danger','success'],'fa-rotate':[180,0] }, sign = this.sign; return _.map(arr,(ary,pre) => [pre,ary[sign]].join('-')) },
            percentage(){ return Math.abs((this.previous-this.current)*100/(this.previous || 1)) },
            position(){ return ['Decrease','Increase'][this.sign] }
        }
    }
</script>