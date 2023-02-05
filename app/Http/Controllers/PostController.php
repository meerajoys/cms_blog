<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index(){

        // $posts = Post::all();       // user can view all the posts from all users

        // $posts = auth()->user()->posts;     //only view logined user posts

        // dd(auth()->user()->name);

        if(auth()->user()->name !== 'admin'){


        $posts = auth()->user()->posts()->orderBy('id', 'desc')->paginate(5);

        }
        else{
            // $posts = Post::orderBy('id', 'desc')->paginate(5)->get();
            $posts = Post::orderBy('id', 'desc')->get();

        }

        return view('admin.posts.index',['posts'=>$posts]);
    }


    public function show(Post $post){


        return view('blog-post', ['post'=>$post]);
    }


    public function create(){

        $this->authorize('create', Post::class);

        return view('admin.posts.create');
    }


    public function store(Request $request){

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title'=>'required|max:255',
            // 'post_image'=>'file',
            'body'=>'required',
            'date'=>'required'
        ]);



        // if(request('post_image')){
        //     $inputs['post_image'] = request('post_image')->store('images','public');
        // }

        // auth()->user()->posts()->create($inputs);


        if ($request->hasFile('post_image')) {
            $inputs['post_image'] = $request->post_image->store('images', 'public');
        }
            $inputs['user_id'] = auth()->id();

            // $disallowedTags ='<scripts><p>';
            // $sanitizedInput = strip_tags($inputs['data'], $disallowedTags);
            Post::create($inputs);

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
        // $post = Post::find($id);

        $post->delete();

        $request->session()->flash('message', 'Post was deleted');
        return back();
    }

    public function update(Post $post, Request $request){


        // dd($request->all());
        $inputs = request()->validate([
            'title'=>'required|max:255',
            // 'post_image'=>'file',
            'body'=>'required',
            'date'=>'required'
        ]);

        // dd($inputs['title'],$inputs);
        // to update images

        // if ($request->hasFile('post_image')) {
        //     $inputs['post_image'] = $request->post_image->store('images', 'public');
        //     $post->post_image = $inputs['post_image'];

        // }

        //older method

        // if(request('post_image')){
        //     $inputs['post_image'] = request('post_image')->store('images');
        //     $post->post_image = $inputs['post_image'];
        // }

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


    public function post($id, Comment $post_id){

        $post = Post::findOrFail($id);

        $comments = $post->comments()->whereIsActive(1)->get();

        return view('blog-post', compact('post', 'comments'));
    }




}












