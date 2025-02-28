@extends('admin.layouts.layout')
@section('admin_page_title')
 Create Category
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Category</h5>
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

              <form  action="{{route('category.create')}}"method="POST">
                @csrf
                <label for="category_name" class="fw-bold mb-2">Category Name:</label>
                <input type="text" id="category_name" name="category_name" class="form-control"
                placeholder="Enter Category Name">

                <br>

                <button type="submit" class="btn btn-primary w-100 mt-2">Add Category</button>
              </form>
            </div>
        </div>
@endsection
