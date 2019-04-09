@extends('backend.app')

@section('content')
<style>
.form-group{
    border-bottom: 1px solid #eff2f7;
    padding-bottom: 15px;
}
</style>
<div class="col-md-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Konfirmasi untuk tagihan #{{ $deposit->id }}</h4>
			
            <form class="forms-sample" method="POST" action="{{ route('deposit.confirmation.manual.store', $deposit->id) }}" enctype='multipart/form-data'>
                <div class="modal-body">
                    @csrf
                    <div class="alert alert-warning">
                        <strong>Catatan:</strong>
                        <ul>
                            <li>Mohon pastikan Anda telah mentransfer uang Anda sebelum mengisi form ini.</li>
                            <li>Kolom bertanda * wajib diisi.</li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="bank_tujuan">Bank Tujuan*</label>
                        <input type="hidden" name="bank_tujuan" value="{{ $bank['bank_id'] }}">
                        <input type="text" class="form-control" id="bank_tujuan" placeholder="Bank Tujuan" value="{{ strtoupper($bank['bank_type']) }} No. Rek : {{ $bank['account_number'] }} A/N {{ $bank['atas_nama']}}" disabled>
                        @if ($errors->first('bank_tujuan'))
                        <small class="text-danger">{{ $errors->first('bank_tujuan') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bank_pengirim">Bank Pengirim*</label>
                        <input type="text" class="form-control" name="bank_pengirim" id="bank_pengirim" placeholder="Bank Pengirim (misal : BCA/BRI/dll)" value="{{ old('bank_pengirim') }}" required>
                        @if ($errors->first('bank_pengirim'))
                        <small class="text-danger">{{ $errors->first('bank_pengirim') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bank">Nomor Rekening Pengirim*</label>
                        <input type="rekening_pengirim" class="form-control" name="rekening_pengirim" id="rekening_pengirim" placeholder="No. Rekening Pengirim (misal : 1238118123 atau No. Resi Bank)" value="{{ old('rekening_pengirim') }}" required>
                        @if ($errors->first('rekening_pengirim'))
                        <small class="text-danger">{{ $errors->first('rekening_pengirim') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nama_pengirim">Nama Pengirim*</label>
                        <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim (misal : M. N. Fadillah)" value="{{ old('nama_pengirim') }}" required>
                        @if ($errors->first('nama_pengirim'))
                        <small class="text-danger">{{ $errors->first('nama_pengirim') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="datepicker-popup">Tanggal Transfer*</label>
                         <div id="datepicker-popup" class="input-group date datepicker">
                          <input type="text" name="tanggal_pengiriman" class="form-control">
                          <span class="input-group-addon input-group-append border-left">
                            <span class="mdi mdi-calendar input-group-text"></span>
                          </span>
                        </div>
                        @if ($errors->first('tanggal_pengiriman'))
                        <small class="text-danger">{{ $errors->first('tanggal_pengiriman') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Transfer*</label>
                        <input type="hidden" name="jumlah" value="{{$deposit->total}}">
                        <input type="text" class="form-control" id="jumlah" placeholder="Bank Tujuan" value="{{ $deposit->total }}" disabled>
                        @if ($errors->first('jumlah'))
                        <small class="text-danger">{{ $errors->first('jumlah') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bukti_pembayaran">Upload Bukti Pembayaran*</label>
                        <input name="bukti_pembayaran" type="file" class="dropify" require/>
                        @if ($errors->first('bukti_pembayaran'))
                        <small class="text-danger">{{ $errors->first('bukti_pembayaran') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" class="form-control" id="catatan" cols="30" rows="8"></textarea>
                        @if ($errors->first('catatan'))
                        <small class="text-danger">{{ $errors->first('catatan') }}</small>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection

@section('custom_js')
<script>
if ($("#datepicker-popup").length) {
    $('#datepicker-popup').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
    });
}

$('.dropify').dropify();
</script>
@endsection