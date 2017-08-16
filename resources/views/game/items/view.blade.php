@extends('layouts.app')

@section('pageTitle', 'Item Encyclopedia')

@section('content')
	@if($item)
		
		<div class='container-fluid'>
			<div class='col col-md-4'>
				<h1> {{ $item->name }}</h1>
				<b class='desc'> {{ $item->short_desc }} </b>
				<h2> {{ $item->market_price }} tokens</h2>
				<a class='btn btn-success' href="{{ route('items') }}"> Go back to Item Catalog </a>
			</div>
			
			<div class='col col-md-8'>
				<img width=300px class='img img-rounded' src="{{ $item->img_path }}"/>

				<h3> Attack Power </h3>
				<div class="progress">
				  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $item->atk_pts }}" aria-valuemin="0" aria-valuemax="2000" style="width: {{ $item->atk_pts }}px">
					<span class="sr-only"></span>
				  </div>
				</div>
				
				@if( $item->def_pts > 1)
				<h3> Defensive Bonus </h3>
				<div class="progress">
				  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{ $item->def_pts }}" aria-valuemin="0" aria-valuemax="1000" style="width: {{ $item->def_pts }}%">
					<span class="sr-only"></span>
				  </div>
				</div>
				@else
					<h3> Adds no defensive bonus during combat </h3>
				@endif
			</div>
		
		</div>
	
	@endif
@endsection