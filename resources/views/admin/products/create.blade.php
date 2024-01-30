@extends('admin.layouts.app')
<style>
    <style>
    #imagePreviews {
        display: flex;
        flex-wrap: wrap;
    }

    .image-preview {
        max-width: 100px;
        max-height: 100px;
        margin-right: 10px;
        margin-bottom: 10px;
    }
</style>
@section('content')
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Create Product</h1>
            <button class="mode-switch" title="Switch Theme">
                <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                    <defs></defs>
                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                </svg>
            </button>
            <a href="{{ route('product.list') }}">
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
        <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data" name="productForm">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Category Name">Product Name:</label>
                    <input class="category-input form-control" placeholder="Enter Category Name" type="text"
                        name="name">
                        @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                 <div class="col-md-6">

                    <label for="qty">Product Quantity:</label>
                    <input type="number" min="0" name="qty" id="qty" class="form-control category-input"
                        placeholder="Qty">
                        @error('qty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Category Name">Product Price:</label>
                    <input class="category-input form-control" placeholder="Enter Product Price" type="number"
                        name="price">
                        @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-6">
                    <label for="Category Name">Product Compare Price:</label>
                    <input class="category-input form-control" placeholder="Enter Product Compare Price" type="number"
                        name="compare_price">
                        @error('compare_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="style">Style</label>
                    <input type="text" name="style" id="style" class="form-control category-input"
                        placeholder="Style">
                        @error('style')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-6">
                    <label for="material">Material</label>
                    <input type="text" name="material" id="material" class="form-control category-input"
                        placeholder="Material">
                        @error('material')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="Category Name">Description:</label>
                    <input class="category-input form-control" placeholder="Enter Product Description" type="text"
                        name="description">
                        @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
           <div class="row mb-3">
    <div class="col-md-12">
                            <label for="images">Images</label>
                            <input type="file" name="images[]" id="images" multiple class="form-control category-input"
                                onchange="previewImages()">
                        </div>
@error('images')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                        <div id="imagePreviews" class="mt-2"></div>
    </div>


            <div class="row mb-3">

                <div class="col-md-6">
                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control category-input">
                                        <option value="">Select a Category</option>
                                        @if ($category->isNotEmpty())
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                 <div class="col-md-6">
                    <label for="Status"> Product Status:</label>
                    <select name="status" class="form-control category-input">
                        <option value="1">Active</option>
                        <option value="0">Block</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>


            <input type="submit" value="Create" class="app-content-headerButton">
        </form>
    </div>
    <script>
        function previewImages() {
            var imagePreviews = document.getElementById('imagePreviews');
            imagePreviews.innerHTML = ''; // Clear previous previews

            var input = document.getElementById('images');
            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var preview = document.createElement('img');
                        preview.className = 'image-preview';
                        preview.src = e.target.result;
                        imagePreviews.appendChild(preview);
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>

@endsection
