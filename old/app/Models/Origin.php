<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    protected $primarykey="id";
    protected $table = 'origins';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
}
