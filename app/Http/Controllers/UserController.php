<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userhome()
    {
       
        $recents = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $latestThree = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

            $categories=DB::table('categories')->get();

        return view('frontend.recent', compact('recents', 'latestThree','categories'));
    }
    public function categoryBlog($category_id)
    {
        
        $categoryBlog = DB::table('posts')
            ->where('category_id', $category_id) 
            ->orderBy('created_at', 'desc') 
            ->get();
    
        
        $category = DB::table('categories')
            ->where('id', $category_id)
            ->first();
    
        // Fetch all categories
        $categories = DB::table('categories')->get();
    
        return view('frontend.categoryblog', compact('categoryBlog', 'category', 'categories'));
    }
    public function singleBlog($postId)
    {
        // Fetch the single blog post along with its associated category details
        $singleblog = \App\Models\Post::with('category')
            ->where('id', $postId)
            ->first();
    
        // Check if the single blog post exists and has a category
        if ($singleblog && $singleblog->category) {
            // Fetch related posts that share the same category but exclude the current post
            $relatedblogs = \App\Models\Post::where('category_id', $singleblog->category->id)
                ->where('id', '!=', $postId) // Exclude the current post
                ->get();
        } else {
            // If the single blog post doesn't have a category, set related blogs to an empty collection
            $relatedblogs = collect();
        }
    
        // Fetch all categories for other purposes (like displaying in the sidebar)
        $categories = \App\Models\Category::all();
    
        // Return the data to the view
        return view('frontend.singleblog', compact('singleblog', 'relatedblogs', 'categories'));
    }
    
    
    
}
