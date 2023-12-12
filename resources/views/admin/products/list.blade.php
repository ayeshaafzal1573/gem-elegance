@extends('admin.layouts.app')
@section('content')
   <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Products</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <a href="{{route('product.create')}}">
      <button class="app-content-headerButton">Add Product</button>
</a>
    </div>
    <div class="app-content-actions">
<input id="searchInput" class="search-bar" name="keyword" placeholder="Search..." type="search" value="{{ request('keyword') }}">
    <input type="button" value="Search" class="app-content-headerButton" onclick="submitSearchForm()">


      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
        <div class="filter-menu">
<form method="get" action="{{ route('product.list') }}">
    @csrf
    <select name="category">
        <option value="">All Categories</option>
        @foreach ($category as $cat)
            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <label>Status</label>
    <select name="status">
        <option value="">All Status</option>
        <option value="Active">Active</option>
        <option value="Disabled">Disabled</option>
    </select>

    <div class="filter-menu-buttons">
        <button type="button" class="filter-button reset" onclick="resetFilters()">
            Reset
        </button>
        <button type="submit" class="filter-button apply">
            Apply
        </button>
    </div>
</form>

</div>

        </div>
        <button class="action-button list active" title="List View">
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


        <div class="product-cell image">
          Product Name

        </div>

        <div class="product-cell status-cell">Status</div>
        <div class="product-cell sales">Slug</div>
          <div class="product-cell sales">Description</div>
           <div class="product-cell sales">Price</div>

          <div class="product-cell sales">Style</div>
          <div class="product-cell sales">Material</div>
          <div class="product-cell sales">Category</div>

        <div class="product-cell stock">Action</div>


      </div>

  @if($products->isNotEmpty())
    @foreach ($products as $products)
        <div class="products-row">
           <div class="product-cell image">
                @if($products->images->isNotEmpty())
   <img src="{{ asset('/' . $products->images->first()->image_path) }}" alt="product">

@else
    <p>No Image</p>
@endif

                <span>{{ $products->name }}</span>
            </div>

            <div class="product-cell status-cell">
                <span class="cell-label">Status:</span>
                @if ($products->status == 1)
                    <span class="status active">Active</span>
                @else
                    <span class="status disabled">Disabled</span>
                @endif
            </div>

            <div class="product-cell sales">
                <span class="cell-label">Slug:</span>{{ $products->slug }}
            </div>
            <div class="product-cell sales">
           <span class="cell-label">Description:</span>
<span class="truncated-description">{{ $products->description }}</span>
</div>
            <div class="product-cell sales">
                <span class="cell-label">Price:</span>{{ $products->price }}
            </div>
            <div class="product-cell sales">
                <span class="cell-label">Style:</span>{{ $products->style}}
            </div>
            <div class="product-cell sales">
                <span class="cell-label">Material:</span>{{ $products->material }}
            </div>
           <div class="product-cell sales">
    <span class="cell-label">Category:</span>{{ $products->category->name ?? 'N/A' }}
</div>
            <div class="product-cell stock">
            <a href="{{ route('product.edit', ['id' => $products->id]) }}" style="text-decoration: none;">
    <i class="fas fa-edit" style="margin-right: 10px;"></i>
</a>

<a href="{{ route('product.delete', ['id' => $products->id]) }}" class="text-danger" style="text-decoration: none;">
    <i class="fas fa-trash-alt" style="margin-right: 10px;"></i>
</a>

              </div>

        </div>
    @endforeach
@else
    <p>No categories available.</p>
@endif
     </div>
  </div>
  <script>
        function resetFilters() {
        document.querySelector('.filter-menu form').reset();
    }

      function submitSearchForm() {
        var keyword = document.getElementById('searchInput').value;
           window.location.href = "{{ route('product.list') }}?keyword=" + encodeURIComponent(keyword);
    }
  </script>
@endsection
