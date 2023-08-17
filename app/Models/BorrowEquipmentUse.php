<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowEquipmentUse extends Model
{
    use HasFactory;
    
    protected $fillable = ['used_id','device_id','qty'];

    public function getItemName()
    {
        return $this->belongsTo(Inventory::class,'device_id');
    }
}
