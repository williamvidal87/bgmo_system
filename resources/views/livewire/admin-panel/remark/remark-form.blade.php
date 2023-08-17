<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Remarks</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeRemark"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" id="remark" wire:model="remark" required>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" wire:click="SaveRemark">Yes</button>
        <button type="button" class="btn btn-secondary" wire:click="closeRemark">No</button>
    </div>
</div>

