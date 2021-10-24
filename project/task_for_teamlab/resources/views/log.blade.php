@extends('sample')

@section('title', 'Login')

@section('for_token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main_content')
    <div class="col-md-10 mx-auto col-lg-5">
        <form action="{{route('user.log')}}" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            @csrf
            <div class="form-floating mb-3">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" value="" placeholder="name@example.com">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="" placeholder="Password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="users" value="1">Sign up</button>
            <hr class="my-4">
            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
    </div>
@endsection
