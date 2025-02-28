@extends('admin.layouts.layout')
@section('admin_page_title')
 Create Sub Category
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Sub Category</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
               {{ Session::get('success') }}
                </div>
                @endif

              <form  action="{{route('subcategory.create')}}"method="POST">
                @csrf
                <label for="subcategory_name" class="fw-bold mb-2">Sub Category Name</label>
                <input type="text" id="subcategory_name" name="subcategory_name" class="form-control"
                placeholder="Enter Sub Category Name"> <br>

             

    <label for="category_id" class="fw-bold mb-2">Select Category</label>
    <select name="category_id" id="category_id"  class="form-control" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{$category->category_name }}</option>
        @endforeach
    </select>
                <br>

                <button type="submit" class="btn btn-primary w-100 mt-2">Add Sub Category</button>
              </form>
            </div>
        </div>
@endsection
