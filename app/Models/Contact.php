<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primarykey="id";
    protected $table = 'contacts';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
}
