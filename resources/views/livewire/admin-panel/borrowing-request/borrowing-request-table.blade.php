<div>
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-briefcase"></i>
        </span> Manage Borrowing Request
      </h3>
    </div>
    <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="dataTable" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Request No.</th>
                        <th>Department</th>
                        <th>Client Name</th>
                        <th>Equipment to borrow</th>
                        <th>Purpose</th>
                        <th>Date Release</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($EquipmentBorrowingData as $data)
                        <tr>
                            <td>{{ "BR" }}{{ 2200+$data->id }}</td>
                            <td>{{ $data->getClientID->getDept->department_name }}</td>
                            <td>{{ $data->getClientID->name }}</td>
                            <td>
                                @foreach ($UsedEquipments as $data2)
                                @if ($data2->used_id==$data->id)
                                {{ $data2->getItemName->equipment_name }},
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $data->purpose }}</td>
                            <td>
                                <?php
                                if(!empty($data->date_release)){
                                $date=$data->date_release;
                                $date = new DateTime($date);
                                echo $date->format('d/m/y h:i A');
                                }else {
                                }
                                ?>
                            </td>
                            @if($data->status_id!=2)
                            <td>
                                @if($data->status_id==2)
                                    <small class="badge badge-gradient-secondary">{{ $data->getStatus->status ?? " " }}</small>
                                @endif
                                @if($data->status_id==1)
                                    <small class="badge badge-gradient-success">{{ $data->getStatus->status ?? " " }}</small>
                                @endif
                                @if($data->status_id==3)
                                    <small class="badge badge-gradient-danger">{{ $data->getStatus->status ?? " " }}</small>
                                @endif
                            </td>
                            <td>
                            </td>
                            @else
                                <td>
                                    <small class="badge badge-secondary">{{ $data->getStatus->status ?? " " }}</small>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" wire:click="editEquipmentBorrowing({{$data->id}})"><i class="mdi mdi-eye"></i> View</button>
                                </td>
                            @endif
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
  <div wire.ignore.self class="modal fade" id="EquipmentBorrowingModal" role="dialog" tabindex="-1" aria-labelledby="EquipmentBorrowingModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
          <div class="modal-content">
            <livewire:admin-panel.borrowing-request.borrowing-request-view />
          </div>
      </div>
  </div>
  
  {{-- Remarks  --}}
  <div wire.ignore.self class="modal fade" id="RemarkModal" role="dialog" tabindex="-1" aria-labelledby="RemarkModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-sm" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
          <div class="modal-content">
            <livewire:admin-panel.remark.remark-form />
          </div>
      </div>
  </div>
  
</div>

@section('custom_script')
    @include('layouts.scripts.borrowing-request-table-scripts'); 
@endsection