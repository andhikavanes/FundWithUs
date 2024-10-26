<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'image' => 'required|string',
            'content' => 'required|string',
            'link_youtube' => 'nullable|string',
        ]);

        Blog::create($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'image' => 'required|string',
            'content' => 'required|string',
            'link_youtube' => 'nullable|string',
        ]);

        $blog->update($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus.');
    }
}
