const state = {
    first: 5,
    last: 3,
    cont: '...',
    list: {},
    items: {},
    handler: {
        List: ['setListPageOneItems','addUpdateToPagination'],
        ListData: ['setList','setItem'],
        ListPageItems: 'setListPageItems'
    },
};

const actions = {
    setListPageOneItems({ commit },{ List,_response_data }){
        if(_response_data.Resolve) _.each(List,(lists,list) => commit('setListPageItem',{ list,page:1,items:_.map(lists,'id') }) )
    },
    setListPageItems({ commit,dispatch },{ ListPageItems }){
        _.each(ListPageItems,(pageItems,list) => _.each(pageItems,(items,page) => commit('setListPageItem',{ list,page,items })))
    },
    addUpdateToPagination({ state,commit,dispatch },{ List,_response_data }){
        if(_response_data.request.update && !_.isEmpty(_.values(List)))
            _.each(List,(lists,list) => {
                let items = _.concat(state.items[list][1],_.map(lists,'id'));
                commit('setListPageItem',{ list,items,page:1 });
                dispatch('pageWiseArrange',list);
            })
    },
    pageWiseArrange({ state,commit },list){
        let all = _.uniq(_.flatMap(state.items[list]));
        _.each(_.chunk(all,state.list[list].items),(items,idx) => commit('setListPageItem',{ list,page:idx+1,items}) )
    },
    post({ dispatch },request){ dispatch('post',request,{ root:true }); },
};

const mutations = {
    setPage(state,{ list,page }){ state.list[list].page = page },
    setList(state,{ ListData }){ _.each(ListData,(data,list) => Vue.set(state.list,list,{ ...data,page:1 })) },
    setItem(state,{ ListData }){ _.each(ListData,(data,list) => Vue.set(state.items,list,{})) },
    setListPageItem(state,{ list,page,items }){ Vue.set(state.items[list],page,items) },
};

const getters = {
    list(state){ return (id) => state.list[id] },
    items(state){ return (id) => state.items[id][state.list[id].page] },
};

export default {
    namespaced: true,
    state, getters, actions, mutations
}