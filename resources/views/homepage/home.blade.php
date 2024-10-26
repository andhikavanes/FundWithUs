<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Home</title>
</head>
<body>
<!-- navbar -->
<nav class="bg-white border-gray-200 border-b-2">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://picsvg.com/svg/B2xAc8.jpg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">FundWithUs</span>
        </a>
        <div class="relative flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-white rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div class="absolute right-0 top-full mt-2 z-50 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
                    <span class="block text-sm text-gray-500 truncate">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
                        </form>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="/" class="nav-link block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 {{ Request::is('/') ? 'text-blue-700' : 'text-gray-900' }}" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('catalogs.index') }}" class="nav-link block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 {{ Request::is('catalogs') ? 'text-blue-700' : 'text-gray-900' }}">Catalogs</a>
                </li>
                <li>
                    <a href="{{ route('blogs.index') }}" class="nav-link block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 {{ Request::is('blogs') ? 'text-blue-700' : 'text-gray-900' }}">Blogs</a>
                </li>
                <li>
                    <a href="{{ route('events.index') }}" class="nav-link block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 {{ Request::is('events') ? 'text-blue-700' : 'text-gray-900' }}">Communities</a>
                </li>
                <li>
                    <a href="{{ route('contact.form') }}" class="nav-link block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 {{ Request::is('contact') ? 'text-blue-700' : 'text-gray-900' }}">Contact</a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="nav-link block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 {{ Request::is('about') ? 'text-blue-700' : 'text-gray-900' }}">About</a>
                </li>
            </ul>
        </div>
        
    </div>
</nav>





  

<!-- jumbotron -->
<section class="bg-center bg-no-repeat bg-[url('https://www.fhcamps.com/wp-content/uploads/FH-Blog-Volunteer.jpg')] bg-gray-500 bg-blend-multiply border-b-2">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Do something incredible today</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Online fundraising for the people and charities you love.</p>
    </div>
</section>

<!-- catalog -->
<section class="py-24 bg-white overflow-hidden border-b-2">
    <div class="container px-4 mx-auto">
        <h3 class="text-3xl light:text-black text-center ">Catalogs</h3>
        <div class="flex flex-row flex-wrap justify-center space-x-4 mt-8">
            @foreach ($catalogs as $cat)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a class="card-link" href="{{ route('payment.index', $cat->id) }}">
                    <img class="rounded-t-lg" src="{{ asset('storage/' . $cat->image_url) }}" alt="" />
                </a>
                <div class="p-5">
                    <a class="card-link" href="{{ route('payment.index', $cat->id) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $cat->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">{{ Str::limit($cat->description, 100) }}</p>
                    <p class="mb-3 font-normal text-gray-700">Donasi terkumpul: Rp{{ number_format($cat->current_donation, 0, ',', '.') }}</p>
                    @php
                        $percentage = ($cat->current_donation / $cat->donation_goal) * 100;
                        $progressClass = '';
                        if ($percentage >= 80) {
                            $progressClass = 'bg-green-600';
                        } elseif ($percentage > 40 && $percentage < 80) {
                            $progressClass = 'bg-yellow-500';
                        } else {
                            $progressClass = 'bg-red-600'; // default to red for < 40%
                        }
                    @endphp
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="{{ $progressClass }} h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>
                    <br>
                    <a href="{{ route('payment.index', $cat->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Donasi
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Event -->
<section class="py-24 bg-gray-200 overflow-hidden border-b-2">
    <div class="container px-4 mx-auto">
        <h3 class="text-3xl light:text-black text-center">Events</h3>
        <div class="flex flex-row flex-wrap justify-center space-x-4 mt-8">
            @foreach($events as $events)
                <div class="flex-shrink-0 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col mr-6">
                    <a href="{{ route('events.show', $events) }}">
                        <img class="rounded-t-lg object-cover w-full h-64" src="{{ asset('storage/' . $events->image) }}" alt="{{$events->title}}" />
                    </a>
                    <div class="p-5 flex flex-col flex-grow justify-between">
                        <div>
                            <a href="{{ route('events.show', $events) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$events->title}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700">{{Str::limit($events->description)}}</p> 
                        </div> 
                        <a href="{{ route('events.show', $events) }}" class="inline-block bg-blue-700 text-white text-center py-2 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            View Details
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- blog -->
<section class="py-24 bg-white overflow-hidden border-b-2">
    <div class="container px-4 mx-auto">
            <h3 class="text-3xl light:text-black text-center ">Blogs</h3>

            <div class="flex flex-row flex-wrap justify-center space-x-4 mt-8"> 
                @foreach ($blogs as $b)
                <a href="{{ route('blogs.show', $b) }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . $b->image) }}" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$b->title}}</h5>
                        <p class="mb-3 font-normal text-gray-700">{{Str::limit($b->content)}}</p>
                    </div>
                </a>
                @endforeach
            </div>
    </div>
</section>


<!-- footer -->

<footer class="bg-white border-t-2 ">
    <div class="container mx-auto px-4 py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="https://picsvg.com/svg/B2xAc8.jpg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">FindWithUs</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0">
                <li>
                    <a href="{{ route('about') }}" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="{{ route('contact.form') }}" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:hidden lg:my-8" /> <!-- Hide hr on small screens -->
        <span class="block text-sm text-gray-500 sm:text-center">© 2024 <a href="" class="hover:underline">FindWithUs™</a>. All Rights Reserved.</span>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        const navbarUser = document.getElementById('navbar-user');

    userMenuButton.addEventListener('click', function() {
        const expanded = userMenuButton.getAttribute('aria-expanded') === 'true' || false;
        userMenuButton.setAttribute('aria-expanded', !expanded);
        userDropdown.classList.toggle('hidden');
    });

    // For mobile menu toggle
    const navbarToggleButton = document.querySelector('[data-collapse-toggle="navbar-user"]');
    navbarToggleButton.addEventListener('click', function() {
        const expanded = navbarToggleButton.getAttribute('aria-expanded') === 'true' || false;
        navbarToggleButton.setAttribute('aria-expanded', !expanded);
        navbarUser.classList.toggle('hidden');
        });
    });

</script>
</body>
</html>