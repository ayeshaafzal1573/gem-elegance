@extends('front.layouts.app')

@section('content')

    <form action="{{ route('account.processregister') }}" method="post" name="registrationForm" id="registrationForm">
        @csrf
        <h2>REGISTER</h2>
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">

        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Register</button>
    </form>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $("#registrationForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '{{ route("account.processregister") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                var errors = response.errors;
                window.location.href = '{{ route('account.login') }}';
            },
            error: function(jQXHR, exception) {
                console.log("Something went wrong");
            }
        });
    });
</script>
