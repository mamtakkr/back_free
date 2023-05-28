<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    protected $primarykey="id";
    protected $table = 'participates';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
    public function relUser(){
        return $this->belongsTo(User::class,'participate_from', 'id');
    }
    
    public function relEvent(){
        return $this->belongsTo(Event::class,'event_id', 'id');
    }
    
}
