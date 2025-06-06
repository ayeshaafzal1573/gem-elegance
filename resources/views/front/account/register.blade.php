@extends('front.layouts.app')

@section('content')
 <form action="{{ route('account.processregister') }}" method="post" name="registrationForm" id="registrationForm">
    @csrf
<div class="form-structor">
     @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
    <img src="{{ asset( "../front-assets/images/register.jpg") }}" alt="" width="500">
	<div class="signup">
		<h2 class="form-title" id="signup">Sign up</h2>
		<div class="form-holder">
		 <input type="text" name="name" placeholder="Name" class="input">
        
			<input type="email" class="input" placeholder="Email"name="email"  />
			<input type="number" class="input" placeholder="Phone Number" name="phone"  />
			<input type="password" class="input" placeholder="Password"  name="password" />
			<input type="password" class="input" placeholder="Confirm Password" name="password_confirmation"  />
		</div>
		  <button type="submit" class="submit-btn">Register</button>
	</div>

</div>

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
                // Check if response contains any errors
                if (response.hasOwnProperty('errors')) {
                    // Loop through each error and display it
                    $.each(response.errors, function(key, value) {
                        console.log(key + ': ' + value);
                    });
                } else {
                    // If no errors, redirect to login page
                    window.location.href = '{{ route('account.login') }}';
                }
            },
            error: function(jqXHR, exception) {
                // If AJAX request encounters an error
                console.log("AJAX Error: " + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    });
</script>
