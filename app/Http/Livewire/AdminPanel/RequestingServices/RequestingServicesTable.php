<?php

namespace App\Http\Livewire\AdminPanel\RequestingServices;

use App\Models\RequestService;
use Livewire\Component;

class RequestingServicesTable extends Component
{
    protected $listeners = [
        'refresh_inventory_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.requesting-services.requesting-services-table',[
            'RequestServiceData' =>  RequestService::all()
        ])->with('getClientID');
    }

    public function editRequestService($RequestServiceID){
        $this->emit('openRequestServiceModal');
        $this->emit('editRequestServiceData',$RequestServiceID);
    }

    public function createRequestService(){
        $this->emit('openRequestServiceModal');
    }

    public function deleteRequestService($RequestServiceID){
        $this->emit('openSwalDelete',$RequestServiceID);
    }

    public function DeleteData($RequestServiceID){
        RequestService::destroy($RequestServiceID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
