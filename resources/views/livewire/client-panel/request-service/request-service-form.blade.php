<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Maintenance & Repair</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeRequestServiceForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    
        <div class="form-group">
            <label for="work_description">Work Description</label>
            <input type="text" class="form-control" placeholder="Work Description" id="work_description" wire:model="work_description">
            @error('work_description') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" placeholder="Location" id="location" wire:model="location">
            @error('location') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="schedule">Schedule Date (<small>Optional</small>)</label>
            <input type="datetime-local" class="form-control" id="schedule" wire:model="schedule">
            @error('schedule') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        
        <label for="images"><strong>Upload Image</strong>(<small>Optional</small>)</label>
        <div class="form-group">
            Photo Preview:
            @foreach ($this->images as $image)
            @endforeach
            <div class="row">
                @foreach ($this->images as $image)
                @endforeach
                @if($this->edit_data==1)
                    @foreach ($this->images as $image)
                        <div class="col-sm-2">
                            @if($this->temp_images==$this->images)
                                <a href="/storage/{{ $image }}" alt="Image View" target="_blank">
                                <img style="width: 0.80in;height:0.80in" src="/storage/{{ $image }}"></a>
                            @else
                                <img style="width: 0.80in;height:0.80in" src="{{ $image->temporaryUrl() }}">
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="col-sm-12">
                        @foreach ($this->images as $image)
                                <img style="width: 0.80in;height:0.80in" src="{{ $image->temporaryUrl() }}">
                        
                        @endforeach
                    </div>
                @endif
            </div>
            
            <div class="mb-3">
                <input type="file" id="images" class="form-control" wire:model="images" multiple accept="image/*">
                <div wire:loading wire:target="images">Uploading...</div>
                @error('images.*') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeRequestServiceForm">Close</button>
        @if(!empty($this->RequestServiceID))
            <button class="btn btn-primary" wire:click="store">Save changes</button>
        @else
            <button class="btn btn-primary" wire:click="store">Submit</button>
        @endif
    </div>
</div>
