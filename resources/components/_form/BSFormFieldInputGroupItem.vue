<script>
    export default {
        name: "BSFormFieldInputGroupItem",
        inheritAttrs: false,
        props: ['iPosition','iType','iIcon','iText'],
        render(h){
            let tag = (this.iType === 'icon') ? 'div' : 'label', cls = 'input-group-'+this.iPosition,
                node = (this.iType === 'icon') ? [h('icon',[this.iIcon])] : [this.iText];
            return h(tag,{ class:cls },[h('span',{ class:'input-group-text' },node)]);
        }
    }
</script>