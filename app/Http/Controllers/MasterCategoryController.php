<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function storeca()
    {
        $request->validate([
            'category_name' => 'required',
            ]);
            $category = new \App\Models\Category();
            $category->category_name = $request->input('category_name');
          
            $category->save();
            return redirect()->route('category.create')->with('success','Category created successfully');
            }  
    }

