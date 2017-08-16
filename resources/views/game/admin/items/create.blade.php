@extends('layouts.app')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<h1> Add a new Item </h1>
<p class="lead">Fill in the form below to add an item to the database</p>
<hr>

{!! Form::open([
    'action' => 'ItemController@store'
]) !!}

<div class="form-group">
    {!! Form::label('img_path', 'Image URL: ', ['class' => 'control-label']) !!}
    {!! Form::text('img_path', null, ['class' => 'form-control']) !!}
	
    {!! Form::label('name', 'Item Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
	
	{!! Form::label('type', 'Item Type:', ['class' => 'control-label']) !!}
    {!! Form::select('type', array('weapon' => 'Weapon', 'armour' => 'Armour'), ['class' => 'form-control']) !!}
		
    {!! Form::label('short_desc', 'Short Description:', ['class' => 'control-label']) !!}
    {!! Form::text('short_desc', null, ['class' => 'form-control']) !!}
	
	{!! Form::label('market_price', 'Market Price: ', ['class' => 'control-label']) !!}
    {!! Form::number('market_price', null, ['class' => 'form-control']) !!}
	
	{!! Form::label('atk_pts', 'Attack Points: ', ['class' => 'control-label']) !!}
    {!! Form::number('atk_pts', null, ['class' => 'form-control']) !!}    
	
	{!! Form::label('def_pts', 'Defense Points: ', ['class' => 'control-label']) !!}
    {!! Form::number('def_pts', null, ['class' => 'form-control']) !!}

    {!! Form::label('weight', 'Weight: ', ['class' => 'control-label']) !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}     
</div>


{!! Form::submit('Create New Item', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection

