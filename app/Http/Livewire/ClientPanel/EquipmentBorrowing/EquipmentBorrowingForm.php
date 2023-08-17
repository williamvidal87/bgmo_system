<?php

namespace App\Http\Livewire\ClientPanel\EquipmentBorrowing;

use App\Models\BorrowEquipmentUse;
use App\Models\EquipmentBorrowing;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EquipmentBorrowingForm extends Component
{

    public  $data = [];
    public  $purpose;
    public  $BorrowEquipmentRequestID;
    public  $edit_data=0;

    // sample
    public  $orderProducts = [];
    public  $device_id = [];
    public  $count = 0;
    public  $count2 = 0;
    public  $status_id;

    

    public function addProduct()
    
{
    $this->orderProducts[] = ['equipment_id'=>'','device_id'=>'','used_id' => ''];
    
}

public function removeProduct($index)
{   
    // dd($this->orderProducts[$index]['equipment_id']);
    unset($this->orderProducts[$index]);
    $this->orderProducts = array_values($this->orderProducts);
}

// end sample
    
    protected $listeners = [
    'editEquipmentBorrowingData'
    ];
    
    public function store()
    {
        $this->validate([
            'purpose' => '',
        ]);
        
        
        $this->data = ([
            'purpose'                   => $this->purpose

        
        ]);
        

        try {
            if($this->BorrowEquipmentRequestID){
                EquipmentBorrowing::find($this->BorrowEquipmentRequestID)->update($this->data); 
                $search_sample=BorrowEquipmentUse::where('used_id',$this->BorrowEquipmentRequestID)->get();
                $this->count=0;

                // for empty items
                if(count($this->orderProducts)==0){
                    foreach ($search_sample as $search_samp2){
                        BorrowEquipmentUse::destroy($search_samp2['id']);
                    }
                }


                foreach ($search_sample as $search_samp){
                    $search[$this->count]=$search_samp;
                    
                $this->count2=0;
                foreach ($this->orderProducts as $key4) {
                    if($key4['equipment_id']=="")
                    {
                    }else{
                        if($search[$this->count]['id']==$key4['equipment_id']){
                        }else{
                            $this->count2++;
                            if($this->count2==count($this->orderProducts)){
                                // dd($this->count2);
                                BorrowEquipmentUse::destroy($search[$this->count]['id']);
                            }
                        }
                    }
                }
                    
                    $this->count++;
                }
                $this->count=0;
                foreach ($this->orderProducts as $key3) {
                    // dd($key3);
                    if($key3['equipment_id']=="")
                    {
                        BorrowEquipmentUse::create(['used_id' => $this->BorrowEquipmentRequestID,'device_id' => $key3['device_id']]);
                    }else{
                        BorrowEquipmentUse::find($this->orderProducts[$this->count]['equipment_id'])->update($this->orderProducts[$this->count]);
                        $this->count++;
                    }
                }
                $this->emit('alert_update');
            }else{
                $this->data['client_id']=Auth::user()->id;
                $this->data['status_id']=2;
                $show=EquipmentBorrowing::create($this->data);
                foreach ($this->orderProducts as $key2) {
                    BorrowEquipmentUse::create(['used_id' => $show['id'],'device_id' => $key2['device_id']]);
                }
                $this->emit('alert_store');
            }
            // EquipmentBorrowing::create($this->data);
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeEquipmentBorrowingModal');
        $this->emit('refresh_equipmentborrowing_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->edit_data=0;
    }

    public function editEquipmentBorrowingData($BorrowEquipmentRequestID)
    {
        for ($i=count($this->orderProducts); $i >=0 ; $i--) {
            unset($this->orderProducts[$i]);
            $this->orderProducts = array_values($this->orderProducts);
        }

        $this->BorrowEquipmentRequestID=$BorrowEquipmentRequestID;
        $DATA=EquipmentBorrowing::find($this->BorrowEquipmentRequestID);
        $this->purpose = $DATA['purpose'];
        $this->status_id = $DATA['status_id'];
        $this->edit_data=1;
        $tools = BorrowEquipmentUse::all()->where('used_id', $this->BorrowEquipmentRequestID);
        $this->count=0;
        foreach ($tools as $tool){
            $this->orderProducts[$this->count] = ['equipment_id'=>$tool->id,'used_id'=>$tool->used_id,'device_id' => $tool->device_id];
            $this->count++;
        }
        // dd($this->orderProducts);
        
    }

    public function render()
    {
        return view('livewire.client-panel.equipment-borrowing.equipment-borrowing-form',[
            
            'select_items' => Inventory::orderBy('equipment_name', 'ASC')->get(),
        ]);
    }
    
    
    public function closeEquipmentBorrowingForm(){
        for ($i=count($this->orderProducts); $i >=0 ; $i--) {
            unset($this->orderProducts[$i]);
            $this->orderProducts = array_values($this->orderProducts);
        }
        $this->emit('closeEquipmentBorrowingModal');
        $this->emit('refresh_equipmentborrowing_table');
        $this->edit_data=0;
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
