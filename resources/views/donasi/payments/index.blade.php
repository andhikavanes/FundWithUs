@section('script')
<script>
    function konfirmasiPembayaran() {
        var nominal = document.getElementById('nominalInput').value;
        var formattedNominal = formatRupiah(nominal);
        document.getElementById('konfirmasiNominal').innerText = "Anda telah mendonasikan Rp" + formattedNominal + ". Klik Kirim untuk melanjutkan.";
        $('#staticBackdrop').modal('show');
    }

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
</script>
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .description-container {
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .description-text {
            text-align: justify;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    @yield('content')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @yield('script')
</body>
</html>
@extends('layouts.app')

@section('content')
<div class="container custom-page">
    <h1 class="mt-5 mb-5 text-center">{{ $catalog->title }}</h1>
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{ asset('storage/' . $catalog    ->image_url) }}" class="img-fluid w-200 mb-6" alt="">
        </div>
        <div class="col-md-6">
            <div class="description-container">
                <h5 class="card-title">  </h5>
                <p class="description-text">{{ $catalog->description }}</p>
            </div>
        </div>
    </div>
    <div class="card mt-5 mb-5">
        <div class="card-body">
            <form action="{{ route('payment.show') }}" method="POST" id="donationForm">
                @csrf
                <div class="form-group">
                    <label for="nominal">Ketik nominal donasi</label>
                    <input type="number" class="form-control" id="nominalInput" name="nominal" required>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <input type="hidden" name="catalog_id" value="{{ $catalog->id }}">
                <div class="form-group">
                    <label for="payment">Pilih metode pembayaran</label>
                    <div class="d-flex flex-wrap">
                        @foreach ($payment as $py)
                            <div class="form-check m-2">
                                <input class="form-check-input" type="radio" name="payment" id="payment{{ $py->id }}" value="{{ $py->id }}" required>
                                <label class="form-check-label" for="payment{{ $py->id }}">
                                    <img src="{{ $py->image_url }}" class="img-fluid" alt="" style="width: 50px; height: auto;">
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button class="w-full bg-blue-700 text-white font-normal py-2 px-4 rounded hover:bg-blue-800 transition duration-300 ease-in-out text-center" type="button" onclick="konfirmasiPembayaran()" data-toggle="modal" data-target="#staticBackdrop">Konfirmasi Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="https://ayobantu.com/assets/img/icon/confirmation.jpg" class="img-fluid mb-3" alt="">
                <p id="konfirmasiNominal">Klik Kirim untuk melanjutkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" form="donationForm" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
@endsection

