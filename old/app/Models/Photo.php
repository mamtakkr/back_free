<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $primarykey="id";
    protected $table = 'photos';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
}
