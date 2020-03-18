const state = {
    lists: {},
    detail: {},
    layout: {},
    selected: {},
    relation: {},
    relation_update: false,
    handler: {
        'ListLayout': 'setLayout',
        'List': 'mergeList',
        'ListData': 'setDetail',
        'ListRelation': 'addListRelation',
        'ListRelationUpdated': 'setListRelationUpdate',
    },
};

const actions = {
    update({ dispatch },action){
        dispatch('post',{ action,update:true },{ root:true });
    },
    post({ dispatch },request){ dispatch('post',request,{ root:true }); },
    addListRelation({ state,rootGetters,commit },{ ListRelation,_response_data }) {
        let { action,id } = _response_data.request, rslv = rootGetters.resolution(action), relation = rslv['idn1'], list = rslv['idn2'], data = ListRelation[list][relation][id] || [];
        commit('createRelation', { list,relation,id,data });
    },
    updateRelation({ getters,dispatch },{ action,id,list,relation }){
        let data = getters.relation(list,relation,id);
        dispatch('post',{ action,id,data },{ root:true });
    },
};

const mutations = {
    mergeList(state,{ List }){
        let id = _.keys(List)[0], Obj = {}; Obj[id] = [];
        if(!state.lists[id]) { state.lists = Object.assign({},state.lists,Obj); let selected = {}; selected[id] = null; state.selected = Object.assign({},state.selected,selected) }
        if(_.isEmpty(List[id])) return; state.lists[id] = Object.assign({},state.lists[id],_.keyBy(List[id],'id'));
    },
    setLayout(state,{ ListLayout }){ state.layout = Object.assign({},state.layout,ListLayout); },
    setSelected(state,{ list,record }){ state.selected[list] = record; },
    createRelation(state,{ list,relation,id,data }){
        if(!state.relation[list]) state.relation = Object.assign({},state.relation,_.zipObject([list],[{}]));
        if(!state.relation[list][relation]) state.relation[list] = Object.assign({},state.relation[list],_.zipObject([relation],[{}]));
        if(state.relation[list][relation][id]) state.relation[list][relation][id].splice(0);
        state.relation[list][relation] = Object.assign({},state.relation[list][relation],_.zipObject([id],[data]));
    },
    updateRelation(state,{ list,relation,id,data,status }){
        if(status) state.relation[list][relation][id].push(data);
        else {
            let rel = _.map(state.relation[list][relation][id],_.toString), idx = _.indexOf(rel,_.toString(data));
            if(idx !== -1) state.relation[list][relation][id].splice(idx,1);
        }
    },
    setListRelationUpdate(state){ state.relation_update = true; },
    delListRelationUpdate(state){ state.relation_update = false; },
    setDetail(state,{ ListData }){ _.forEach(ListData,(Data,List) => Vue.set(state.detail,List,Data)) },
};

const getters = {
    list(state){ return (id) => state.lists[id] },
    layout(state){ return (id) => state.layout[id] || _(_.head(_.values(state.lists[id]))).pickBy((val) => !(_.isArray(val) || _.isObject())).keys().mapKeys((field) => _.startCase(_.replace(field,/(\W|_)/g,' '))).mapValues((field) => _.zipObject(['field','path'],[field,''])).value() },
    selected(state){ return (id) => state.selected[id] },
    detail({ detail }){ return (id) => detail[id] },
    relation(state){ return (list,relation,id) => state.relation[list][relation][id] },
    record(state,{ list }){ return (listId,recordId) => list(listId)[recordId] },
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}
