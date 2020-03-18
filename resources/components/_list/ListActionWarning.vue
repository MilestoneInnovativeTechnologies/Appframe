<template>
    <div class="modal modal-alert fade" id="ListWarningModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title"><icon class="text-warning mr-1">bullhorn</icon> Confirm </h5></div>
                <div class="modal-body"><p class="warning-msg"></p></div>
                <div class="modal-footer">
                    <button type="button" id="ListWarningDismiss" class="btn btn-warning">Proceed</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListActionWarning"
    }
</script>