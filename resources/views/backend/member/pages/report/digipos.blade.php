@extends('backend.app')

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
                        <option value="voucher">Voucher</option>
                        <option value="mkios">Mkios</option>
                        <option value="bulk">Bulk</option>
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
                    <div class="tab-pane" id="tab-voucher" role="tabpanel" aria-labelledby="tab-bukalapak">
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
                                                    ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Serial Number
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Price
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 20px;" aria-label="Actions: activate to sort column ascending">
                                                    Lac
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Status Desc
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody id="voucherTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-mkios" role="tabpanel" aria-labelledby="tab-bukalapak">
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
                                                    ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    RSNumber
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    MSISDN
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    denomRecharge
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    trxNo
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    rechargeType
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody id="mkiosTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-bulk" role="tabpanel" aria-labelledby="tab-bukalapak">
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
                                                    rsNumber
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Price
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Cashback Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Cashback Description
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Created Date
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="bulkTable">
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
        $('#accountSelect').empty();
        $('#accountSelect').append($('<option disabled selected value=""></option>'));
        $.get('https://api.gatewize.com/devel-digipos/group/{{Auth::user()->license_key}}/'+groupId+'/list', function(data){
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
            $.get('https://api.gatewize.com/devel-digipos/history/{{Auth::user()->license_key}}/'+phoneNumber+'/'+type, function(data){
                console.log(data);
                switch(type){
                    case 'local':
                    insertLocalTable(data);
                    break;
                    case 'voucher':
                    insertVoucherTable(data);
                    break;
                    case 'mkios':
                    insertMkiosTable(data);
                    break;
                    case 'bulk':
                    insertBulkTable(data);
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
    function insertVoucherTable(data){
        $('#voucherTable').empty();
        $('#tab-voucher').show();
        let array = data
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            let context = report.context;
            $('#voucherTable').append("<tr role=\"row\"><td class=\"counterCell\"></td><td>"+
                report.createdAt+"</td><td>"+
                report.id+"</td><td>"+
                report.serialNumber+"</td><td>"+
                report.price+"</td><td>"+
                report.status+"</td><td>"+
                report.lac+"</td><td>"+
                report.statusDesc+"</td></tr>");
        }
    }
    function insertMkiosTable(data){
        $('#mkiosTable').empty();
        $('#tab-mkios').show();
        let array = data;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            $('#mkiosTable').append("<tr role=\"row\"><td class=\"counterCell\"></td><td>"+
                report.createdAt+"</td><td>"+
                report.id+"</td><td>"+
                report.rsNumber+"</td><td>"+
                report.msisdn +"</td><td>"+
                report.denomRecharge+"</td><td>"+
                report.trxNo+"</td><td>"+
                report.rechargeType+"</td><td>"+
                report.statusDesc+"</td></tr>");
        }
    }
    function insertBulkTable(data){
        $('#bulkTable').empty();
        $('#tab-bulk').show();
        let array = data;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            $('#bulkTable').append("<tr role=\"row\"><td class=\"counterCell\"></td><td>"+
                report.id+"</td><td>"+
                report.msisdn+"</td><td>"+
                report.rsNumber+"</td><td>"+
                report.price+"</td><td>"+
                report.cashbackStatus+"</td><td>"+
                report.cashbackDesc+"</td><td>"+
                report.status+"</td><td>"+
                report.createdAt+"</td></tr>");
        }
    }
    function tokenFormat(stroomToken, name, tariffAndPower, kwhTotal){
        return stroomToken + '/' + name + '/' + tariffAndPower + '/' + kwhTotal;
    }
</script>
@endsection
