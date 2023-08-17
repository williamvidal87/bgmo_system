<div>
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-account"></i>
        </span> Admin
      </h3>
    </div>
    <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <button type="button" class="btn btn-gradient-info btn-icon-text" wire:click="createAdmin"><i class="mdi mdi-plus-circle btn-icon-prepend"></i> Add Admin</button>
          <br><br>
          <div class="table-responsive">
            <table id="dataTable" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Last Seen</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($AdminData as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            @if(Cache::has('is_online' . $data->id))
                                <span class="text-success">Online</span>
                            @else
                                <span class="text-secondary">Offline</span>
                            @endif
                        </td>
                        <td>
                            @if($data->last_seen != null)
                                {{ \Carbon\Carbon::parse($data->last_seen)->diffForHumans() }}
                            @else
                                No data
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" wire:click="editAdmin({{$data->id}})"><i class="mdi mdi-lead-pencil"></i> Edit</button> |
                            <button type="button" class="btn btn-danger btn-sm" wire:click="deleteAdmin({{$data->id}})"><i class="mdi mdi-delete"></i> Delete</button>
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
    
  <div wire.ignore.self class="modal fade" id="AdminModal" role="dialog" tabindex="-1" aria-labelledby="AdminModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
          <div class="modal-content">
              <livewire:admin-panel.manage-user.admin-form />
          </div>
      </div>
  </div>
  
</div>

@section('custom_script')
    @include('layouts.scripts.admin-admin-table-scripts'); 
@endsection