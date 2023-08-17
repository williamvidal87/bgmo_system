<?php

namespace App\Http\Livewire\AdminPanel\Remark;

use Livewire\Component;

class RemarkForm extends Component
{
    public $remark;
    public $status_id;
    
    protected $listeners = [
    'StatusID',
    ];
    
    public function StatusID($status_id)
    {
        $this->status_id=$status_id;
    }
    
    public function render()
    {
        return view('livewire.admin-panel.remark.remark-form');
    }
    
    public function closeRemark()
    {
        
        $this->emit('closeRemarkModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function SaveRemark()
    {
        $this->emit('RemarkData',$this->remark,$this->status_id);
        $this->emit('closeRemarkModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
