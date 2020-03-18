const state = {
    list: {},
    items: {},
    handler: {
        List: 'addList',
        ListSearchItems: 'setListSearchItems'
    },
};

const actions = {
    post({ dispatch },request){ dispatch('post',request,{ root:true }); },
};

const mutations = {
    addList({ list,items },{ List,_response_data }){ if(_response_data.Resolve) _.each(List,(Ary,id) => { Vue.set(list,id,{ 'term':null,'page':1 }); Vue.set(items,id,{}) }) },
    setListSearchItems({ items },{ ListSearchItems }){ _.each(ListSearchItems,(termItems,id) => _.each(termItems,(ary,term) => Vue.set(items[id],term,ary))) },
    setTerm({ list },{ id,term }){ list[id].term = term },
    setPage({ list },{ id,page }){ list[id].page = page },
};

const getters = {
    items:({ items,list }) => (id) => items[id][list[id].term],
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}