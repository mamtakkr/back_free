<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    //protected $primaryKey = "id";
	protected $primaryKey = 'id';

    protected $table = 'posts';
    protected $guarded=[]; 
    public $timestamps=true; 

    use HasFactory;
    
    
    public function relUser(){
        return $this->belongsTo(User::class,'user_id', 'id')->where('active_status','active');
    }
	
	public function allComments(){
		$self = self::class;
		
		//return $self;
		
       //return $this->hasMany(Comment::class,'post_id', 'id');
	   
	   /*$chatMessage = Comment::where('post_id',$post_id)
                              ->latest()
                              ->take(3)
                              ->get();
        return $comments = $chatMessage->reverse();*/
		
		/*$chatMessage = $this->hasMany(Comment::class,'post_id', 'id')->latest()
                              ->take(3)
                              ->get();
		
		return $comments = $chatMessage->reverse();*/
		//dd($this);	
		/*return $chatMessage = Comment::where('post_id',$self->id)
                              //->latest()
                              //->take(3)
                              ->get();*/
							  
							  
			//dd($this);
        //$comments = $chatMessage->reverse();
		return $this->post_id;
	   
	   
    }
	
	
	public function getThreeCommentsAttribute() {
	
		$chatMessage = Comment::where('post_id',$this->id)
                              ->latest()
                              ->take(3)
                              ->get();
        return $comments = $chatMessage->reverse();
	
	
    }
	
	public function getAllCommentsAttribute() {
	
		$chatMessage = Comment::where('post_id',$this->id)
                              ->latest()
                              ->get();
        return $comments = $chatMessage->reverse();
	
	
    }
	
	
}
