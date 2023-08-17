<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Equipement</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeInventoryForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    
        <div class="form-group">
            <label for="equipment_name">Equipment Name</label>
            <input type="text" class="form-control" placeholder="Equipment Name" id="equipment_name" wire:model="equipment_name">
            @error('equipment_name') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="property_no">Property No (<small>Optional</small>)</label>
            <input type="text" class="form-control" placeholder="Property No" id="property_no" wire:model="property_no">
            @error('property_no') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="serial_no">Serial No (<small>Optional</small>)</label>
            <input type="text" class="form-control" placeholder="Serial No" id="serial_no" wire:model="serial_no">
            @error('serial_no') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="specs">Specs (<small>Optional</small>)</label>
            <textarea class="form-control" id="specs" rows="4" placeholder="Specs"  wire:model="specs"></textarea>
            @error('specs') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="acquisition_date">Acquisition Date (<small>Optional</small>)</label>
            <input type="datetime-local" class="form-control" id="acquisition_date" wire:model="acquisition_date">
            @error('acquisition_date') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeInventoryForm">Close</button>
        @if(!empty($this->InventoryID))
            <button class="btn btn-primary" wire:click="store">Save changes</button>
        @else
            <button class="btn btn-primary" wire:click="store">Submit</button>
        @endif
    </div>
</div>
