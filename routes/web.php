<?php

use App\Models\Cpl;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Haya Lintang', 'title' => 'About Us']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => count($category->posts) . ' Articles in the ' . $category->name . ' Category', 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us!']);
});

Route::get('/prodi', function () {
    $prodis = \App\Models\Prodi::all();
    return view('prodi', ['title' => 'Program Studi', 'prodis' => $prodis]);
});

Route::get('/cpl', function () {
    $cpls = Cpl::all();
    return view('cpl', ['title' => 'Capaian Pembelajaran Lulusan', 'cpls' => $cpls]);
});

Route::get('/matkul', function () {
    $matkuls = \App\Models\Matkul::all();
    return view('matkul', ['title' => 'Mata Kuliah', 'matkuls' => $matkuls]);
});