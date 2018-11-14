@if ($newDeposit->status == 'WAITING')
    @php ($badge = 'badge-primary')
    @php ($keterangan = "Menunggu pembayaran dan konfirmasi")
@elseif ($newDeposit->status == 'ACCEPTED')
    @php ($badge = 'badge-success')
    @php ($keterangan = "Pembayaran diterima. Saldo ditambahkan ke akun")
@elseif ($newDeposit->status == 'FAILED')
    @php ($badge = 'badge-danger')
    @php ($keterangan = "Deposit gagal dilakukan")
@elseif ($newDeposit->status == 'CANCELED')
    @php ($badge = '')
    @php ($keterangan = "Deposit dibatalkan")
@elseif ($newDeposit->status == 'EXPIRED')
    @php ($badge = 'badge-warning')
    @php ($keterangan = "Pembayaran belum diterima/ditemukan sampai batas waktu pembayaran (kadaluarsa). Silahkan request ulang deposit")
@else
    @php ($badge = '')
    @php ($keterangan = "")
@endif

@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
        <div class="card px-2">
            <div class="card-body">
            <div class="container-fluid">
                <h3 class="text-right my-5">Invoice #{{ $newDeposit->id }}</h3>
                <hr> </div>
            <div class="container-fluid d-flex justify-content-between">
                <div class="col-lg-3 pl-0">
                    <p class="mt-5 mb-2">
                        <b>{{ $newDeposit->users->fullname }}</b>
                    </p>
                    <p>
                        {{ $newDeposit->users->address }}
                    </p>
                </div>
                <div class="col-lg-3 pr-0">
                <p class="mt-5 mb-2 text-right">
                    <b>Tujuan</b>
                </p>
                <p class="text-right">{{ $newDeposit->payment_methods->account_vendor }},
                    <br> No. Rekening : {{ $newDeposit->payment_methods->account_number }}
                    <br> A/N : {{ $newDeposit->payment_methods->account_name }}</p>
                </div>
            </div>
            <div class="container-fluid d-flex justify-content-between">
                <div class="col-lg-5 pl-0">
                <p class="mb-0 mt-5">Dibuat : {{ $newDeposit->created_at }}</p>
                <p>Batas Pembayaran : <span style="color: red;">{{ $newDeposit->expired_date }}</span></p>
                </div>
            </div>
            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                <div class="table-responsive w-100">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>Jumlah Deposit</th>
                        <th class="text-right">Unique Code</th>
                        <th class="text-right">Status</th>
                        <th class="text-right">Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-right">
                        <td class="text-left">1</td>
                        <td class="text-left">Rp. {{ number_format($newDeposit->amount) }}</td>
                        <td>Rp. {{ number_format($newDeposit->unique_code) }}</td>
                        <td><div class="badge {{ $badge }}">{{ $newDeposit->status }}</div></td>
                        <td>{{ $keterangan }}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="container-fluid mt-5 w-100">
                      <p class="text-right mb-2">Jumlah Deposit: Rp. {{ number_format($newDeposit->amount) }}</p>
                      <p class="text-right">Uniqu Code : Rp. {{ $newDeposit->unique_code }}</p>
                      <h4 class="text-right mb-5">Total : Rp. {{ number_format($newDeposit->amount + $newDeposit->unique_code) }}</h4>
                      <hr> </div>
            <div class="container-fluid w-100">
                <a href="{{ route('deposit-print', $newDeposit->id) }}" target="_blank" class="btn btn-primary float-right mt-4 ml-2">
                <i class="mdi mdi-printer mr-1"></i>Print</a>
                @if ($newDeposit->status == 'WAITING')
                    <a href="{{ route('deposit-cancel', $newDeposit->id) }}" class="btn btn-success float-right mt-4">
                    <i class="mdi mdi-telegram mr-1"></i>Batalkan</a>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection