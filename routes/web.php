<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "tittle" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "tittle"  => "About",
        "name"   => "Satine Zaneta",
        "email"  => "satinezaneta@gmail.com",
        "image"  => "satine.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('/categories', function () {
//     return view('categories', [
//         'tittle' => 'Post Categories',
//         'categories' => category::all()
//     ]);
// });
Route::get('categories', function() {
    return view('categories', [
        'tittle' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('category', [
        'tittle' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});

Route::get('/authors/{user}', function(User $user) {
    return view('posts', [
        'title' => 'User Posts',
        'posts' => $user->posts,
    ]);
});