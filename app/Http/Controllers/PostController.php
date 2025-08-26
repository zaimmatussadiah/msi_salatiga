<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->visit();   
        return view('post', compact('post'));
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image',
        ]);

        $image = $request->file('image');
        $image->storeAs('/public/posts', $request->file('image')->hashName());

        Post::create([
            'title' => $request->title,
            'image' => $request->file('image')->hashName(),
            'body' => $request->body,
        ]);
        
        return redirect()->route('list-posts')->with('message', 'Data berhasil dimasukan');
    }

    public function edit($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image',
            'body' => 'required',
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('/public/posts', $image->hashName());

            //delete old image
            Storage::delete('/public/posts/' . $post->image);

            $post->update([
                'title' => $request->title,
                'image' => $image->hashName(),
                'body' => $request->body,
            ]);

        } else {

            $post->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
        }

        return redirect()->route('list-posts')->with('message', 'Data berhasil di edit');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $image = $post->image;
        $pathImage = '/public/posts/' . $image;

        if (Storage::exists($pathImage)) {
            Storage::delete($pathImage);
        }

        $post->delete();
        return redirect()->route('list-posts')->with('message', 'Data berhasil dihapus');
    }

}
