@extends('layouts.app')


@section('content')



	<h2> Top 5 Richest Players </h2>
	<table class='table table-striped'>
			<tr><th> ID </th><th> First Name </th><th> Last Name </th><th> Total Net Worth </th></tr>
			@foreach ($richest as $player)
				<tr>
					<td>{{$player->id}}</td>
					<td>{{$player->character_first}}</td>
					<td>{{$player->character_last}}</td>
					<td>{{$player->money}} tokens</td>
				</tr>
			@endforeach
	</table>	
	
	<hr>
	
	<h2> Top 5 Highest Level Players </h2>
	<table class='table table-striped'>
			<tr><th> ID </th><th> First Name </th><th> Last Name </th><th> Character Level </th></tr>
			@foreach ($most_exp as $player)
				<tr>
					<td>{{$player->id}}</td>
					<td>{{$player->character_first}}</td>
					<td>{{$player->character_last}}</td>
					<td>{{$player->level}} </td>
				</tr>
			@endforeach
	</table>
	
@endsection