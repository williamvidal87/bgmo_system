<div>
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-wrench"></i>
        </span> Availability Of Equipment
      </h3>
    </div>
    <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <button type="button" class="btn btn-gradient-info btn-icon-text" wire:click="createInventory"><i class="mdi mdi-plus-circle btn-icon-prepend"></i> Add Equipment</button>
          <br><br>
          <div class="table-responsive">
            <table id="dataTable" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Equipment ID.</th>
                        <th>Equipment Name</th>
                        <th>Client Assign</th>
                        <th>Status</th>
                        <th class="notexport">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($InventoryData as $data)
                        <tr>
                            <td><u><a href="javascript: void(0)" wire:click="viewInventory({{$data->id}})">{{ "EP" }}{{ 1002039200+$data->id }}</a></u></td>
                            <td>{{ $data->equipment_name }}</td>
                            <td>{{ $data->getClient->name ?? " " }}</td>
                            <td>
                                @if($data->status_id==4)
                                    <small class="badge badge-gradient-success">{{ $data->getStatus->status ?? " " }}</small>
                                @endif
                                @if($data->status_id==7)
                                    <small class="badge badge-gradient-warning">{{ $data->getStatus->status ?? " " }}</small>
                                @endif
                                @if($data->status_id==6)
                                    <small class="badge badge-gradient-danger">{{ $data->getStatus->status ?? " " }}</small>
                                @endif
                            </td>
                            <td>
                            <button type="button" class="btn btn-secondary btn-sm" wire:click="viewInventory({{$data->id}})"><i class="mdi mdi-eye"></i> View</button> |
                            <button type="button" class="btn btn-info btn-sm" wire:click="editInventory({{$data->id}})"><i class="mdi mdi-lead-pencil"></i> Edit</button> |
                            <button type="button" class="btn btn-danger btn-sm" wire:click="deleteInventory({{$data->id}})"><i class="mdi mdi-delete"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  {{-- create edit --}}
  <div wire.ignore.self class="modal fade" id="InventoryModal" role="dialog" tabindex="-1" aria-labelledby="InventoryModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
          <div class="modal-content">
              <livewire:admin-panel.inventory.inventory-form />
          </div>
      </div>
  </div>
  {{-- view --}}
  <div wire.ignore.self class="modal fade" id="InventoryViewModal" role="dialog" tabindex="-1" aria-labelledby="InventoryViewModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
          <div class="modal-content">
              <livewire:admin-panel.inventory.inventory-view />
          </div>
      </div>
  </div>
  
</div>

@section('custom_script')
    @include('layouts.scripts.admin-inventory-table-scripts'); 
@endsection