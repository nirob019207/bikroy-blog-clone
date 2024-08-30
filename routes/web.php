<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;










Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);

Route::post('/upload-image', function (Request $request) {
    if ($request->hasFile('file')) {
        // Validate the file (optional but recommended)
        $request->validate([
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validations
        ]);

        // Store the file in the public/uploads directory
        $path = $request->file('file')->store('uploads', 'public');

        // Return the URL to the stored image
        return response()->json(['url' => Storage::url($path)]);
    }

    return response()->json(['error' => 'File not uploaded'], 400);
})->name('upload.image');
});



Route::get('/', [UserController::class, 'userhome']);



Route::get('/caegory-blog/{id}', [UserController::class, 'categoryBlog'])->name('categoryblog');
Route::get('/single-blog/{id}', [UserController::class, 'singleBlog'])->name('singleblog');




