<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $primarykey="id";
    protected $table = 'follows';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
}
