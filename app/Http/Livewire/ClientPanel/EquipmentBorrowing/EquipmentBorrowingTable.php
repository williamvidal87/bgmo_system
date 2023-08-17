<?php

namespace App\Http\Livewire\ClientPanel\EquipmentBorrowing;

use App\Models\BorrowEquipmentUse;
use App\Models\EquipmentBorrowing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EquipmentBorrowingTable extends Component
{
    protected $listeners = [
        'refresh_equipmentborrowing_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.client-panel.equipment-borrowing.equipment-borrowing-table',[
            'EquipmentBorrowingData' => EquipmentBorrowing::all()->where('client_id',Auth::user()->id),
            'UsedEquipments' => BorrowEquipmentUse::all(),
            ])->with('getStatus','getItemName');
    }

    public function editEquipmentBorrowing($EquipmentBorrowingID){
        $this->emit('openEquipmentBorrowingModal');
        $this->emit('editEquipmentBorrowingData',$EquipmentBorrowingID);
    }

    public function createEquipmentBorrowing(){
        $this->emit('openEquipmentBorrowingModal');
    }

    public function deleteEquipmentBorrowing($EquipmentBorrowingID){
        $this->emit('openSwalDelete',$EquipmentBorrowingID);
    }

    public function DeleteData($EquipmentBorrowingID){
        $search_sample2=BorrowEquipmentUse::where('used_id',$EquipmentBorrowingID)->get();
        foreach ($search_sample2 as $search_samp3){
            BorrowEquipmentUse::destroy($search_samp3['id']);
        }
        EquipmentBorrowing::destroy($EquipmentBorrowingID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
