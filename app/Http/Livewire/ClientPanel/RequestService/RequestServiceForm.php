<?php

namespace App\Http\Livewire\ClientPanel\RequestService;

use App\Models\RequestService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class RequestServiceForm extends Component
{
    use WithFileUploads;

    public  $images = [];
    public  $temp_images = [];
    public  $data = [];
    public  $work_description,
            $location,
            $schedule,
            $status_id;
    public  $RequestServiceID;
    public  $edit_data=0;
    
    protected $listeners = ['editRequestServiceData'];
    
    public function render()
    {
        return view('livewire.client-panel.request-service.request-service-form');
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
    
    public function store()
    {
        
        $this->validate([
            'work_description'       => 'required',
            'location'              => '',
            'schedule'          => '',
            'images.*'          => 'max:102400', // 1MB Max
        ]);
        
        if($this->temp_images!=$this->images){
            foreach ($this->images as $key => $image) {
                $this->images[$key] = $image->store('images');
            }
        }
        
        $this->images = json_encode($this->images);
        
        $this->data = ([
            'work_description'                       => $this->work_description,
            'location'                       => $this->location,
            'schedule'                         => $this->schedule,
            'image'                         => $this->images,
            'client_id'                         => Auth::user()->id
        ]);

        try {
            if($this->RequestServiceID){
                RequestService::find($this->RequestServiceID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
                $this->data['status_id']=2;
                $show=RequestService::create($this->data);
                $this->emit('alert_store');
                
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
    
    
    public function closeRequestServiceForm(){
        $this->emit('closeRequestServiceModal');
        $this->emit('refresh_inventory_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
