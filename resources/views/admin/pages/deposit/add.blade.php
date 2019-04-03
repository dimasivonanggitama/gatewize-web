@extends('admin.app')

@section('content')
    <h3><i class="mdi mdi-cash-usd"></i>Deposit Saldo</h3>
    <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pilih Metode Pembayaran</h4>
                            <div class="accordion accordion-body-filled" id="accordion" role="tablist">
                                @foreach ($payment as $item)
                                    <div class="card">
                                        <div class="card-header" role="tab" id="heading{{ $item->id }}">
                                            <h6 class="mb-0">
                                                <a data-toggle="collapse" class="heading-accordion"  href="#collapse{{ $item->id }}" aria-expanded="false" aria-controls="collapse{{ $item->id }}" data-id="{{ $item->id }}">
                                                {{ $item->account_vendor }} </a>
                                            </h6>
                                        </div>
                                        <div id="collapse{{ $item->id }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $item->id }}" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        No. Rekening : {{ $item->account_number }} <br>
                                                        Atas Nama : {{ $item->account_name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{ route('deposit-store') }}">
                                @csrf
                                <!-- <div class="form-group">
                                    <label for="inputMetode">Metode Pembayaran</label>
                                    <select class="form-control" name="payment" id="inputMetode" required>
                                        <option value="" selected>Pilih Metode Pembayaran</option>
                                        @foreach ($payment as $item)
                                            <option value="{{ $item->id }}" >{{ "$item->account_vendor ( $item->account_number ) a/n $item->account_name " }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->first('payment'))
                                        <small class="text-danger">{{ $errors->first('payment') }}</small>
                                    @endif
                                </div> -->
                                <input type="hidden" name="payment" id="payment">
                                <div class="form-group">
                                    <label for="inputPengirim">Informasi Pengirim</label>
                                    <input type="text" class="form-control" name="sender" id="inputPengirim" placeholder="Pengirim (Nama / Nomor)" value="{{ old('sender') }}" required>
                                    @if ($errors->first('sender'))
                                        <small class="text-danger">{{ $errors->first('sender') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputJumlah">Jumlah (Min. 50.000)</label>
                                    <input type="text" class="form-control" name="amount" id="inputJumlah" placeholder="Pengirim (Nama / Nomor)" value="{{ old('amount') }}" required>
                                    @if ($errors->first('amount'))
                                        <small class="text-danger">{{ $errors->first('amount') }}</small>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Lanjutkan</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informasi</h4>
                    <p>
                        <ol>
                            <li>Pilih metode pembayaran yang anda inginkan</li>
                            <li>Pada kotak pengirim masukan Informasi Pengirim (Nama / Nomor)</li>
                            <li>Kemudian masukan jumlah deposit yang anda inginkan, lalu submit</li>
                            <li>Setelah halaman faktur keluar silahkan transfer sesuai jumlah yang anda minta dan sesuai Bank / No HP yang anda pilih</li>
                            <li>Deposit akan otomatis tercancel jika tidak melakukan pembayaran selama waktu 6 jam</li>
                            <li>User harus melakukan pembayaran yang sama persis dengan nominal yang tertera (+ unique code) jika tidak maka harus konfirmasi manual ke administrator</li>
                            <li>Jika ada deposit yang masih waiting, maka user tidak dapat membuat request deposit kembali.</li>
                        </ol>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
<script>
    $('.heading-accordion').click(function(){
        let paymentId = $(this).data('id')
        $("#payment").val(paymentId)
    })
</script>
@endsection