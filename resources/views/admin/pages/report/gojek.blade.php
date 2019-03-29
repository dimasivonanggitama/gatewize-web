@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Groups</label>
                    <select class="form-control form-control-lg" id="groupSelect">
                        <option disabled selected value=""></option>
                        @foreach($groups as $group)
                        <option value="{{$group['id']}}">{{$group['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Accounts</label>
                    <select class="form-control form-control-lg" id="accountSelect">
                        <option disabled selected value=""></option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type</label>
                    <select class="form-control form-control-lg" id="typeSelect">
                        <option disabled selected value=""></option>
                        <option value="local">Local</option>
                        <option value="pulsa">GoPulsa</option>
                        <option value="bills">GoBills</option>
                        <option value="gopay">GoPay</option>
                    </select>
                </div>
            </div>
        </div>   
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <!-- <h4 class="card-title">Manage Groups</h4> -->
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content tab-content-basic" style="overflow-x: auto;">
                    <div class="tab-pane" id="tab-local" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="col-sm-12">
                            <table class="table local-table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Waktu
                                        </th>
                                        <th>
                                            Akun
                                        </th>
                                        <th>
                                            Tujuan
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Server ID
                                        </th>
                                        <th>
                                            Message
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="localTable">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-goPay" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="col-sm-12">
                            <table id="" class="table gopay-table" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Waktu
                                        </th>
                                        <th>
                                            Ref
                                        </th>
                                        <th>
                                            Currency
                                        </th>
                                        <th>
                                            Nominal
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                        <th>
                                            Sisa Saldo
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="goPayTable">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-goBills" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <table id="order-listing" class="table gobills-table">
                            <thead>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Waktu
                                    </th>
                                    <th>
                                        Ref
                                    </th>
                                    <th>
                                        Tujuan
                                    </th>
                                    <th>
                                        Nominal
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Token
                                    </th>
                                </tr>
                            </thead>

                            <tbody id="goBillsTable">
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab-goPulsa" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="col-sm-12">
                            <table id="order-listing" class="table gopulsa-table">
                                <thead>
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Order Number
                                        </th>
                                        <th>
                                            Target MSISDN
                                        </th>
                                        <th>
                                            Voucher Denom
                                        </th>
                                        <th>
                                            Transaction Amount
                                        </th>
                                        <th>
                                            Serial Number
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Created Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="goPulsaTable">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="{!! asset('theme/StarAdmin/js/shared/data-table.js') !!}"></script>
<script>
    var groupId;
    var phoneNumber;
    var type;
    $('select#groupSelect').on('change', function(){
        groupId = this.value;
        $('#accountSelect').empty();
        $('#accountSelect').append($('<option disabled selected value=""></option>'));
        $.get('https://api.gatewize.com/devel-gopay/group/{{Auth::user()->license_key}}/'+groupId+'/list', function(data){
            for (var i = 0; i < data.length; i++) {
                $('select#accountSelect')
                .append($("<option></option>").attr("value", data[i].phone).text(data[i].phone));   
            }
        })
    });
    $('select#accountSelect').on('change', function(){
        phoneNumber = this.value;
        $('.tab-pane').hide();
        requestApi();
    });
    $('select#typeSelect').on('change', function(){
        type = this.value;
        $('.tab-pane').hide();
        requestApi();
    });
    function requestApi(){
        $.get('https://api.gatewize.com/devel-gopay/history/{{Auth::user()->license_key}}/'+groupId+'/'+phoneNumber+'/'+type+'/1/100', function(data){
            console.log(data);
            switch(type){
                case 'local':
                insertLocalTable(data);
                break;
                case 'pulsa':
                insertGoPulsaTable(data);
                break;
                case 'bills':
                insertGoBillsTable(data);
                break;
                case 'gopay':
                insertGoPayTable(data);
                break;
            }
        });
    }

    function insertLocalTable(data){
        $('#localTable').empty();
        $('#tab-local').show();
        for (let i = 0; i < data.length; i++) {
            let report = data[i];
            $('#localTable').append("<tr><td>"+(i+1)+"</td><td>"+
                report.created_at+"</td><td>"+
                report.phone+"</td><td>"+
                report.destination+"</td><td>"+
                report.status +"</td><td>"+
                report.trxid+"</td><td>"+
                report.message+"</td></tr>");
        }
        $('.local-table').DataTable();
    }
    function insertGoBillsTable(data){
        $('#goBillsTable').empty();
        $('#tab-goBills').show();
        let array = data.bills;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            let context = report.context;
            $('#goBillsTable').append("<tr><td>"+(i+1)+"</td><td>"+
                report.createdDateTime+"</td><td>"+
                report.orderId+"</td><td>"+
                report.context.customerId+"</td><td>"+
                report.totalAmount.amount+"</td><td>"+
                report.status+"</td><td>"+
                tokenFormat(context.stroomToken, context.customerName, context.tariffAndPower, context.kwhTotal)+"</td></tr>");
        }
        $('.gobills-table').DataTable();
    }
    function insertGoPulsaTable(data){
        $('#goPulsaTable').empty();
        $('#tab-goPulsa').show();
        let array = data.completedBookingOrder;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            $('#goPulsaTable').append("<tr><td>"+(i+1)+"</td><td>"+
                report.orderNumber+"</td><td>"+
                report.targetMsisdn+"</td><td>"+
                report.voucherDenom+"</td><td>"+
                report.transactionAmount +"</td><td>"+
                report.serialNumber+"</td><td>"+
                report.status+"</td><td>"+
                report.createdDate+"</td></tr>");
        }
        $('.gopulsa-table').DataTable();
    }
    function insertGoPayTable(data){
        $('#goPayTable').empty();
        $('#tab-goPay').show();
        let array = data.success;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            $('#goPayTable').append("<tr><td>"+(i+1)+"</td><td>"+
                report.transacted_at+"</td><td>"+
                report.transaction_ref+"</td><td>"+
                report.currency+"</td><td>"+
                report.amount+"</td><td>"+
                report.status+"</td><td>"+
                report.description+"</td><td>"+
                report.effective_balance_after_transaction+"</td></tr>");
        }
        $('.gopay-table').DataTable();
    }
    function tokenFormat(stroomToken, name, tariffAndPower, kwhTotal){
        return stroomToken + '/' + name + '/' + tariffAndPower + '/' + kwhTotal;
    }
</script>
@endsection