@extends('front.layouts.app')
@section('content')
    <script>
        // Check for the error message and display an alert
        @if(session('error'))
            alert('{{ session('error') }}');
        @endif
    </script>
<div class="container mb-5 mt-2">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

<main class="box">
        <span class="border-line"></span>
        <form action="{{route('account.authenticate')}}" method="post">
            @csrf
            <h2>Sign In</h2>
            <div class="input-box">
                <input type="text" required="required"  name="email" value="{{old('email')}}">

@error('email')
<span class="invalid-feedback">{{$message}}</span>
@enderror
                <span>Email</span>
                <i></i>

            </div>
            <div class="input-box">
                <input type="password" required="required" name="password">
                    @error('password')
<span class="invalid-feedback">{{$message}}</span>
@enderror
                <span>Password</span>
                <i></i>

            </div>

            <input type="submit" value="Login">

        </form>
    </main>
    </div>
        </div>

    </div>


@endsection
