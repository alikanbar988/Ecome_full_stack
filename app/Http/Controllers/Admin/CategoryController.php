<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.create');
    }

    public function manage(){
        $categories =Category::all();
        return view('admin.category.manage', compact('categories'));
    }

    public function store(request $request)
    {
      $request->validate([
            'category_name' => 'unique:categories|string|max:100',
         ]);
            $category = new \App\Models\Category();
            $category->category_name = $request->input('category_name');
          
            $category->save();
            return redirect()->route('category.create')->with('success','Category created successfully');
           }
           public function show(request $request, string $id)
           {
            $category= Category::findOrFail($id);
            return view('admin.category.edit', compact('category'));
            }

            public function update(request $request ,string $id)
            {
                $category = Category::findOrFail($id);
                $category->update($request->except(['_method', '_token']));
                $category->update($request->all());

                return redirect()->route('category.manage')->with('success','Category updated successfully');
            }

            public function destroy(string $id)
            {
                $category = Category::findOrfail($id);
                $category->delete();
                return redirect()->route('category.manage')->with('success','Category deleted successfully');
            }

            
        public function Search(Request $request)

        {

            $query = $request->input('search');
            $categories = Category::where('category_name', 'LIKE', "%{$query}%")  
            ->get();
        
            return response()->json($categories);
        }

    }

