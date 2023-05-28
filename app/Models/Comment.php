<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primarykey="id";
    protected $table = 'comments';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
}
