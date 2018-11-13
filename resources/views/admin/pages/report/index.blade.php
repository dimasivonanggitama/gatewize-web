@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data table</h4>
        <div class="row">
            <div class="col-12">
                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">Order #</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">Purchased On</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 70.25px;" aria-label="Customer: activate to sort column ascending">Customer</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 50.7667px;" aria-label="Ship to: activate to sort column ascending">Ship to</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 72.15px;" aria-label="Base Price: activate to sort column ascending">Base Price</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 113.567px;" aria-label="Purchased Price: activate to sort column ascending">Purchased Price</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 51.5333px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">Actions</th></tr>
                                </thead>
                                <tbody>          
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">1</td>
                                        <td>2012/08/03</td>
                                        <td>Edinburgh</td>
                                        <td>New York</td>
                                        <td>$1500</td>
                                        <td>$3200</td>
                                        <td>
                                            <label class="badge badge-info">On hold</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">2</td>
                                        <td>2015/04/01</td>
                                        <td>Doe</td>
                                        <td>Brazil</td>
                                        <td>$4500</td>
                                        <td>$7500</td>
                                        <td>
                                            <label class="badge badge-danger">Pending</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">3</td>
                                        <td>2010/11/21</td>
                                        <td>Sam</td>
                                        <td>Tokyo</td>
                                        <td>$2100</td>
                                        <td>$6300</td>
                                        <td>
                                            <label class="badge badge-success">Closed</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">4</td>
                                        <td>2016/01/12</td>
                                        <td>Sam</td>
                                        <td>Tokyo</td>
                                        <td>$2100</td>
                                        <td>$6300</td>
                                        <td>
                                            <label class="badge badge-success">Closed</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">5</td>
                                        <td>2017/12/28</td>
                                        <td>Sam</td>
                                        <td>Tokyo</td>
                                        <td>$2100</td>
                                        <td>$6300</td>
                                        <td>
                                            <label class="badge badge-success">Closed</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">6</td>
                                        <td>2000/10/30</td>
                                        <td>Sam</td>
                                        <td>Tokyo</td>
                                        <td>$2100</td>
                                        <td>$6300</td>
                                        <td>
                                            <label class="badge badge-info">On-hold</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">7</td>
                                        <td>2011/03/11</td>
                                        <td>Cris</td>
                                        <td>Tokyo</td>
                                        <td>$2100</td>
                                        <td>$6300</td>
                                        <td>
                                            <label class="badge badge-success">Closed</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                        </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">8</td>
                                        <td>2015/06/25</td>
                                        <td>Tim</td>
                                        <td>Italy</td>
                                        <td>$6300</td>
                                        <td>$2100</td>
                                        <td>
                                            <label class="badge badge-info">On-hold</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">9</td>
                                        <td>2016/11/12</td>
                                        <td>John</td>
                                        <td>Tokyo</td>
                                        <td>$2100</td>
                                        <td>$6300</td>
                                        <td>
                                            <label class="badge badge-success">Closed</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">10</td>
                                        <td>2003/12/26</td>
                                        <td>Tom</td>
                                        <td>Germany</td>
                                        <td>$1100</td>
                                        <td>$2300</td>
                                        <td>
                                            <label class="badge badge-danger">Pending</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
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