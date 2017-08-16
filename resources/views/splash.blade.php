@extends('layouts.app')

@section('pageTitle', 'Welcome to the Bastion Zone')

<style type='text/css'>
	.centered{ text-align:center; }
</style>

@section('content')

        <div class="jumbotron centered">
		  <h1> Text-based RPG {{ config('app.name') }} </h1>
		  <h2 class="display-3"> Aeipathy Web Studios presents... </h2>
		  <p class="lead">A text-based RPG based in the Half Life Universe</p>
		  <hr class="my-4">
		  <p>A project thought up by 16 year old self written procedurally, then re-written using MVC.</p>
		   @if (Auth::guest())
		  <p class="lead">
			<a class="btn btn-danger btn-lg" href="{{ route('register') }}" role="button">Get started</a>
		  </p>
		  @else
			<p class="lead">You are already logged in, go to your dashboard to begin.</p>
				<a class="btn btn-success btn-lg" href="{{ route('dashboard') }}" role="button">Go to Dashboard</a>
		  @endif
		</div>
@endsection
