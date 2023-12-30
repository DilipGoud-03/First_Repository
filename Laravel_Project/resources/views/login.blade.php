@extends('layouts.auth')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @elseif ($message = Session::get('error'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @elseif ($message = Session::get('message'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="{{ route('loginRequest') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection