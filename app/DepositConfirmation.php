<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositConfirmation extends Model
{
    protected $fillable = ['deposit_id', 'bank_tujuan', 'bank_pengirim', 'rekening_pengirim', 'nama_pengirim', 'tanggal_pengiriman', 'jumlah', 'catatan', 'bukti_pembayaran'];
    
    public function users(){
        return $this->belongsTo('App\Deposit', 'deposit_id');
    }
}
