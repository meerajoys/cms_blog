<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');    // middleware used to redirect to login when we entered home page
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)

    {

        $post = Post::all();
        // $search = $request['search'] ?? "";

        // if($search !== ""){

        //     $post = Post::where("title", "=", $search)->get();
        // }else{
        //     $post = Post::all();
        // }

        // $data = compact('post');

        // return view('home')->with($data);

        return view ('home', ['posts'=>$post]);
    }



    public function search(Request $request)
{


    $search = $request->input('search');


    if($search !== ""){

        $posts = Post::where('title', 'like', '%'.$search.'%')->get();
    }else{
        $posts = Post::all();
        }
    // $posts = Post::where('title', 'like', '%'.$search.'%')->get();


    return view('home', compact('posts'));
}

}



