<?php

namespace App\Http\Controllers\Admin;




use App\Models\Category;
use App\Models\subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SubCategoryController extends Controller
{
    public function index()
    {
        $categories =Category::all();
    
        return view ('admin.subcategory.create', compact('categories'));
    }
    public function manage()
    {
        $subcategories = subcategory::all();
        return view ('admin.subcategory.manage',compact('subcategories'));
    }

    public function show(string $id)
    {
     $subcategory = subcategory::findOrFail($id);
     return view('admin.subcategory.edit', compact('subcategory'));
     }


    public function store(request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validate that the category exists
        ]);
    
        subcategory::create([
            'subcategory_name' => $request->input('subcategory_name'),
            'category_id' => $request->input('category_id'),
        ]);
       
           $subcategories = new subcategory();
            return redirect()->back()->with('success','subcategory created successfully');
           }
           
           public function update(Request $request, $id)
           {
               $request->validate([
                   'subcategory_name' => 'required|string|max:255',
               ]);
           
               $subcategory = subcategory::findOrFail($id);
               $subcategory->update($request->only('subcategory_name'));
           
               return redirect()->route('subcategory.manage')->with('success', 'Subcategory updated successfully!');
           }

           public function destroy(string $id)
           {
                $subcategory = subcategory::findOrfail($id);
               $subcategory->delete();
               return redirect()->route('subcategory.manage')->with('success','Sub Category deleted successfully');
           }
        
           public function Subcategorysearch(Request $request)

           {
   
               $query = $request->input('search');
               $subcategory = subcategory::where('subcategory_name', 'LIKE', "%{$query}%") 
              ->orwhere('category_id', 'LIKE', "%{$query}%")   
               ->get();
   
               return response()->json($subcategory);
           }
        
    } 




    
