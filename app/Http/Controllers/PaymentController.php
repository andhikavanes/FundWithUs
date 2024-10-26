<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Payment;
use App\Models\Payment_Donation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index($id)
    {
        $catalog = Catalog::find($id);
        $payment = Payment::all();
        return view('donasi.payments.index', compact('catalog', 'payment'));
    }
    public function show(Request $request)
    {
        $data = $request->all();
        $request->session()->put('payment_data', $data);

        return view('donasi.payments.detail', compact('data'));
    }

    public function create(Request $request)
    {
        $data = $request->session()->get('payment_data');
        $donation = Catalog::find($data['catalog_id']);
        Payment_Donation::create([
            'nominal' => $data['nominal'],
            'name' => $data['nama_lengkap'],
            'email' => $data['email'],
            'id_payment' => $data['payment'],
            'id_catalog' => $data['catalog_id'],
        ]);
        $donation->current_donation += $data['nominal'];
        $donation->save();

        // Remove the session data after it's been used
        $request->session()->forget('payment_data');

        return redirect('/donasi');
    }
}
