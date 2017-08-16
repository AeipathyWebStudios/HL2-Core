@extends('layouts.app')

@section('pageTitle', 'Account Settings')

@section('content')
	
		<div class='col-md-4'>
			<ul class='nav nav-pills-stacked'>
				<li><a href='#'> Change your Password </a></li>
				<li><a href='#'> Change Avatar </a></li>
				<li><a href='#'> Edit Bio </a></li> 
				<li><a href='#'> Edit Signature </a></li>
				<li><a href='#'> Donate to the Devs </a></li>
			</ul>
		</div>
		
		<div class='col-md-8'>
			<h2 class='page-heading'> Account Settings </h2>
			
			<form class="form-horizontal" method="POST" action="{{ route('store') }}">
				{{ csrf_field() }}

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="control-label">Name</label>
							<input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>
							<input id="user_id" type="hidden" name='id' value="{{ Auth::user()->id }}"/>
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
					</div>
				
					<hr>
					<button type="submit" class="btn btn-primary form-control">
						Save
					</button>
			</form>
		</div>
	</div>

@endsection