@extends('layouts.app')


@section('pageTitle', 'Dashboard')

<style>
.dashboard-info{
	font-size:17px;
	font-family:Verdana;
}
</style>

@section('content')

<!-- TODO: Make this its own component -->
	<example>
	
	</example>

	<div class="panel panel-success">
		<div class="panel-heading"><h3>Your characters</h3></div>
			<div class="panel-body">
					<div class="card" style="width: 25rem; text-align:center;">
					  <img width=175 class="img img-circle" src="{{ Auth::user()->avatar_url }}" alt="User avatar">
					  <div class="card-block">
						<h4 class="card-title">{{ Auth::user()->character_first }} {{ Auth::user()->character_last }}</h4>
						<b class="money-stat"> {{ Auth::user()->money }} tokens </b>
						<div class="progress" style="height:3rem; width: 25rem;">
							<b> {{ Auth::user()->level }} </b>
						  <div class="progress-bar" role="progressbar" aria-valuenow="{{ Auth::user()->level }}" aria-valuemin="1" aria-valuemax="60"></div>
						</div>
						<a href="/" class="btn btn-primary"> Play as {{ Auth::user()->character_first }} </a>
					  </div>
					</div>
	
			</div>
	</div>
@endsection
