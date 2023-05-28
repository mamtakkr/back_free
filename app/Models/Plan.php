<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $primarykey="id";
    protected $table = 'plans';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
}
