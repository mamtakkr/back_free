<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primarykey="id";
    protected $table = 'countries';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
    public function relCity(){
        return $this->hasMany('App\Models\City', 'country_id', 'id')->where('is_deleted',0);
    }
}
