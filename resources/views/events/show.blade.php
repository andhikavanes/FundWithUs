@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6 text-center">{{ $event->title }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-auto object-cover">
                <p class="mt-4 text-gray-600">Start : <span class="font-semibold">{{ $event->start_date }}</span></p>
            </div>
            <div>
                <p class="text-gray-600 mb-4">{{ $event->description }}</p>
            </div>
        </div>
    </div>
@endsection
