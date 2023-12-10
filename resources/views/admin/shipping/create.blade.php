@extends('admin.layouts.app')

@section('content')
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Shipping Management</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
        <a href="{{ route('category.list') }}">
            <button class="app-content-headerButton">Back</button>
        </a>
    </div>
    <div class="app-content-actions"></div>

    <form method="post" action="{{ route('shipping.store') }}">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Status">Name</label>
                <select name="country" id="country" class="form-control category-input">
                    <option value="">Select a Country</option>
                    @if($countries->isNotEmpty())
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                    <option value="rest_of_world">Rest of World</option>
                    @endif
                </select>
                @error('country')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="amount">Amount</label>
                <input class="category-input form-control" placeholder="Enter Category Name" type="text" name="amount" id="amount">

                @error('amount')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <input type="submit" value="Create" class="app-content-headerButton">
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Country</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($shippingcharges as $shippingcharge)
                        <tr>
                            <td>{{ $shippingcharge->id }}</td>
                            <td>{{ $shippingcharge->country_id=='rest_of_world'?'Rest of the world':$shippingcharge->name }}</td>
                            <td>{{ $shippingcharge->amount }}</td>
                            <td> <a href="{{ route('shipping.edit', ['id' => $shippingcharge->id]) }}" style="text-decoration: none">
                    <i class="fas fa-edit"></i>Edit
                </a><a href="{{ route('shipping.delete', ['id' => $shippingcharge->id]) }}" class="text-danger" style="text-decoration: none">
                    <i class="fas fa-trash-alt"></i> Delete
                </a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No shipping charges available</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
