<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $primarykey="id";
    protected $table = 'visits';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
	
	public function userDetails()
	{
		return $this->belongsTo(User::class, 'who_visit', 'id');
	}
    
}
