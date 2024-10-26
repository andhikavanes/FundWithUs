@extends('layouts.app')

@section('css')
<style>
    .progress {
        height: 20px;
    }
    .collapse.show {
        display: block !important;
    }
    .progress-bar.red {
        background-color: #ff0000;
    }
    .progress-bar.yellow {
        background-color: #ffc107;
    }
    .progress-bar.green {
        background-color: #28a745;
    }
    .accordion-button::after {
        content: '\f107'; /* Font Awesome down arrow */
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        float: right;
    }
    .accordion-button.collapsed::after {
        content: '\f106'; /* Font Awesome up arrow */
    }
    .accordion .card {
        border: none;
        background: none;
    }
    .accordion .card-header {
        padding: 0;
    }
    .accordion .btn-link {
        color: black;
        text-decoration: none;
        width: 100%;
        text-align: left;
        border-bottom: 1px solid black;
        padding: 0px 0;
    }
    .accordion .btn-link:hover {
        text-decoration: none;
    }
    .form-check-label {
        color: black;
    }
    .form-check {
        margin-bottom: 10px;
    }
    .card-body {
        margin: 0px;
    }
    .btn-donate {
        display: block;
        width: 100%;
        text-align: center;
        margin-top: 10px;
        transition: transform 0.5s, box-shadow 0.5s;
    }
    .filter .card {
        margin-bottom: 10px;
    }
    .card {
        transition: box-shadow 0.5s;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
        margin-bottom: 20px;
    }

    /* Bouncing effect */
    .card:hover {
        animation: bounce 2s;
        box-shadow: 0 7px 30px -10px rgba(150, 170, 180, 0.5);
    }

    .btn-donate:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    /* Ensuring equal height for all cards */
    .card {
        height: 95%;
    }
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-body > * {
        margin-bottom: 15px;
    }
    .card-body > *:last-child {
        margin-bottom: 0px;
    }
    .img-fluid {
        margin-bottom: 15px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('content')
<div class="container mx-auto py-24">
    <div class="flex">
        <div class="w-full md:w-1/4">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <h4 class="text-lg font-semibold mb-4">Select Categories</h4>
                <form action="{{ route('donasi.index') }}" method="GET">
                    <div class="form-group mb-3">
                        @foreach ([
                            '1' => 'Normal',
                            '2' => 'Bencana',
                            '3' => 'Sosial',
                            '4' => 'Pendidikan',
                            '5' => 'Kesehatan',
                            '6' => 'Palestina'
                        ] as $value => $label)
                            <div class="flex items-center mb-2">
                                <input class="form-check-input h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mr-2" type="checkbox" name="campaigns[]" value="{{ $value }}" id="campaigns{{ $value }}" {{ in_array($value, request('campaigns', [])) ? 'checked' : '' }}>
                                <label class="form-check-label text-gray-700" for="campaigns{{ $value }}">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="w-full bg-blue-700 text-white font-normal py-2 px-4 rounded hover:bg-blue-800 transition duration-300 ease-in-out">Terapkan</button>
                </form>
            </div>
        </div>

        <!-- Content Area -->
        <div class="col-md-9">
            <div class="row">
                @foreach($catalogs as $cat)
                <div class="col-md-6">
                    <div class="card mt-3">
                        <a class="card-link" href="{{ route('payment.index', $cat) }}">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $cat->image_url) }}" class="img-fluid" alt="">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $cat->title }}</h5>
                                <p class="mb-3 font-normal text-gray-700">{{ Str::limit($cat->description, 100) }}</p>
                                <p class="mb-3 font-normal text-gray-700">
                                    <span style="font-weight: bold; color: #ff6347; font-size: 0.8em;">
                                        Rp{{ number_format($cat->current_donation, 0, ',', '.') }}
                                    </span> 
                                    terkumpul dari 
                                    <span style="font-weight: bold; color: #2e8b57; font-size: 0.8em;">
                                        Rp{{ number_format($cat->donation_goal, 0, ',', '.') }}
                                    </span>
                                </p>
                                @php
                                    $percentage = ($cat->current_donation / $cat->donation_goal) * 100;
                                    $progressClass = '';
                                    if ($percentage >= 80) {
                                        $progressClass = 'green';
                                    } elseif ($percentage > 40 && $percentage < 80) {
                                        $progressClass = 'yellow';
                                    } elseif ($percentage > 20 && $percentage <= 40) {
                                        $progressClass = 'red';
                                    } else {
                                        $progressClass = 'bg-danger'; // default to Bootstrap's red for < 20%
                                    }
                                @endphp
                                <div class="progress">
                                    <div class="progress-bar {{ $progressClass }}" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $cat->current_donation }}" aria-valuemin="0" aria-valuemax="{{ $cat->donation_goal }}">
                                        {{ number_format($percentage, 2) }}%
                                    </div>
                                </div>
                                <a href="{{ route('payment.index', $cat) }}" class="w-full bg-blue-700 text-white font-normal py-2 px-4 rounded hover:bg-blue-800 transition duration-300 ease-in-out text-center">Donasi</a>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

