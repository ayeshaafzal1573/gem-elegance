@extends('admin.layouts.app')

@section('content')
 	
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Edit Category</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <a href="{{route('category.list')}}">
      <button class="app-content-headerButton">Back</button>
      </a>
    </div>
    <div class="app-content-actions">
     
    </div>
 <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
   @csrf
   <div class="row mb-3">
    <div class="col-md-12">
        <label for="Category Name">Category Name:</label>
        <input class="category-input form-control" placeholder="Enter Category Name" type="text" name="name" value="{{$category->name}}">
    </div>
    </div>
     <div class="row mb-3">
    <div class="col-md-12">
        <label for="Category Name">Category Slug:</label>
        <input class="category-input form-control" placeholder="Enter Category Name" type="text" name="slug" value="{{$category->slug}}">
    </div>
    </div>
    <div class="row mb-3">
 <div class="col-md-12">
        <label for="Status">Status</label>
          <select name="status" id="status" class="form-control category-input">
 <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
 <option value="0"{{ $category->status == 0 ? 'selected' : '' }}>Disabled</option>
                                    </select>
    </div>
    </div>
<div class="row mb-3">
    <div class="col-md-12">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control category-input" onchange="previewImage()" >
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
@if($category->image)
 <img src="{{ asset('storage/uploads/category/' . $category->id . '.png') }}" alt="product" style="height: 100px">
@endif   
           </div>
</div>


    <div class="row mb-3">
    <div class="col-md-6">
        <label for="show">Show on Home</label>
        <select name="show" id="status" class="form-control category-input">
            <option value="1" {{ $category->show == 1 ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ $category->show == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>
      <div class="col-md-6">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control category-input">
        <option value="Male" {{ $category->gender == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $category->gender == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ $category->gender == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>

</div>
<input type="submit" value="Create" class="app-content-headerButton">
    </form>
     </div>
     <script>
    function previewImage() {
        var input = document.getElementById('image');
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                 preview.style.height = '100px';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection