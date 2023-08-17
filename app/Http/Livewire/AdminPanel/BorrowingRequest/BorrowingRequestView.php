<?php

namespace App\Http\Livewire\AdminPanel\BorrowingRequest;

use App\Models\BorrowEquipmentUse;
use App\Models\EquipmentBorrowing;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BorrowingRequestView extends Component
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
    public  $date_release;
    public  $remark;

    

// end sample
    
    protected $listeners = [
    'editEquipmentBorrowingData',
    'RemarkData'
    ];
    
    public function RemarkData($remark,$status_id)
    {
        $this->remark=$remark;
        $this->status_id=$status_id;
        
        $this->data = ([
            'status_id'             => 3,
            'cancel_reason'                => $this->remark
        ]);
        

        try {
            if($this->BorrowEquipmentRequestID){
                EquipmentBorrowing::find($this->BorrowEquipmentRequestID)->update($this->data); 
                $this->emit('alert_update');
            }else{
            }
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
    
    
    public function SetApprove()
    {
        
        $this->validate([
            'date_release' => 'required',
        ]);
        
        
        $this->data = ([
            'date_release'                => $this->date_release,
            'status_id'                   => 1
        ]);
        

        try {
            if($this->BorrowEquipmentRequestID){
                EquipmentBorrowing::find($this->BorrowEquipmentRequestID)->update($this->data); 
                $search_sample=BorrowEquipmentUse::where('used_id',$this->BorrowEquipmentRequestID)->get();
                $check_status=EquipmentBorrowing::find($this->BorrowEquipmentRequestID);
                foreach ($this->orderProducts as $key3) {
                $data4 = ([
                    'client_id'     =>$check_status->client_id,
                    'status_id'     =>7,
                ]);
                Inventory::find($key3['device_id'])->update($data4);
                }
                $this->emit('alert_update');
            }else{
            }
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
    
    
    
    public function SetCancel()
    {
        $this->status_id=3;
        $this->emit('StatusID',$this->status_id);
        $this->emit('openRemarkModal');
        
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
        return view('livewire.admin-panel.borrowing-request.borrowing-request-view',[
            
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
