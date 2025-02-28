@extends('seller.layouts.layout')
@section('seller_page_title')
 Edit Store
@endsection
@section('seller_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Store</h5>
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
                <form action="{{route('seller.store.edit', $store->id)}}" method="post">
                    {!! csrf_field()!!}
                    @method('PUT')
                @csrf
                    <label for="store_name" class="fw-bold mb-2">Store Name</label>
                    <input type="text" id="store_name" name="store_name" class="form-control"
                    placeholder="Enter Store Name">
                    <br>
                    <label for="details" class="fw-bold mb-2">Store Description</label>
                    <textarea type="text" id="details" name="details" cols="30" rows="10" class="form-control"
                    placeholder="Enter Store Description..."> </textarea>
                    <br>
                    <label for="slug" class="fw-bold mb-2">Store slug</label>
                    <input type="text" id="slug" name="slug" class="form-control"
                    placeholder="Enter slug">
                    <br>
    
                    <button type="submit" class="btn btn-primary w-100 mt-2">Update Store Name</button>
                  </form>
            </div>
        </div>
@endsection
