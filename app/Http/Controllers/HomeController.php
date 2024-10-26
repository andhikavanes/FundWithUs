<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\catalog;
use App\Models\event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    // Mengambil semua Cause tanpa urutan tertentu
    $catalogs = catalog::paginate(3);
    // Mengambil semua Event tanpa urutan tertentu
    $events = event::paginate(3);
    // Mengambil semua Post tanpa urutan tertentu
    $blogs = blog::paginate(2);

    // Mengirim data ke view
    return view('homepage.home', compact('catalogs', 'events', 'blogs'));
}
}
