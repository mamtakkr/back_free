<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primarykey="id";
    protected $table = 'cities';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
    public function relCountry(){
        return $this->belongsTo(Country::class,'country_id', 'id')->where('is_deleted',0);
    }
}
