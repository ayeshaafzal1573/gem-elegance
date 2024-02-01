@extends('admin.layouts.app')

@section('content')
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Change Password</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
    </div>
    <div class="app-content-actions" hidden>
          <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper"  hidden>
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>


        </div>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <br>
    <form method="post" action="{{ route('account.adminchangePassword') }}" name="changePasswordForm" id="changePasswordForm">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="oldpassword">Old Password:</label>
                <input class="category-input form-control" placeholder="Enter Your Old Password" type="password"
                    name="oldpassword" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="newpassword">New Password:</label>
                <input class="category-input form-control" placeholder="Enter Your New Password" type="password"
                    name="newpassword" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="confirm_password">Confirm Password:</label>
                <input class="category-input form-control" placeholder="Enter Your Confirm Password" type="password"
                    name="confirm_password" required>
            </div>
        </div>
        @error('oldpassword')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('newpassword')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('confirm_password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Update" class="app-content-headerButton">
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
