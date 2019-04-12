@extends('backend.app')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"> Service Integration Tools</h2>
                <hr/>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Services</label>
                            <select class="form-control form-control-lg" id="serviceSelect">
                                <option disabled selected value=""></option>
                                @foreach($services as $service)
                                <option value="{{$service['url']}}">{{$service['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" id="col-groups">
                       <div class="form-group">
                            <label for="exampleFormControlSelect1">Groups</label>
                            <select class="form-control form-control-lg" id="groupSelect">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" id="col-accounts" style="display:none;">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Accounts</label>
                            <select class="form-control form-control-lg" id="accountSelect">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tipe Transaksi</label>
                            <select class="form-control form-control-lg" id="tipeSelect">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Metode Transaksi</label>
                            <select class="form-control form-control-lg" id="methodSelect">
                                <option disabled selected value=""></option>
                                <option value="trans">Direct</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="button" id="btnGenerate" class="btn btn-lg btn-block btn-success mt-4">Generate</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">URL Transaksi</label>
                            <textarea class="form-control" id="textUrl" rows="2" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"> Detail Format Transaksi</h2>
                <div class="row">
                    <div class="col-md-12">
                        <ul id="listDesc">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"> Contoh Reply Transaksi</h2>

                <div class="row">
                    <div class="col-md-12">
                        <p>Reply Transaksi Sukses</p>
                        <textarea class="form-control" id="trxSukses" rows="3" disabled></textarea>
                        <p>Reply Transaksi Suspect</p>
                        <textarea class="form-control" id="trxSuspect" rows="2" disabled></textarea>
                        <p>Reply Transaksi Gagal</p>
                        <textarea class="form-control" id="trxGagal" rows="2" disabled></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom_js')
<script>
var url = '';
var name = '';
var groupId = '';
var account = '';
$('select#serviceSelect').on('change', function(){
        url = this.value;
        name = $('select#serviceSelect option:selected').text();
        if(name == 'DIGIPOS') {
            $('#tipeSelect').empty();
            $('#tipeSelect').append($('<option disabled selected value=""></option>'))
            $('#tipeSelect').append($('<option value="bulk">BULK</option>'))
            $('#tipeSelect').append($('<option value="mkios">MKIOS</option>'))
            $('#tipeSelect').append($('<option value="voucher">Voucher</option>'))
            $('#col-groups').hide();
             $('#col-accounts').show();
            $('#accountSelect').empty();
            $('#accountSelect').append($('<option disabled selected value=""></option>'));
            $.get(url+'user/{{Auth::user()->license_key}}/list', function(data){
                for (var i = 0; i < data.length; i++) {
                    $('select#accountSelect')
                    .append($("<option></option>").attr("value", data[i].phone).text(data[i].phone));
                }
            })
        } else {
            $('#tipeSelect').empty();
            if(name == 'OVO') {
                $('#tipeSelect').append($('<option disabled selected value=""></option>'))
                $('#tipeSelect').append($('<option value="ovo">OVO</option>'))
                $('#tipeSelect').append($('<option value="bank">BANK</option>'))
                $('#tipeSelect').append($('<option value="pulsa">PULSA</option>'))
            } else if(name == 'GOJEK') {
                $('#tipeSelect').append($('<option disabled selected value=""></option>'))
                $('#tipeSelect').append($('<option value="transfer">GOPAY</option>'))
                $('#tipeSelect').append($('<option value="token">PLN</option>'))
                // $('#tipeSelect').append($('<option value="voucher">PULSA</option>'))
            }
            $('#col-groups').show();
            $('#col-accounts').hide();
            $('#groupSelect').empty();
            $('#groupSelect').append($('<option disabled selected value=""></option>'));
            $.get(url+'group/{{Auth::user()->license_key}}/list', function(data){
                for (var i = 0; i < data.length; i++) {
                    $('select#groupSelect')
                    .append($("<option></option>").attr("value", data[i].id).text(data[i].name));
                }
            })
        }
});

$('#btnGenerate').on('click', function(){
    $("#listDesc").empty();
    var optDesc = "<li><strong>&lt;PIN&gt; :</strong> PIN Akun untuk transaksi (Jika memiliki multiple account, PIN harus sama)</li><li><strong>&lt;IDTRX&gt; :</strong> ID Transaksi Unique dari Software Pulsa</li>";
    if(name == 'DIGIPOS') {
        $("#trxSukses").text('@SN:19041117480481535700@MSISDN: 085314745040@STATUS:SUCCESS@LOS:81@HARGA:99000@PRODUK:12 GB, 2 GB MAXSTREAM / 30 HARI@SALDO:19864000@TOTALSALDO:20284000@IDTRX:44379425@');
        $("#trxSuspect").text('');
        $("#trxGagal").text('@STATUS:GAGAL@MSISDN: 085347440840@MESSAGE:TRANSAKSI GAGAL : GAGAL SAAT PEMBELIAN PRODUK@PRODUK:25000,1,025@IDTRX:44290993@');

        if($("#tipeSelect option:selected").val() == 'bulk') {
            optDesc += '<li><strong>&lt;PRODUK&gt; :</strong> Produk diisi dengan kode produk yang terdapat di menu Products, Limit Harga, dan Limit Los. (Contoh : 10000*10*2GB30H. 10000 = Limit Harga, 10 = Limit Los, 2GB30H = Kode Produk)</li>';
        }  else if($("#tipeSelect option:selected").val() == 'mkios') {
            optDesc += '<li><strong>&lt;PRODUK&gt; :</strong> Produk diisi dengan nominal dan kode transaksi (Contoh: BULK * 25. Untuk pembelian pulsa dengan menggunakan saldo bulk, MKIOS * 10. Untuk pembelian pulsa dengan menggunakan stock mkios.)</li>';
        } else {
            optDesc += '<li><strong>&lt;PRODUK&gt; :</strong> Produk diisi dengan kode produk yang terdapat di Menu Products</li>';
        }
        optDesc += '<li><strong>&lt;TUJUAN&gt; :</strong> Nomor Handphone yang akan dilakukan transaksi</li>'
        $('#textUrl').text(url + $("#methodSelect").val() + '/{{Auth::user()->license_key}}' + '/' + $("#accountSelect").val() + '/<PIN>/' + $("#tipeSelect").val() + "/<PRODUK>/<TUJUAN>/<IDTRX>/string");
    } else {
        if(name == 'OVO') {
            $("#trxSukses").text('@STATUS:SUKSES@MSISDN: 0895605577461@SN:TRF-0EF87C3AD7D9B3F5B2C893D68463A9021F6251A0-SITI ROHAYA@HARGA:10000@AKUN: 081294759904@SALDO:9960000@TOTALSALDO:9990000@');
            $("#trxSuspect").text('');
            $("#trxGagal").text('@STATUS:GAGAL@MSISDN:081905465253@MESSAGE:Mobile number is not registered@PRODUK:10000@AKUN:081294759904@');

            if($("#tipeSelect option:selected").val() == 'ovo' || $("#tipeSelect option:selected").val() == 'bank') {
                optDesc += '<li><strong>&lt;PRODUK&gt; :</strong> Produk diisi dengan nominal transfer (Contoh : 100000)</li>';
                if($("#tipeSelect option:selected").val() == 'bank') {
                    optDesc += '<li><strong>&lt;TUJUAN&gt; :</strong> Nomor Rekening yang akan dilakukan transaksi. Kode Bank bisa dilihat di table produk. (Contoh: 0141234567. 014 Kode Bank BCA, 1234567 No Rekening BCA)</li>';
                } else {
                    optDesc += '<li><strong>&lt;TUJUAN&gt; :</strong> Nomor Handphone yang akan dilakukan transaksi</li>';
                }
            } else {
                optDesc += '<li><strong>&lt;PRODUK&gt; :</strong> Produk diisi dengan kode produk yang terdapat di Menu Products</li>';
            }
            $("#listDesc").append($(''));
        } else if (name == 'GOJEK') {
            $("#trxSukses").text('@STATUS:SUKSES@MSISDN: 0895391827765@SN:L****@ID:4A4C0940-DF39-4D61-BC11-6885D8471234@HARGA:20000@AKUN: 085850706666@SALDO:719049@TOTALSALDO:3305701@');
            $("#trxSuspect").text('');
            $("#trxGagal").text('@STATUS:GAGAL@MSISDN: 085772180386@MESSAGE:ENTITY NOT FOUND@PRODUK:25000@AKUN: 085234260000@');

            if($("#tipeSelect option:selected").val() == 'transfer') {
                optDesc += '<li><strong>&lt;PRODUK&gt; :</strong> Produk diisi dengan nominal transfer (Contoh : 100000)</li>';
                optDesc += '<li><strong>&lt;TUJUAN&gt; :</strong> Nomor Handphone yang akan dilakukan transaksi</li>';
            } else {
                optDesc += '<li><strong>&lt;PRODUK&gt; :</strong> Produk diisi dengan kode produk yang terdapat di Menu Products</li>';
                optDesc += '<li><strong>&lt;TUJUAN&gt; :</strong> Nomor Token Listrik yang akan dilakukan transaksi</li>';
            }
        }
        $("#listDesc").append($(optDesc));

        if(name != 'DIGIPOS')
            $('#textUrl').text(url + $("#methodSelect").val() + '/{{Auth::user()->license_key}}' + '/' + $("#groupSelect").val() + '/<PIN>/' + $("#tipeSelect").val() + "/<PRODUK>/<TUJUAN>/<IDTRX>/string");
        else
            $('#textUrl').text(url + $("#methodSelect").val() + '/{{Auth::user()->license_key}}' + '/' + $("#accountSelect").val() + '/<PIN>/' + $("#tipeSelect").val() + "/<PRODUK>/<TUJUAN>/<IDTRX>/string");
    }
});
</script>
@endsection
