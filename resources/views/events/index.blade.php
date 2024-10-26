@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <!-- event -->
    <section class="py-24 bg-gray-200 overflow-hidden border-b-2">
        <div class="container px-4 mx-auto">
            <h1 class="text-3xl font-semibold mb-6 text-center">Communities Events</h1> <!-- Menambahkan text-center disini -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @foreach($events as $event)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                            <p class="text-gray-600 mb-4">{{Str::limit($event->description)}}</p>
                            <p class="text-gray-500">Start Date: {{ $event->start_date }}</p>
                            <p class="text-gray-500">End Date: {{ $event->end_date }}</p>
                            <a href="{{ route('events.show', $event) }}" class="mt-4 block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
