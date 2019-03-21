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
        <div class="row" style="overflow-x: auto;">
            <div class="col-md-12">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane" id="tab-local" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Waktu
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Akun
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Actions: activate to sort column ascending">
                                                    Tujuan
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Server ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Message
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody id="localTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-goPay" role="tabpanel" aria-labelledby="tab-bukalapak">
                      <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                No
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                Waktu
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                Ref
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                Currency
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                Nominal
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 20px;" aria-label="Actions: activate to sort column ascending">
                                                Deskripsi
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                Sisa Saldo
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody id="goPayTable">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-goBills" role="tabpanel" aria-labelledby="tab-bukalapak">
                  <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                            No.
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                            Waktu
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                            Ref
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                            Tujuan
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                            Nominal
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                            Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                            Token
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="goBillsTable">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-goPulsa" role="tabpanel" aria-labelledby="tab-bukalapak">
              <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                        No.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                        Order Number
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                        Target MSISDN
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                        Voucher Denom
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                        Transaction Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                        Serial Number
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                        Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
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
</div>
</div>
@endsection

@section('custom_js')
<script>
    var groupId;
    var phoneNumber;
    var type;
    $('select#groupSelect').on('change', function(){
        groupId = this.value;
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
            $.get('https://api.gatewize.com/devel-gopay/history/{{Auth::user()->license_key}}/'+groupId+'/'+phoneNumber+'/'+type, function(data){
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
        for (let i = 0; i < data.length; i++) {
            let report = data[i];
            $('#localTable').append("<tr role=\"row\"><td class=\"counterCell\"></td><td>"+
                report.created_at+"</td><td>"+
                report.phone+"</td><td>"+
                report.destination+"</td><td>"+
                report.status +"</td><td>"+
                report.trxid+"</td><td>"+
                report.message+"</td></tr>");
        }
        $('#tab-local').show();
    }
    function insertGoBillsTable(data){
        $('#goBillsTable').empty();
        let array = data.bills;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            let context = report.context;
            $('#goBillsTable').append("<tr role=\"row\"><td class=\"counterCell\"></td><td>"+
                report.createdDateTime+"</td><td>"+
                report.orderId+"</td><td>"+
                report.context.customerId+"</td><td>"+
                report.amount.amount + report.adminFee.amount +"</td><td>"+
                report.status+"</td><td>"+
                tokenFormat(context.stroomToken, context.customerName, context.tariffAndPower, context.kwhTotal)+"</td></tr>");
        }
        $('#tab-goBills').show();
    }
    function insertGoPulsaTable(data){
        $('#goPulsaTable').empty();
        let array = data.completedBookingOrder;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            $('#goPulsaTable').append("<tr role=\"row\"><td class=\"counterCell\"></td><td>"+
                report.orderNumber+"</td><td>"+
                report.targetMsisdn+"</td><td>"+
                report.voucherDenom+"</td><td>"+
                report.transactionAmount +"</td><td>"+
                report.serialNumber+"</td><td>"+
                report.status+"</td><td>"+
                report.createdDate+"</td></tr>");
        }
        $('#tab-goPulsa').show();
    }
    function insertGoPayTable(data){
        $('#goPayTable').empty();
        let array = data.success;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            $('#goPayTable').append("<tr role=\"row\"><td class=\"counterCell\"></td><td>"+
                report.transacted_at+"</td><td>"+
                report.transaction_ref+"</td><td>"+
                report.currency+"</td><td>"+
                report.amount+"</td><td>"+
                report.status+"</td><td>"+
                report.description+"</td><td>"+
                report.effective_balance_after_transaction+"</td></tr>");
        }
        $('#tab-goPay').show();
    }
    function tokenFormat(stroomToken, name, tariffAndPower, kwhTotal){
        return stroomToken + '/' + name + '/' + tariffAndPower + '/' + kwhTotal;
    }
</script>
@endsection