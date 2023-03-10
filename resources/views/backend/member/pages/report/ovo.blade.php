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
                        <option value="sukses">Ovo Sukses</option>
                        <option value="pending">Ovo Pending</option>
                    </select>
                </div>
            </div>
        </div>
		<hr>
		<div class="row">
			<p class="form-text text-muted"><small>Filter:</small></p>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Limit</label>
					<input class="form-control form-control-lg" id="limitInput">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Post</label>
					<input class="form-control form-control-lg" id="limitInput">
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
                    <div class="tab-pane" id="tab-local" role="tabpanel" aria-labelledby="tab-local">
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
                    <div class="tab-pane" id="tab-ovo" role="tabpanel" aria-labelledby="tab-ovo">
                        <div class="col-sm-12">
                            <table id="" class="table ovo-table" id="order-listing">
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
                                            Deskripsi
                                        </th>
                                        <th>
                                            Nominal
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Transaction Type
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="ovoTable">
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
<script>
    var groupId;
    var phoneNumber;
    var type;
    $('select#groupSelect').on('change', function(){
        groupId = this.value;
        $('#accountSelect').empty();
        $('#accountSelect').append($('<option disabled selected value=""></option>'));
        $.get('https://api.gatewize.com/devel-ovo/group/{{Auth::user()->license_key}}/'+groupId+'/list', function(data){
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
        $.get('https://api.gatewize.com/devel-ovo/history/{{Auth::user()->license_key}}/'+groupId+'/'+phoneNumber+'/'+type+'/1/100', function(data){
            console.log(data);
            switch(type){
                case 'local':
                insertLocalTable(data);
                break;
                case 'sukses':
                insertOvoTable(data);
                case 'pending':
                insertOvoTable(data);
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
    function insertOvoTable(data){
        $('#ovoTable').empty();
        $('#tab-ovo').show();
        let array = data;
        for (let i = 0; i < array.length; i++) {
            let report = array[i];
            let context = report.context;
            $('#ovoTable').append("<tr><td>"+(i+1)+"</td><td>"+
                report.transaction_date+" " + report.transaction_time + "</td><td>"+
                report.merchant_invoice+"</td><td>"+
                report.desc1 + " " + report.desc2 + " " + report.desc3 +"</td><td>"+
                report.transaction_amount+"</td><td>"+
                report.status+"</td><td>"+
                report.transaction_type+"</td></tr>");
        }
        $('.ovo-table').DataTable();
    }
</script>
@endsection
