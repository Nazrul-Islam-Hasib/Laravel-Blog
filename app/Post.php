<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
//softDeletes is a function which is used  as a timestamps in db,so we can check before permanently delete some content
	use softDeletes;


 //this filable is used to support mass insertation in database
	protected $fillable = [

		'title', 'content', 'category_id', 'featured','slug','user_id'
	];

//here the function is used for acessor, getfeaturedAttribute refers to the column name of the table getColumnnameAttribute
	public function getFeaturedAttribute($featured)
	{
		return asset($featured);
	}

	protected $dates = ['deleted_at'];


	//Relation between table
    public function category(){

    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
