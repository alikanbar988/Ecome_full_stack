<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAttributeController extends Controller
{
  public function index()
  {
    return view('admin.product_attribute.create');
  }

  public function manage()
  {
    $attributes = Attribute::all();
    return view('admin.product_attribute.manage', compact('attributes'));
  }

  public function show(string $id)
  {
    $Attribute = Attribute::findOrFail($id);
    return view('admin.product_attribute.edit', compact('Attribute'));
  }

  public function store(request $request)
  {
      $request->validate([
          'Attribute_value' => 'unique:attributes|string|max:100',
      ]);
  
      Attribute::create([
          'Attribute_value' => $request->input('Attribute_value'),
      ]);
     
         $Attribute = new Attribute();
          return redirect()->back()->with('success','Product Attribute created successfully');
         }

         public function update(Request $request, $id)
         {
             $request->validate([
              'Attribute_value' => 'unique:attributes|string|max:100',
             ]);
         
             $Attribute = Attribute::findOrFail($id);
             $Attribute->update($request->only('Attribute_value'));
         
             return redirect()->route('product_attribute.manage')->with('success', 'Product Attribute updated successfully!');
         }

         public function destroy(string $id)
         {
          $Attribute = Attribute::findOrFail($id);
             $Attribute->delete();
             return redirect()->route('product_attribute.manage')->with('success','Product Attribute deleted successfully');
         }
}
