<?php

namespace App\Http\Livewire\AdminPanel\Inventory;

use App\Models\Inventory;
use Livewire\Component;

class InventoryForm extends Component
{
    public  $data = [];
    public  $equipment_name,
            $property_no,
            $serial_no,
            $specs,
            $acquisition_date;
    public  $InventoryID;
    
    protected $listeners = ['editInventoryData'];
    
    public function render()
    {
        return view('livewire.admin-panel.inventory.inventory-form');
    }

    public function editInventoryData($InventoryID)
    {
        $this->InventoryID=$InventoryID;
        $DATA=Inventory::find($this->InventoryID);
        $this->equipment_name      = $DATA['equipment_name'];
        $this->property_no      = $DATA['property_no'];
        $this->serial_no        = $DATA['serial_no'];
        $this->specs            = $DATA['specs'];
        $this->acquisition_date = $DATA['acquisition_date'];

    }
    
    public function store()
    {
        
        $this->validate([
            'equipment_name'       => 'required',
            'property_no'       => '',
            'serial_no'         => '',
            'specs'             => '',
            'acquisition_date'  => '',
        ]);
        
        $this->data = ([
            'equipment_name'                       => $this->equipment_name,
            'property_no'                       => $this->property_no,
            'serial_no'                         => $this->serial_no,
            'specs'                             => $this->specs,
            'acquisition_date'                  => $this->acquisition_date
        ]);

        try {
            if($this->InventoryID){
                Inventory::find($this->InventoryID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
                $this->data['status_id']=4;
                $show=Inventory::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeInventoryModal');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeInventoryForm(){
        $this->emit('closeInventoryModal');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
