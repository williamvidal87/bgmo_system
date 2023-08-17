<?php

namespace App\Http\Livewire\AdminPanel\Inventory;

use App\Models\Inventory;
use Livewire\Component;

class InventoryTable extends Component
{
    protected $listeners = [
        'refresh_inventory_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.inventory.inventory-table',[
            'InventoryData' =>  Inventory::all()
        ]);
    }

    public function editInventory($InventoryID){
        $this->emit('openInventoryModal');
        $this->emit('editInventoryData',$InventoryID);
    }

    public function createInventory(){
        $this->emit('openInventoryModal');
    }
    
    public function viewInventory($InventoryID){
        $this->emit('openInventoryView');
        $this->emit('viewInventoryData',$InventoryID);
    }

    public function deleteInventory($InventoryID){
        $this->emit('openSwalDelete',$InventoryID);
    }

    public function DeleteData($InventoryID){
        Inventory::destroy($InventoryID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
