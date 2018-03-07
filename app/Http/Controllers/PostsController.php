<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\Tag;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//We must ensure that atleast a cetegory exists before we create a post
        $categories = Category::all();

        $tags = Tag::all();

        if ($categories->count()== 0 || $tags->count() == 0)
        {
            Session::flash('info', 'You must have some categories and tags before attempting to create a post');
            return redirect()->back();
        }
//We must ensure that atleast a cetegory exists before we create a post
//We need to pass the tag info

        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [

            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'

        ]);
        /**
         Here to store the post we have to save it in a array,to get the uploaded image a new name as if user can't upload same image twice,so we cancatenate with time function and store it in public/uploads/posts path
         */
        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        /**
         Here is the array
         */
        $post = Post::create([

            'title' => $request->title,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()

        ]);

        //Here we attach the tags with our post and save in db
        //$post[whole post]->tags()[it is the relation created in tag.php]->attach($request->tags)[it is used to attach the tag we get from the front end with our post]
        
        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully');
        
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

//Here all the previous tag was replaced by new updated tag through sync() function,here tags() is the many to many relationship described in post.php
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated succcessfully.');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Post was just trashed.');

        return redirect()->back();
    }

    public function trashed()
    {
//onlyTrashed is a laravel method which return all the trashed post,we need to use get in this case
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts); 
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently');

        return redirect()->back();

    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfully');

        return redirect()->route('posts');

    }
}
