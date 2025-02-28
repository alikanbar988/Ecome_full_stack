@extends('seller.layouts.layout')
@section('seller_page_title')
 Manage Store
@endsection

@section('seller_layout')
    <h3>Manage Store </h3>

    <div class="row mb-3">
        <div class="col-12">
            <input type="search" id="search"  name="search"  placeholder="search..." class="form-control">
        </div>
    </div>
   
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Store</h5>`
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Store name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="alldata">            
                                @foreach($stores as $store) 
                                <tr>
                                    <td>{{$store->id}}</td>
                                    <td>{{$store->store_name}}</td>
                                    <td>{{$store->details}}</td>
                                    <td>{{$store->slug}}</td>
                                    <td>
                                        <a href="{{route('seller.store.edit', $store->id)}}" class="btn btn-danger">Edit</a>
                                        <a href="{{ route('seller.store.destroy', $store->id) }}" method="POST" style ="display:inline">
                                            @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                           @endforeach
                            </tbody>
                            <tbody id="Content" class="searchdata"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#search').on('keyup', function() {
            var value = $(this).val();
            if (value) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.searchdata').hide();
                $('.alldata').show();
            }
    
            $.ajax({
                type: 'get',
                url: '{{ route('search') }}',
                data: { 'search': value },
                success: function(data) {
                    var content = '';
                    data.forEach(function(store) {
                        content += '<tr>';
                        content += '<td>' + store.id + '</td>';
                        content += '<td>' + store.store_name + '</td>';
                        content += '<td>' + store.details + '</td>';
                        content += '<td>' + store.slug + '</td>';
                        content += '<td>';
                        content += ' <a href="{{route('seller.store.edit', $store->id)}}" class="btn btn-danger">Edit</a>';
                        content += '<a href="{{ route('seller.store.destroy', $store->id) }}" method="POST" style ="display:inline">';
                        content += '@csrf';
                        content += '@method('DELETE')';
                        content += '<button type="submit" class="btn btn-danger">Delete</button>';
                        content += '</a>';
                        content += '</td>';
                        content += '</tr>';
                    });
                    $('#Content').html(content);
                }
            });
        });
    </script>

@endsection
