<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request; 

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // daftar semua post
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    // form create post
    public function create()
    {
        return view('post.create');
    }

    // simpan data baru
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.index');
    }

    public function show(string $id) 
    { 
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function edit(string $id)
    { 
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id) 
    { 
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save(); // disimpan ke db
        return redirect()->route('post.index');
    } // dialihkan ke halaman post melalui route post.index

    public function destroy( $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post berhasil dihapus!');
    }
}
