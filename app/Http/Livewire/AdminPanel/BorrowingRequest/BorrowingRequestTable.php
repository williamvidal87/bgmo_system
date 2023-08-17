<?php

namespace App\Http\Livewire\AdminPanel\BorrowingRequest;

use App\Models\BorrowEquipmentUse;
use App\Models\EquipmentBorrowing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BorrowingRequestTable extends Component
{
    protected $listeners = [
        'refresh_equipmentborrowing_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.borrowing-request.borrowing-request-table',[
            'EquipmentBorrowingData' => EquipmentBorrowing::all(),
            'UsedEquipments' => BorrowEquipmentUse::all(),
            ])->with('getStatus','getItemName','getClientID');
    }

    public function editEquipmentBorrowing($EquipmentBorrowingID){
        $this->emit('openEquipmentBorrowingModal');
        $this->emit('editEquipmentBorrowingData',$EquipmentBorrowingID);
    }
}
