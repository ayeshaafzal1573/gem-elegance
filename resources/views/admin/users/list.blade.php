@extends('admin.layouts.app')
@section('content')
   <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Users</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>

    </div>
    <div class="app-content-actions">
<input id="searchInput" class="search-bar" name="keyword" placeholder="Search..." type="search" value="{{ request('keyword') }}">
    <input type="button" value="Search" class="app-content-headerButton" onclick="submitSearchForm()">


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


    <div class="products-area-wrapper tableView">
    <div class="products-header">

        <div class="product-cell image">
          Name
          <button class="sort-button">
           </button>
        </div>

        <div class="product-cell status-cell">Email<button class="sort-button">
          </button></div>
        <div class="product-cell sales">Phone<button class="sort-button">
          </button></div>


      </div>
  @if($users->isNotEmpty())
    @foreach ($users as $user)
        <div class="products-row">
          <div class="product-cell sales">
                <span class="cell-label">Name:</span>{{ $user->name }}
            </div>
          <div class="product-cell sales">
                <span class="cell-label">Email:</span>{{ $user->email }}
            </div>
          <div class="product-cell sales">
                <span class="cell-label">Phone:</span>{{ $user->phone }}
            </div>



        </div>
    @endforeach
@else
    <p>No categories available.</p>
@endif
     </div>
  </div>
  <script>
      function submitSearchForm() {
        var keyword = document.getElementById('searchInput').value;
           window.location.href = "{{ route('users.index') }}?keyword=" + encodeURIComponent(keyword);
    }
  </script>
@endsection
