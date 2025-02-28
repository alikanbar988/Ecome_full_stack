@extends('admin.layouts.layout')
@section('admin_page_title')
 Manage SubCategory
@endsection

@section('admin_layout')
    <h3>Manage sub category </h3>
    <div class="row mb-3">
        <div class="col-13">
            <input type="search" id="search"  name="search"  placeholder="search..." class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All sub Category</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>sub Category </th>
                                    <th>Category name</th>
                                    <th>Actions</th>
                            </thead>
                            <tbody class="alldata">
                                @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{$subcategory->id}}</td>
                                    <td>{{$subcategory->subcategory_name}}</td>
                                    <td>{{$subcategory->category->category_name }}</td>
                                    <td> <a href="{{route('subcategory.edit', $subcategory->id)}}" class="btn btn-danger">Edit</a>
                                        <a href="{{ route('subcategory.destroy', $subcategory->id)}}" method="POST" style ="display:inline">
                                            @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-danger">Delete</button>
                                        </a>
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody id="Content" class="Searchdata"></tbody>
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
                $('.Searchdata').show();
                   } else {
                $('.alldata').show();
                $('.Searchdata').hide();
          }
    
            $.ajax({
                type: 'get',
                url: '{{ route('subsearch') }}',
                data: { 'search': value },
                success: function(data) {
                    var content = '';
                    data.forEach(function(subcategory) {
                            content += '<tr>';
                            content += '<td>' + subcategory.id + '</td>';
                            content += '<td>' + subcategory.subcategory_name + '</td>';
                            content += '<td>' + subcategory.category.category.id + '</td>';
                            content += '<td>';
                            content += '<a href="{{route('subcategory.edit', $subcategory->id)}}" class="btn btn-danger">Edit</a>';
                            content += '<a href="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST" style ="display:inline">';
                            content += '@csrf';
                            content += '@method('DELETE')';
                            content += '<button type="submit" class="btn btn-danger">Delete</button>';
                            content += '</a>';
                            content += '</td>';
                            content += '</tr>';
                    });
                }
            });
        });
    </script>
@endsection
