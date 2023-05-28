<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $primarykey="id";
    protected $table = 'likes';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
}
