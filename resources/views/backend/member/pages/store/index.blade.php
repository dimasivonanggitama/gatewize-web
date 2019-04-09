@extends('backend.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="container text-center">
          <h4 class="mb-3">Gatewize Store</h4>
          <p class="w-75 mx-auto mb-5">Pilih paket yang cocok dan sesuai dengan kebutuhan anda. Jika produk tidak sesuai, silahkan open ticket kepada kami untuk bantuan.</p>
          <div class="row pricing-table">
            @foreach($products as $product)
            <div class="col-md-4 grid-margin stretch-card pricing-card">
              <div class="card border-primary border pricing-card-body">
                <div class="text-center pricing-card-head">
                  <h5><strong>{{$product->name}}</strong></h5>
                  <div class="badge badge-success badge-pill">{{$product->service->name}}</div>
                  <h3 class="font-weight-normal mb-4 mt-4"><strong>Rp. {{number_format($product->price, 0)}}</strong></h3>
                </div>
                <hr/>
                <p>{{strtoupper($product->description)}}</p>
                <div class="wrapper" style="margin-top:50px;">
                  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#subscribeModal-{{$product->id}}">
                    <i class="mdi mdi-checkbox-marked-circle"></i>Beli Sekarang
                  </button>
                </div>
              </div>
            </div>
            <div class="modal fade" id="subscribeModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="subscribeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Apakah anda yakin ingin membeli produk "{{$product->name}}" ?</h5>
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
