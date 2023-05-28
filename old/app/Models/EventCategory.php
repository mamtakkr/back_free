<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class EventCategory extends Model
{
    //protected $primaryKey = "id";
	protected $primaryKey = 'id';

    protected $table = 'event_categories';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
}
