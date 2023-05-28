<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    protected $primarykey="id";
    protected $table = 'secrets';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
    public function relUser(){
        return $this->belongsTo(User::class,'sec_from_id', 'id');
    }

}
