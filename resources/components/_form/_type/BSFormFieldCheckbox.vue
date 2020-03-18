<template>
    <div>
        <div class="form-check" v-for="(label,id) in options" :key="[dataFormId,name,id].join('-')">
            <input class="form-check-input" type="checkbox" :name="name" :value="id" v-model="value" :id="['radio',dataFormId,name,id].join('-')">
            <label class="form-check-label" :for="['radio',dataFormId,name,id].join('-')">{{ label }}</label>
        </div>
    </div>
</template>

<script>
    import { mapGetters,mapActions } from 'vuex';
    import { fieldValueMixin } from './../../../js/common/BSFormFieldValueMixin';
    export default {
        name: "BSFormFieldCheckbox",
        mixins: [fieldValueMixin],
        props:['dataFormId','name'],
        inheritAttrs: false,
        computed: {
            ...mapGetters('FORM',{ getOption:'option' }),
            ...mapGetters('FOPT',{ getOptions:'get' }),
            option(){ return _.get(this.getOption(this.dataFormId,this.name),'id') },
            options(){ return this.getOptions(this.option) },
        },
        methods: {
            ...mapActions('FOPT',{ fetchOptions:'fetch' }),
        },
        created(){
            if(!this.options) this.fetchOptions(this.option)
        }
    }
</script>