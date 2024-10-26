@extends('layouts.app')
<script>
        function formatRupiah(angka) {
            var number_string = angka.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);
            
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            return rupiah;
        }

        document.addEventListener("DOMContentLoaded", function() {
            var nominalElement = document.getElementById('formattedNominal');
            var nominalValue = nominalElement.innerText.replace('Rp.', '').replace(/\./g, '');
            nominalElement.innerText = 'Rp' + formatRupiah(nominalValue);
        });

        function showThankYouAlert() {
        // Tampilkan SweetAlert dengan pesan terima kasih
            Swal.fire({
                title: 'Terima Kasih!',
                text: 'Terima kasih telah berdonasi.',
                icon: 'success',
            }).then((result) => {
                // Kirim form setelah pengguna menutup SweetAlert
                if (result.isConfirmed) {
                    document.querySelector("form").submit();
                }
            });
        }
    </script>
    
    <style>
    .text-shopee-orange {
        color: #FF5722; /* Warna oranye Shopee */
    }
</style>
@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">
            <form action="{{ route('payment.create', ) }}" method="POST">
            <h1 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 text-center">Metode Pembayaran</h1>
            @csrf
            <div class="text-center">
                @if ($data['payment'] == 1)
                    <h2 class="payment-method text-primary mt-5 mb-5">OVO</h2>
                @elseif ($data['payment'] == 2)
                    <h2 class="payment-method text-primary mt-5 mb-5">GOPAY</h2>
                @elseif ($data['payment'] == 3)
                    <h2 class="payment-method text-primary mt-5 mb-5">Dana</h2>
                @elseif ($data['payment'] == 4)
                    <h2 class="payment-method text-primary mt-6 mb-6">LinkAja</h2>
                @elseif ($data['payment'] == 5)
                    <h2 class="payment-method text-primary mt-6 mb-6">BCA</h2>
                @elseif ($data['payment'] == 6)
                    <h2 class="payment-method text-primary mt-6 mb-6">MandiriPay</h2>
                @elseif ($data['payment'] == 7)
                    <h2 class="payment-method text-primary mt-6 mb-6">CIMB</h2>
                @elseif ($data['payment'] == 8)
                    <h2 class="payment-method text-primary mt-6 mb-6">BNI</h2>
                @elseif ($data['payment'] == 9)
                    <h2 class="payment-method text-shopee-orange mt-5 mb-5">ShopeePay</h2>
                @endif
            </div>

            <div class="info my-4 p-4 bg-light rounded shadow-sm">
                <p class="mb-2"><strong>Nominal:</strong> <span id="formattedNominal">Rp.{{$data['nominal']}}</span></p>
                <p><strong>Nama Lengkap:</strong> {{ $data['nama_lengkap'] }}</p>
            </div>

            <div class="text-center my-4">
                <img src="https://i.pinimg.com/originals/11/e7/c0/11e7c0a4effd59e9ad7711362eab2de3.jpg" alt="QR Code" class="img-fluid rounded shadow" style="width: 300px; height: auto;">
            </div>

            <div class="text-center">
                <button onclick="showThankYouAlert()" class="w-full bg-blue-700 text-white font-normal py-2 px-4 rounded hover:bg-blue-800 transition duration-300 ease-in-out text-center" style="font-size: 1.2em;">Saya sudah membayar</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endsection
