@extends('layouts.app')


@section('content')
		<h1> Create a new item </h1>
		
		{!! Form::open(
			  array(
				'route' => 'categories.store', 
				'class' => 'form')
			  ) !!}

			@if (count($errors) > 0)
			<div class="alert alert-danger">
				There were some problems adding the item.<br />
				<ul>
					@foreach ($errors->all() as $error)
						<li></li>
					@endforeach
				</ul>
			</div>
			@endif

			<div class="form-group">
				{!! Form::label('Item Name') !!}
				{!! Form::text('name', null, 
				  array(
					'class'=>'form-control', 
					'placeholder'=>'Item Name'
				  )) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Create Category!', 
				  array('class'=>'btn btn-primary'
				)) !!}
			</div>
			{!! Form::close() !!}
			</div>

@endsection