<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact'); // Sesuaikan dengan nama file Blade Anda
    }

    public function submit(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Ambil data yang diperlukan untuk pesan WhatsApp
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Buat pesan untuk WhatsApp
        $waMessage = "Nama: $name\nEmail: $email\nPesan: $message";
        $encodedMessage = urlencode($waMessage);

        // Nomor WhatsApp tujuan
        $phoneNumber = '6282257223701';

        // URL WhatsApp dengan pesan yang sudah di-encode
        $waUrl = "https://wa.me/$phoneNumber?text=$encodedMessage";

        // Redirect ke URL WhatsApp
        return redirect()->away($waUrl);
    }
}
