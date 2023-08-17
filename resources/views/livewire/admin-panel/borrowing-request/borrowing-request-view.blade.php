








<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Borrowing Request</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEquipmentBorrowingForm"><span aria-hidden="true">&times;</span></button>
    </div>
      <div class="card-body">
          <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                    <label for="purpose">Purpose</label>
                      <textarea class="form-control" id="purpose" rows="4" placeholder="Purpose"  wire:model="purpose" disabled></textarea>
                      @error('purpose') <span class="error">{{ $message }}</span> @enderror
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      {{-- sample --}}
                      
                      <label>Equipment to borrow</label>
                      <table class="table" id="products_table">
                        <thead>
                            <tr>
                                <th width="100%">Inventory Equipment</th>>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($orderProducts as $index => $orderProduct)
                          <tr>
                              <td>
                                  
                                  @foreach ($select_items as $product)
                                      @for ($i=0; $i < count($this->orderProducts); $i++)
                                          @if($product->id == $this->orderProducts[$i]['device_id'])
                                              @if($product->status_id==4)
                                              <input style="color: green" type="text" class="form-control" value="{{ $product->equipment_name }} - EP{{ 1002039200+$product->id }} - {{ $product->property_no ?? "none" }} - {{ $product->serial_no ?? "none" }} - {{ $product->specs ?? "none" }} ({{ $product->getStatus->status ?? "none" }})" disabled>
                                              @else
                                              <input style="color: red" type="text" class="form-control" value="{{ $product->equipment_name }} - EP{{ 1002039200+$product->id }} - {{ $product->property_no ?? "none" }} - {{ $product->serial_no ?? "none" }} - {{ $product->specs ?? "none" }} ({{ $product->getStatus->status ?? "none" }})" disabled>
                                              @endif
                                              
                                          @endif
                                      @endfor
                                  @endforeach
                                  
                                  
                              </td>
                          </tr>
                          @break
                          @endforeach
                        </tbody>
                    </table>
                      {{-- end sample --}}
                  </div>
              </div>
              <div class="form-group">
                  <label for="date_release">Date Of Release</label>
                  <input type="datetime-local" class="form-control" id="date_release" name="date_release" wire:model="date_release">
                  @error('date_release') <span style="color: red">{{ $message }}</span> @enderror
              </div>
          </div>
        
        
        
        
      </div>
      <!-- /.card-body -->
    
      
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" wire:click="closeEquipmentBorrowingForm">Close</button>
            <div>
              <button type="button" class="btn btn-danger" wire:click="SetCancel">Decline</button>
              <button type="button" class="btn btn-success" wire:click="SetApprove">Approve</button>
            </div>
        </div>
  </div>
  