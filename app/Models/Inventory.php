<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    
    protected $fillable = ['client_id','equipment_name','property_no','serial_no','specs','acquisition_date','status_id'];
    
    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
    public function getClient()
    {
        return $this->belongsTo(User::class,'client_id');
    }
}
