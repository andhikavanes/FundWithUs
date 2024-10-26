<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index(Request $request)
    {
        $catalogs = Catalog::query();

        // Filter berdasarkan campaign yang dipilih
        if ($request->has('campaigns')) {
            $catalogs->whereIn('id_campaign', $request->input('campaigns'));
        }

        // Filter berdasarkan kategori yang dipilih
        if ($request->has('categories')) {
            $catalogs->whereIn('id_category', $request->input('categories'));
        }

        $catalogs = $catalogs->get();

        // Ambil semua campaign dan kategori untuk ditampilkan di form filter
        $campaigns = Campaign::all();
        $categories = Category::all();

        return view('donasi.index', compact('catalogs', 'campaigns', 'categories'));
    }

    public function show($id)
    {
        $catalog = Catalog::find($id); // Ambil data katalog donasi berdasarkan ID

        return view('donasi.detail', compact('catalog'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('picture'), $imageName); // Simpan gambar di direktori public/picture

            $catalog = new Catalog();
            $catalog->title = $request->input('title');
            $catalog->description = $request->input('description');
            $catalog->image_url = asset('picture/' . $imageName); // Simpan URL gambar
            $catalog->donation_goal = $request->input('donation_goal');
            $catalog->save();
        }
    }
}
