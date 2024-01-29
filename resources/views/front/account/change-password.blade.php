@extends('front.layouts.app')
@section('content')
<main>

    <section class="section-11">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">
                  @include('front.account.common.sidebar')
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Change Password</h2>
                        </div>
                        <form action="{{ route('account.processchangePassword') }}" method="post" id="changePasswordForm" name="changePasswordForm">
                            @csrf <!-- Add CSRF token for security -->
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="old_password">Old Password</label>
                                        <input type="password" name="oldpassword"  placeholder="Old Password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="newpassword"  placeholder="New Password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password"  placeholder="Confirm Password" class="form-control">
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-dark">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $("#changePasswordForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('account.processchangePassword') }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    // Handle the success response
                }
            });
        });
    });
</script>
