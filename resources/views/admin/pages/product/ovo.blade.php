@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<!-- <h4 class="card-title">Manage Groups</h4> -->
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs tab-simple-styled" role="tablist">
					<li class="nav-item">
                        <a class="nav-link active" id="tab-2-1" data-toggle="tab" href="#tab-pulsa" role="tab" aria-controls="tab-pulsa" aria-selected="true">
                            <i class="mdi mdi-speedometer" style="font-size: 20px"></i>Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-2-2" data-toggle="tab" href="#tab-token" role="tab" aria-controls="tab-token" aria-selected="false">
                                <i class="mdi mdi-message-outline" style="font-size: 20px"></i>Pulsa</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade active show" id="tab-pulsa" role="tabpanel" aria-labelledby="tab-bukalapak">
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
                                                            Bank Name
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                            Bank Code
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($bankProducts as $product)
                                                    <tr role="row">
                                                        <td class="counterCell"></td>
                                                        <td>{{$product['name']}}</td>
                                                        <td>{{$product['value']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-token" role="tabpanel" aria-labelledby="tab-bukalapak">
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
                                                        Product ID
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                        Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                        Price
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($pulsaProducts as $product)
                                                <tr role="row">
                                                    <td class="counterCell"></td>
                                                    <td>{{$product['productCode']}}</td>
                                                    <td>{{$product['productName']}}</td>
                                                    <td>{{$product['price']}}</td>
                                                </tr>
                                                @endforeach
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
