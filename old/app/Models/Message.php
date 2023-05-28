<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $primarykey="id";
    protected $table = 'messages';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
    public function relReceiver(){
        return $this->belongsTo(User::class,'receiver_id', 'id');
    }
    
    public function relSender(){
        return $this->belongsTo(User::class,'sender_id', 'id');
    }
}
