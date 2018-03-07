<?php

namespace App\Http\Controllers;

use App\Category;
use App\Setting;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
    	return view('index')
    	           ->with('title', Setting::first()->site_name)
    	           ->with('categories', Category::take(5)->get())
    	           ->with('first_post', Post::orderBy('created_at', 'desc')->first())
    	           ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
    	           ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
    	           ->with('career', Category::find(8))
    	           ->with('tutorials', Category::find(7))
    	           ->with('settings', Setting::first());
    }

    public function singlePost($slug)
    {
    	//here we use slug to show the title dynamically in the address bar, so we find the post where the slug is comming and get the first result

    	$post = Post::where('slug', $slug)->first();

//to find the next,previous post
    	$next_id = Post::where('id', '>', $post->id)->min('id');
    	$prev_id = Post::where('id', '<', $post->id)->max('id');

    	return view('single')->with('post', $post)
		                     ->with('title', $post->title)
		                     ->with('categories', Category::take(5)->get())
		                     ->with('settings', Setting::first())
		                     ->with('next', Post::find($next_id))
		                     ->with('prev', Post::find($prev_id))
		                     ->with('tags', Tag::all());
    }

    public function category($id)
    {
    	$category = Category::find($id);

    	return view('category')->with('category', $category)
    	                       ->with('title', $category->name)
    	                       ->with('categories', Category::take(5)->get())
		                       ->with('settings', Setting::first());
    }

        public function tag($id)
        {
        	$tag = Tag::find($id);

        	return view('tag')->with('tag', $tag)
        	                       ->with('title', $tag->tag)
        	                       ->with('categories', Category::take(5)->get())
    		                       ->with('settings', Setting::first());
        }
}
