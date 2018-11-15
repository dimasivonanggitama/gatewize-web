@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Riwayat Deposit</h4>
            {{-- <p class="page-description">Add class </p> --}}
            <div class="row">
                <div class="table-sorter-wrapper col-lg-12 table-responsive">
                <table id="deposit_table" class="table table-striped">
                    <thead>
                    <tr>
                        <th class="sortStyle">ID</th>
                        <th class="sortStyle">Tanggal
                        <i class="mdi mdi-chevron-down"></i>
                        </th>
                        <th class="sortStyle">Jumlah Request
                        <i class="mdi mdi-chevron-down"></i>
                        </th>
                        <th class="sortStyle">Kode Unik
                        <i class="mdi mdi-chevron-down"></i>
                        </th>
                        <th class="sortStyle">Jumlah Tagihan
                        <i class="mdi mdi-chevron-down"></i>
                        </th>
                        <th class="sortStyle">Bank Tujuan
                        <i class="mdi mdi-chevron-down"></i>
                        </th>
                        <th class="sortStyle">Status
                        <i class="mdi mdi-chevron-down"></i>
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($depositData as $item)
                            @if ($item->status == 'WAITING')
                                @php ($badge = 'badge-primary')
                            @elseif ($item->status == 'ACCEPTED')
                                @php ($badge = 'badge-success')
                            @elseif ($item->status == 'FAILED')
                                @php ($badge = 'badge-danger')
                            @elseif ($item->status == 'CANCELED')
                                @php ($badge = '')
                            @elseif ($item->status == 'EXPIRED')
                                @php ($badge = 'badge-warning')
                            @else
                                @php ($badge = '')
                            @endif
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>Rp. {{ number_format($item->amount) }}</td>
                                <td>Rp. {{ number_format($item->unique_code) }}</td>
                                <td>Rp. {{ number_format($item->amount + $item->unique_code) }}</td>
                                <td>{{ $item->payment_methods->account_vendor }}</td>
                                <td><div class="badge {{ $badge }}">{{ $item->status }}</div></td>
                                <td><a href="{{ route('deposit-invoice', $item->id) }}" class="btn btn-sm btn-info">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float:right;">
                    {{ $depositData->links() }}
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script src="../../../assets/js/shared/jq.tablesort.js"></script>
@endsection

@section('custom_js')
    <script src="{!! asset('theme/StarAdmin/js/jq.tablesort.js') !!}"></script>
    <script>
        (function($) {
            'use strict';
            $(function() {
                if ($('#deposit_table').length) {
                    $('#deposit_table').tablesort();
                }
            });
        })(jQuery);
    </script>
@endsection