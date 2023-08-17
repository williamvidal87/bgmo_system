<?php

namespace App\Http\Livewire\AdminPanel\ManageUser;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClientTable extends Component
{
    protected $listeners = [
        'refresh_client_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-user.client-table',[
            'ClientData' =>  User::all()->where('rule_id',2)
        ]);
    }

    public function editClient($UserID){
        $this->emit('openClientModal');
        $this->emit('editClientData',$UserID);
    }

    public function createClient(){
        $this->emit('openClientModal');
    }

    public function deleteClient($UserID){
        $this->emit('openSwalDelete',$UserID);
    }

    public function DeleteData($UserID){
        User::destroy($UserID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
