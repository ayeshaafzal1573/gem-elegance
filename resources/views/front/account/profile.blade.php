@extends('front.layouts.app')
@section( 'content')
<main>

    <section class=" section-11 ">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">
                  @include('front.account.common.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="card" id="personal">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
                        </div>
                        <form action="" name="profileForm" id="profileForm"></form>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{$user->phone}}" class="form-control">
                                </div>



                                <div class="d-flex">

                                     {{-- <a href="{{ route('account.editprofile', ['id' => $user->id]) }}" style="text-decoration: none"> --}}
                                    <button class="btn w-100 personal-update">Update</button>
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card" id="personal">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Address</h2>
                        </div>
                        <form action="" name="addressForm" id="addressForm"></form>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name">First Name</label>
                                    <input type="text" name="first_name"  value="{{$user->name}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Last Name</label>
                                    <input type="text" name="last_name" id="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Email</label>
                                    <input type="text" name="email"  value="{{$user->phone}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="mobile" id="phone" value="{{$user->phone}}" class="form-control">
                                </div>



                                <div class="d-flex">

                                     {{-- <a href="{{ route('account.editprofile', ['id' => $user->id]) }}" style="text-decoration: none">
                                    <button class="btn w-100 personal-update">Update</button> --}}
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
