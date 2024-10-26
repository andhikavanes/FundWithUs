@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <section class="py-8">
        <div class="container mx-auto">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-3xl font-semibold mb-4 text-center">{{ $blog->title }}</h2>
                    <div class="flex justify-start items-center gap-4 text-gray-700 mb-4">
                        <div class="bg-blue-100 text-blue-700 px-4 py-2 rounded">
                            Penulis: {{ $blog->penulis }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row">
                    <img src="{{ $blog->image }} ||{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full lg:w-1/2 h-64 lg:h-auto object-cover object-center">
                    <div class="p-6 flex flex-col justify-between w-full lg:w-1/2">
                        @foreach(explode("\n", $blog->content) as $paragraph)
                            <p class="text-gray-600 mb-4 indent-8">{{ $paragraph }}</p>
                        @endforeach
                        <p class="text-gray-500 mt-4">Tanggal Terbit: {{ $blog->tanggal_terbit }}</p> <!-- Tanggal Terbit di bawah paragraf -->
                        @if ($blog->link_youtube)
                            <div class="mt-4">
                                <h3 class="text-xl font-semibold mb-2">Video</h3>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $blog->link_youtube }}" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
