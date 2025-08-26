<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        $members = Member::all();

        return view('index', compact('posts','members'));        
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        $members = Member::all();
        return view('about', compact('members'));
    }
    public function berita()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts', compact('posts'));
    }
}