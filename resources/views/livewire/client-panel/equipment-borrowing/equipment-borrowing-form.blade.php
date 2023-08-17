








<div>
  <div class="modal-header">
      <h1 class="modal-title" id="exampleModalLabel">Equipment To Borrow</h1>
      <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEquipmentBorrowingForm"><span aria-hidden="true">&times;</span></button>
  </div><form wire:submit.prevent="store" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label for="purpose">Purpose</label>
                    <textarea class="form-control" id="purpose" rows="4" placeholder="Purpose"  wire:model="purpose"></textarea>
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
                              <th width="70%">Inventory Equipment</th>
                              <th width="30%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($orderProducts as $index => $orderProduct)
                          <tr>
                              <td>
                                  <select name="orderProducts[{{$index}}][device_id]"
                                      wire:model="orderProducts.{{$index}}.device_id"
                                      class="form-control form-control-lg" style="color:black" required>
                                      <option value="">-- choose Equipment --</option>
                                      @foreach ($select_items as $product)
                                      <option 
                                      <?php
                                          if ($product->status_id!=4) {
                                            echo "hidden";
                                          }
                                      ?>
                                      <?php 
                                                for ($i=0; $i < count($this->orderProducts); $i++) {
                                                  if(!empty($this->orderProducts[$i]['device_id'])){
                                                    if ($product->id == $this->orderProducts[$i]['device_id']) {
                                                      if ($this->orderProducts[$index]['device_id'] == $this->orderProducts[$i]['device_id']) {
                                                      // echo "none";
                                                      } else {
                                                      echo "disabled";
                                                      }
                                                    }
                                                  }
                                                }
                                          ?> value="{{ $product->id }}">{{ $product->equipment_name }} - DE{{ 1002039200+$product->id }} - {{ $product->property_no ?? "none" }} - {{ $product->serial_no ?? "none" }} - {{ $product->specs ?? "none" }}<?php 
                                                for ($i=0; $i < count($this->orderProducts); $i++) {
                                                  if(!empty($this->orderProducts[$i]['device_id'])){
                                                    if ($product->id == $this->orderProducts[$i]['device_id']) {
                                                      if ($this->orderProducts[$index]['device_id'] == $this->orderProducts[$i]['device_id']) {
                                                      // echo "none";
                                                      } else {
                                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You Already taken.";
                                                      }
                                                    }
                                                  }
                                                }
                                          ?></option>
                                      @endforeach
                                  </select>
                              </td>
                              <td>
                                  <button wire:click.prevent="removeProduct({{$index}})" class="btn btn-gradient-danger btn-sm"><i class="mdi mdi-delete"></i>Delete</button>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <div class="row">
                      <div class="col-md-12">
                          <button class="btn btn-gradient-info btn-sm" wire:click.prevent="addProduct">+ Add Equipment</button>
                      </div>
                  </div>
                    {{-- end sample --}}
                </div>
            </div>
        </div>
      
      
      
      
    </div>
    <!-- /.card-body -->
  
    
      <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" wire:click="closeEquipmentBorrowingForm">Close</button>
          @if(!empty($this->BorrowEquipmentRequestID))
              <button type="submit" class="btn btn-primary">Save changes</button>
          @else
              <button type="submit" class="btn btn-primary">Submit</button>
          @endif
      </div>
  </form>
</div>
