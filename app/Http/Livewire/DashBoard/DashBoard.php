<?php

namespace App\Http\Livewire\DashBoard;

use App\Models\EquipmentBorrowing;
use App\Models\RequestService;
use App\Models\User;
use Livewire\Component;

class DashBoard extends Component
{
    public function render()
    {
        return view('livewire.dash-board.dash-board',[
            'UserData' =>  User::all(),
            'BorrowData' =>  EquipmentBorrowing::where('status_id',2)->get(),
            'RequestingData' =>  RequestService::where('status_id',2)->get(),
        ]);
    }
}
