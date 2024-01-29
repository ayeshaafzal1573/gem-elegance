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
                       <form action="{{ route('account.updateprofile',  ['id' => $user->id]) }}" method="post">
@csrf
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

                                     <a style="text-decoration: none">
                                    <button class="btn w-100 personal-update" type="submit">Save</button>
                                     </a>
                                </div>
                            </div>
                        </div>
                       </form>
                    </div>
                    <br>
                   <div class="card" id="personal">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Address</h2>
                        </div>
                        <form action="{{ route('account.updateaddress',  ['id' => $user->id]) }}" method="post">
                            @csrf
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name">First Name</label>
                                    <input type="text" name="first_name"  value="{{$address->first_name}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Last Name</label>
                                    <input type="text" name="last_name" id="email" value="{{$address->last_name}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Email</label>
                                    <input type="text" name="email"  value="{{$address->email}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="mobile" id="phone" value="{{$address->mobile}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Country</label>
                                    <select name="country" id="country" class="form-control category-input">
                    <option value="">Select a Country</option>
                    @if($countries->isNotEmpty())
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{(!empty($address) & $address->country_id==$country->id)? 'selected': ''}}>{{ $country->name }}</option>
                    @endforeach
                    <option value="rest_of_world">Rest of World</option>
                    @endif
                </select>
                                </div>
                                  <div class="mb-3">
                                    <label for="address">Address</label> <br>
                                 <textarea name="address" id="address" cols="50" rows="3" class="form-control category-input">{{$address->address}}</textarea>
  </div>
                                      <div class="mb-3">
                                    <label for="apartment">Apartment</label>
                                    <input type="text" name="apartment" id="apartment" value="{{$address->apartment}}" class="form-control">
                                </div>
                                      <div class="mb-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" value="{{$address->city}}" class="form-control">
                                </div>
                                      <div class="mb-3">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state" value="{{$address->state}}" class="form-control">
                                </div>
                                      <div class="mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" name="zip" id="zip" value="{{$address->zip}}" class="form-control">
                                </div>


                                <div class="d-flex">

                                     <a style="text-decoration: none">
                                    <button class="btn w-100 personal-update" type="submit">Save</button>
                                     </a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
