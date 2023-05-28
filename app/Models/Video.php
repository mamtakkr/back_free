<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primarykey="id";
    protected $table = 'videos';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
    public function relUser(){
        return $this->belongsTo(User::class,'user_id', 'id')->where('active_status','active');
    }
}
