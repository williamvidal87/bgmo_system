<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    use HasFactory;
    
    protected $fillable = ['work_description','location','schedule','image','status_id','client_id','cancel_reason','set_schedule'];
    
    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
    public function getClientID()
    {
        return $this->belongsTo(User::class,'client_id');
    }
}
