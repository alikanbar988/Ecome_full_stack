@extends('admin.layouts.layout')
@section('admin_page_title')
 Edit Product Attribute
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Product Attribute</h5>
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
                <form action="{{route('product_attribute.edit', $Attribute->id)}}" method="post">
                    {!! csrf_field()!!}
                    @method('PUT')
                @csrf
                <label for="Attribute_value" class="fw-bold mb-2">Product Attribute</label>
                <input type="text" id="Attribute_value" name="Attribute_value" class="form-control"
                value="{{ $Attribute->Attribute_value }}">

                <button type="submit" class="btn btn-primary w-100 mt-2">Update Product Attribute</button>
              </form>
            </div>
        </div>
@endsection
