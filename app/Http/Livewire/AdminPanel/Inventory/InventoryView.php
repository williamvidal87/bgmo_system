<?php

namespace App\Http\Livewire\AdminPanel\Inventory;

use App\Models\Inventory;
use Livewire\Component;

class InventoryView extends Component
{
    public  $data = [];
    public  $equipment_name,
            $property_no,
            $serial_no,
            $specs,
            $acquisition_date;
    public  $InventoryID;
    public  $status_id,
            $status_check;
    
    protected $listeners = ['viewInventoryData'];
    

    public function viewInventoryData($InventoryID)
    {
        $this->InventoryID=$InventoryID;
        $DATA=Inventory::find($this->InventoryID);
        $DATA->with('getStatus');
        $this->equipment_name = $DATA['equipment_name'];
        $this->property_no = $DATA['property_no'];
        $this->serial_no = $DATA['serial_no'];
        $this->specs = $DATA['specs'];
        $this->acquisition_date = $DATA['acquisition_date'];
        $this->status_id = $DATA->getStatus->status;
        $this->status_check = $DATA['status_id'];
        

    }

    public function render()
    {
        return view('livewire.admin-panel.inventory.inventory-view');
    }
    
    public function setDefective()
    {
        $this->data = ([
            'status_id'                 => 6
        ]);
        
        try {
            if($this->InventoryID){
                Inventory::find($this->InventoryID)->update($this->data);
                $this->emit('alert_update');
            }else{
            
            }
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        $this->emit('closeInventoryView');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function setAvailable()                  //for   setAvailable
    {
        $this->data = ([
            'status_id'                 => 4,
            'client_id'                 => null
        ]);
        
        try {
            if($this->InventoryID){
                Inventory::find($this->InventoryID)->update($this->data);
                $this->emit('alert_update');
            }else{
            
            }
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        $this->emit('closeInventoryView');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeInventoryViewModal(){
        $this->emit('closeInventoryView');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
