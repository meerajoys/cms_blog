<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(){

        // $posts = Post::all();       // user can view all the posts from all users

        // $posts = auth()->user()->posts;     //only view logined user posts

        $posts = auth()->user()->posts()->paginate(5);


        return view('admin.posts.index',['posts'=>$posts]);
    }

    public function show(Post $post){


        return view('blog-post', ['post'=>$post]);
    }
    public function create(){

        $this->authorize('create', Post::class);

        return view('admin.posts.create');
    }
    public function store(){

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images','public');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post with title ' . $inputs['title'] . ' was created');

        return redirect()->route('post.index');



        // dd(request()->all());
    }

    public function edit(Post $post){

        // if(auth()->user()->can('view', $post)){

        // }

        $this->authorize('view', $post);         //to edit only users post

        return view('admin.posts.edit', ['post'=>$post]);
    }



    // public function destroy(Post $post){

    //     $post->delete();

    //     Session::flash('message', 'Post was deleted');
    //     return back();
    // }

    //or another method


    public function destroy(Post $post, Request $request){

        $this->authorize('delete', $post);

        $post->delete();

        $request->session()->flash('message', 'Post was deleted');
        return back();
    }

    public function update(Post $post){

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);


        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        // auth()->user()->posts()->save($post);      // here any post will be saved to one user after updation

        // $post->save();   // to save post to the corresponding user after edit

        // another method

        $this->authorize('update', $post);     // to authorized post
        $post->update();


        session()->flash('post-updated-message', 'Post with title ' . $inputs['title'] . ' was updated');

        return redirect()->route('post.index');
    }


}
