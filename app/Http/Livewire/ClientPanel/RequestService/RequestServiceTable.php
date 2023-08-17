<?php

namespace App\Http\Livewire\ClientPanel\RequestService;

use App\Models\RequestService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequestServiceTable extends Component
{
    protected $listeners = [
        'refresh_inventory_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.client-panel.request-service.request-service-table',[
            'RequestServiceData' =>  RequestService::where('client_id',Auth::user()->id)->get()
        ]);
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
