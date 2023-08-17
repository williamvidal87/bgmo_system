<div>
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-wrench"></i>
        </span> Manage Requesting Maintenance & Repair
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
                        <th>Work Description</th>
                        <th>Location</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Set Scheduled</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($RequestServiceData as $data)
                        <tr>
                            <td>{{ "RS" }}{{ 10060292+$data->id }}</td>
                            <td>{{ $data->getClientID->getDept->department_name }}</td>
                            <td>{{ $data->getClientID->name }}</td>
                            <td>{{ $data->work_description }}</td>
                            <td>{{ $data->location}}</td>
                            <td>
                                <?php
                                if(!empty($data->schedule)){
                                $date=$data->schedule;
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
                                <?php
                                if(!empty($data->set_schedule)){
                                $date=$data->set_schedule;
                                $date = new DateTime($date);
                                echo $date->format('d/m/y h:i A');
                                }else {
                                }
                                ?>
                            </td>
                            <td>
                            </td>
                            @else
                                <td>
                                    <small class="badge badge-secondary">{{ $data->getStatus->status ?? " " }}</small>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" wire:click="editRequestService({{$data->id}})"><i class="mdi mdi-eye"></i> View</button>
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
  <div wire.ignore.self class="modal fade" id="RequestServiceModal" role="dialog" tabindex="-1" aria-labelledby="RequestServiceModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
          <div class="modal-content">
              <livewire:admin-panel.requesting-services.requesting-services-view />
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
    @include('layouts.scripts.requesting-services-table-scripts'); 
@endsection