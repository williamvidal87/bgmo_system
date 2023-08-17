<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentBorrowing extends Model
{
    use HasFactory;
    
    protected $fillable = ['purpose','status_id','client_id','cancel_reason','date_release'];
    
    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
    public function getClientID()
    {
        return $this->belongsTo(User::class,'client_id')->with('getDept');
    }
}
