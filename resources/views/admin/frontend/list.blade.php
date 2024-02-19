@extends('admin.layouts.app')
@section('content')
   <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">General Settings</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
        <a href="{{route('home.create')}}">
      <button class="app-content-headerButton">Add Things</button>
</a>
    </div>
    <div class="app-content-actions">
<input id="searchInput" class="search-bar" name="keyword" placeholder="Search..." type="search" value="{{ request('keyword') }}">
    <input type="button" value="Search" class="app-content-headerButton" onclick="submitSearchForm()">


      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper" hidden>
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

    <div class="products-area-wrapper tableView">
      <div class="products-header">

           <div class="product-cell sales">Images</div>
           <div class="product-cell sales">Edit</div>

        <div class="product-cell stock">Delete</div>


      </div>

@if($banners->isNotEmpty())
    @foreach ($banners as $banner)
        <div class="products-row">
           <div class="product-cell">
                @if($banner->image_path)
                    <img src="{{ asset($banner->image_path) }}" alt="product" style="width: 250px;height:200px">
                @else
                    <p>No Image</p>
                @endif

            </div>



            <div class="product-cell stock">
                <a href="{{ route('home.edit', ['id' => $banner->id]) }}" style="text-decoration: none">
                    <i class="fas fa-edit"></i>Edit
                </a>
            </div>

            <div class="product-cell price">
                <a href="{{ route('home.delete', ['id' => $banner->id]) }}" class="text-danger" style="text-decoration: none">
                    <i class="fas fa-trash-alt"></i> Delete
                </a>
            </div>
        </div>
    @endforeach
@else
    <p>No categories available.</p>
@endif
     </div>
  </div>

@endsection
