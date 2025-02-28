@extends('admin.layouts.layout')
@section('admin_page_title')
 Manage Product Attribute
@endsection

@section('admin_layout')
    <h3>Manage Product Attribute </h3>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Product Attribute</h5>
                </div>
                <div class="card-body"
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Attribute</th>
                                    <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($attributes as $Attribute)
                                <tr>
                                    <td>{{$Attribute->id}}</td>
                                    <td>{{$Attribute->Attribute_value}}</td>
                                    <td> <a href="{{route('product_attribute.edit', $Attribute->id)}}" class="btn btn-danger">Edit</a> 
                                        <a href="{{ route('product_attribute.destroy', $Attribute->id) }}" method="POST" style ="display:inline">
                                            @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-danger">Delete</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>

                
                </div>
            </div>
@endsection
