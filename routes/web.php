<?php

use App\Models\Cpl;
use App\Models\Post;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Matkul;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Haya Lintang', 'title' => 'About Us']);
});

Route::get('/posts', function () {
    //$posts = Post::with(['author', 'category'])->latest()->get();
    $posts = Post::all();
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    //$posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    //$posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => count($category->posts) . ' Articles in the ' . $category->name . ' Category', 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us!']);
});

Route::get('/prodi', function () {
    $prodis = Prodi::all();
    return view('prodi', ['title' => 'Program Studi', 'prodis' => $prodis]);
});

Route::get('/cpl', function () {
    $cpls = Cpl::all();
    return view('cpl', ['title' => 'Capaian Pembelajaran Lulusan', 'cpls' => $cpls]);
});

Route::get('/matkul', function () {
    $matkuls = Matkul::all();
    return view('matkul', ['title' => 'Mata Kuliah', 'matkuls' => $matkuls]);
});

Route::get('/matkul', [MatkulController::class, 'index'])->name('matkul.index');
Route::get('/matkul/create', [MatkulController::class, 'create'])->name('matkul.create');
Route::post('/matkul/store', [MatkulController::class, 'store'])->name('matkul.store');
