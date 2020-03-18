
const requireComponent = require.context('../components',true,/\.vue$/);

requireComponent.keys().forEach(Name => {
    let Options = requireComponent(Name);
    Vue.component(Name.replace(/^\.\/(_\w+\/)*(.*)\.\w+$/, '$2'),Options.default || Options);
});

const vueGraphWidgets = ['note','legends','tooltip','guideline'];
vueGraphWidgets.forEach(Name => {
    let Options = require('vue-graph/src/widgets/' + Name + '.js');
    Vue.component(Options.default.name,Options.default || Options);
});

const vueGraphs = ['line-dateblock','bar','line','area'];
vueGraphs.forEach(Name => {
    let Options = require('vue-graph/src/components/' + Name + '.js');
    Vue.component(Options.default.name,Options.default || Options);
});
