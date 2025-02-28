@extends('admin.layouts.layout')
@section('admin_page_title')
 Manage Category
@endsection

@section('admin_layout')
    <h3>Manage category </h3>
    <div class="row mb-3">
        <div class="col-12">
            <input type="search" id="search"  name="search"  placeholder="search..." class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Category</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category name</th>
                                    <th>Actions</th>
                                    </tr>
                            </thead>
                            <tbody class="alldata"> 
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td> <a href="{{route('category.edit', $category->id)}}" class="btn btn-danger">Edit</a> 
                                        <a href="{{ route('category.destroy', $category->id) }}" method="POST" style ="display:inline">
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
                        $('.alldata').show();
                        $('.searchdata').hide();
                  }
            
                    $.ajax({
                        type: 'get',
                        url: '{{ route('Search') }}',
                        data: { 'search': value },
                        success: function(data) {
                            var content = '';
                            data.forEach(function(category) {
                                content += '<tr>';
                                content += '<td>' + category.id + '</td>';
                                content += '<td>' + category.category_name + '</td>';
                                content += '<td>';
                                content += '<a href="{{route('category.edit', $category->id)}}" class="btn btn-danger">Edit</a>';
                                content += '<a href="{{ route('category.destroy', $category->id) }}" method="POST" style ="display:inline">';
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
