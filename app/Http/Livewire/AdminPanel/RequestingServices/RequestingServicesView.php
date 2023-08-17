<?php

namespace App\Http\Livewire\AdminPanel\RequestingServices;

use App\Models\RequestService;
use Livewire\Component;
use Livewire\WithFileUploads;

class RequestingServicesView extends Component
{
    use WithFileUploads;

    public  $images = [];
    public  $temp_images = [];
    public  $data = [];
    public  $work_description,
            $location,
            $schedule,
            $status_id,
            $set_schedule;
    public  $RequestServiceID;
    public  $edit_data=0;
    public  $remark;
    
    protected $listeners = [
    'editRequestServiceData',
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
            if($this->RequestServiceID){
                RequestService::find($this->RequestServiceID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeRequestServiceModal');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.admin-panel.requesting-services.requesting-services-view');
    }

    public function editRequestServiceData($RequestServiceID)
    {
        $this->RequestServiceID=$RequestServiceID;
        $DATA=RequestService::find($this->RequestServiceID);
        $this->work_description      = $DATA['work_description'];
        $this->location         = $DATA['location'];
        $this->schedule        = $DATA['schedule'];
        $this->images           = $DATA['image'];
        $this->images           = json_decode($this->images , true);
        $this->temp_images      =$this->images;
        $this->edit_data=1;

    }
    
    public function SetApprove()
    {
        $this->validate([
            'set_schedule' => 'required',
        ]);
        $this->data = ([
            'status_id'                     => 1,
            'set_schedule'                  => $this->set_schedule
        ]);

        try {
            if($this->RequestServiceID){
                RequestService::find($this->RequestServiceID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeRequestServiceModal');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    
    public function SetCancel()
    {
        $this->status_id=3;
        $this->emit('StatusID',$this->status_id);
        $this->emit('openRemarkModal');
    }
    
    
    public function closeRequestServiceForm(){
        $this->emit('closeRequestServiceModal');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
