@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Product table</h4>
        <div class="row">
            <div class="col-12">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td style="max-width: 200px; white-space: normal;">{{$product->description}}</td>
                            <td>Rp. {{number_format($product->price, 0)}}</td>
                            <td style="max-width: 200px;">
                                <img src="/storage/{{$product->image}}" style="width: 100%; height: auto">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script src="{!! asset('theme/StarAdmin/js/shared/data-table.js') !!}"></script>
@endsection