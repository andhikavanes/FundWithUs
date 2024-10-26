@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
    <section class="py-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold mb-8">Latest Blogs</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> <!-- Mengurangi gap antar kartu -->
                @foreach($blogs as $blog)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover object-center"> <!-- Mengurangi tinggi gambar -->
                        <div class="p-4 flex flex-col flex-grow"> <!-- Mengurangi padding -->
                            <h2 class="text-lg font-semibold mb-1">{{ $blog->title }}</h2> <!-- Mengurangi ukuran font dan margin -->
                            <p class="text-gray-600 mb-2">{{ Str::limit($blog->content, 100) }}</p> <!-- Mengurangi batas konten -->
                            <div class="flex justify-between items-center mb-2">
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('blogs.show', $blog) }}" class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded-md text-center">Read More</a> <!-- Mengurangi padding tombol -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
