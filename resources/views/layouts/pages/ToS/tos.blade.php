<!-- ini buat extend layouts.app, jadi kamu gaperlu bikin sidebar / nav / footer, sudah ada disitu semua -->
@extends('layouts.app')

<!-- content ini dari layouts.app ada yield('content') -->
@section('content')
	<div class="container-">
		<div class="row">
			<div class="col">
				<h1 class="display-1 text-center">Term of Service Page</h1>
				<p class="text-center">This is a ToS' Gatewize page supposed to be.</p>
			</div>
		</div>
	</div>
@endsection