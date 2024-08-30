<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home.
     */
   
    public function index()
    {
        $posts = Post::all(); // Fetch all posts
        return view('admin.home', compact('posts'));
    }

    /**
     * Show the admin dashboard.
     */
 
}
