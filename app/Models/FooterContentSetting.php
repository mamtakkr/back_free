<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterContentSetting extends Model
{
    protected $primarykey="id";
    protected $table = 'footer_content_settings';
    protected $guarded=[]; 
    public $timestamps=false; 

    use HasFactory;
}
