const state = {

};

const actions = {
    requestInterceptor({ commit },config){
        if(isEncRequired(config.data)){
            let request = config.data, form = VueApp.$store.state.FORM, fields = form.forms[request.form].fields, files = _.keys(_.pickBy(fields,(Obj) => Obj.type === 'file'));
            let formData = new FormData();
            _.forEach(request,function(value,name){
                if(name === 'data'){
                    _.forEach(value,function(dValue,dName){
                        if(!_.isEmpty(dValue)){
                            let FormDataValue = (_.includes(files,dName)) ? document.getElementsByName(dName)[0].files[0] : JSON.stringify(dValue);
                            formData.append('data['+dName+']',FormDataValue);
                        }
                    })
                } else {
                    if(value) formData.append(name,value)
                }
            });
            formData.append('__form_data','1'); formData.append('__files',JSON.stringify(files));
            config.data = formData;
            commit('updateConfig',config,{ root:true });
        }
    },
};

const mutations = {

};

const getters = {
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}

function isEncRequired(data){
    return !!data.form
    && _.some(VueApp.$store.state.FORM.forms[data.form].fields,(Obj) => Obj.type === 'file')
    && !_.every(_.pick(VueApp.$store.state.FORM.data[data.form],_.keys(_.pickBy(VueApp.$store.state.FORM.forms[data.form].fields,(Obj) => Obj.type === 'file'))),(val) => _.isEmpty(val));
}
