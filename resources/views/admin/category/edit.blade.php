@extends('admin.layouts.layout')
@section('admin_page_title')
 Edit Category
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Category</h5>
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
                <form action="{{route('category.edit', $category->id)}}" method="post">
                    {!! csrf_field()!!}
                    @method('PUT')
                @csrf
                <label for="category_name" class="fw-bold mb-2">Category Name:</label>
                <input type="text" id="category_name" name="category_name" class="form-control"
                value="{{ $category->category_name }}">

                <button type="submit" class="btn btn-primary w-100 mt-2">Update Category</button>
              </form>
            </div>
        </div>
@endsection
