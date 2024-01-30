@extends('admin.layouts.app')

@section('content')

  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Create Coupon Code</h1>
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
    <div class="app-content-actions">
 <div class="app-content-actions-wrapper" hidden>
        <div class="filter-button-wrapper" >
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>


        </div>
        <button class="action-button list active" title="List View" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <form action="{{route('coupan.store')}}" method="post" id="discountForm" name="discountForm">

        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="code">Coupon Code:</label>
                <input class="category-input form-control" placeholder="Enter Coupon Code" type="text" name="code">
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="name">Coupon Name:</label>
                <input class="category-input form-control" placeholder="Enter Coupon Name" type="text" name="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="description">Description</label>
                <textarea name="description" class="category-input form-control" ></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="max_uses">Max Uses:</label>
                <input class="category-input form-control" placeholder="Maximum Uses" type="number" name="max_uses">
                @error('max_uses')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="max_uses_user">Max Uses Users:</label>
                <input class="category-input form-control" placeholder="Maximum Uses Users" type="text" name="max_uses_user">
                @error('max_uses_user')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control category-input">
                    <option value="percent">Percent</option>
                    <option value="fixed">Fixed</option>
                </select>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="discount_amount">Discount Amount:</label>
                <input class="category-input form-control" placeholder="Discount Amount" type="number" name="discount_amount">
                @error('discount_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="min_amount">Minimum Amount:</label>
                <input class="category-input form-control" placeholder="Minimum Amount" type="number" name="min_amount">
                @error('min_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                 <label for="starts_at">Starts At:</label>
                <input class="category-input form-control" placeholder="Starts At" id="starts_at" type="text" name="starts_at">
               @error('starts_at')
                <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>
            <div class="col-md-6">
                <label for="expires_at">Expires At:</label>
                <input class="category-input form-control" placeholder="Expires At" type="text" id="expires_at"  name="expires_at">
              @error('expires_at')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
        </div>
             <input type="submit" value="Create" class="app-content-headerButton">
    </form>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datetimepicker@2.5.20"></script>

<script>
    $(document).ready(function(){
        $('#starts_at').datetimepicker({
            format: 'Y-m-d H:i:s',
        });
        $('#expires_at').datetimepicker({
            format: 'Y-m-d H:i:s',
        });

        });
</script>

