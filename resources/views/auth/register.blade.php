@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h2 class="panel-heading">Create new account</h2>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						  <div class="form-group{{ $errors->has('avatar_url') ? ' has-error' : '' }}">
                            <label for="avatar_url" class="col-md-4 control-label">Avatar URL</label>

                            <div class="col-md-6">
                                <input id="avatar_url" type="text" class="form-control" name="avatar_url" value="{{ old('avatar_url') }}" placeholder="Enter image URL" required autofocus>

                                @if ($errors->has('avatar_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
						
						<hr>
						
						<h2> Create new character </h2>
						
						<div class="form-group{{ $errors->has('character-first') ? ' has-error' : '' }}">
                            <label for="character_first" class="col-md-4 control-label">Character First Name</label>

                            <div class="col-md-6">
                                <input id="character_first" type="text" class="form-control" name="character_first" value="{{ old('character_first') }}" placeholder="Enter the first name of your character" required autofocus>

                                @if ($errors->has('character_first'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('character_first') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						  <div class="form-group{{ $errors->has('character_last') ? ' has-error' : '' }}">
                            <label for="character_last" class="col-md-4 control-label">Character Last Name</label>

                            <div class="col-md-6">
                                <input id="character_last" type="text" class="form-control" name="character_last" value="{{ old('character_last') }}" placeholder="Enter the last name of your character" required autofocus>

                                @if ($errors->has('character_last'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('character_last') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						 <div class="form-group{{ $errors->has('character_class') ? ' has-error' : '' }}">
                            <label for="character_class" class="col-md-4 control-label">Character Class</label>

                            <div class="col-md-6">
								<select id="character_class" name='character_class' class='form-control'>
									<option value='1'> Intellectual </option>
									<option value='2'> Psychotic </option>
									<option value='3'> Businessman </option>
									<option value='4'> Brute </option>
									<option value='5'> Scout </option>
								</select>

                                @if ($errors->has('character_class'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('character_class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
