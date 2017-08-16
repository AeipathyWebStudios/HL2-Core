@extends('layouts.app')

@section('pageTitle', 'Game Item Catalog')

@section('content')

<h1> Catalog of Game Items </h1>

<p> Below you can find a catalog of all the items that are currently in circulation on HL2:C </p>
<table class='table table-striped'>
	<tr><th> Item Name </th><th> Description </th><th> Market Price </th><th> Weight </th><th> Action </th></tr>
	@foreach($items as $item)
		<tr>
			<td>{{ $item->name }}</td>
			<td>{{ $item->short_desc }} </td>
			<td>{{ $item->market_price }} tokens </td>
			<td>{{ $item->weight }} kg </td>
			<td>
				<a href="{{ url('item/view') }}/{{ $item->id }}"class='btn btn-primary'> View </a>
				<a href="{{ url('item/buy') }}/{{ $item->id }}"class='btn btn-success'> Buy </a>
				</td>
	@endforeach
</table>

@endsection