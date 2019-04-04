@extends('backend.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="container text-center pt-5">
          <h4 class="mb-3 mt-5">Start up your Bussiness today</h4>
          <p class="w-75 mx-auto mb-5">Choose a plan that suits you the best. If you are not fully satisfied, we offer 30-day money-back guarantee no questions asked!!</p>
          <div class="row pricing-table">
            @foreach($products as $product)
            <div class="col-md-4 grid-margin stretch-card pricing-card">
              <div class="card border-primary border pricing-card-body">
                <div class="text-center pricing-card-head">
                  <!-- <img class="img-fluid" src="/storage/{{$product->image}}"> -->
                  <h3>{{$product->name}}</h3>
                  <p>{{$product->service->name}}</p>
                  <h1 class="font-weight-normal mb-4">Rp. {{number_format($product->price, 0)}}</h1>
                </div>
                <p style="text-align: center;">{{$product->description}}</p>
                <ul class="list-unstyled plan-features">
                  <li>termin {{$product->termin}}</li>
                  <li>{{$product->slot}} slot</li>
                </ul>
                <div class="wrapper">
                  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#subscribeModal-{{$product->id}}">
                    <i class="mdi mdi-checkbox-marked-circle"></i>Subscribe
                  </button>
                </div>
              </div>
            </div>
            <div class="modal fade" id="subscribeModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="subscribeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Apakah anda yakin ingin subcribe produk "{{$product->name}}" ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    <form class="forms-sample" method="POST" action="/subscribe">
                      @csrf
                      <input type="hidden" name="product_id" value="{{$product->id}}">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button>
                      <button type="submit" class="btn btn-primary" id="btn-update">Subscribe</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection