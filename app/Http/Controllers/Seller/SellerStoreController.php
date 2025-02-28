<?php

namespace App\Http\Controllers\Seller;


use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerStoreController extends Controller
{
 public function index()
 {
    return view('seller.store.create');
 }
 public function manage()
 {
   $userId = Auth::user()->id;
   $stores = Store::where('user_id', $userId)->get();
    return view('seller.store.manage',compact('stores'));
 }
   public function show(request $request)
   {
      $store = Store::findOrFail($request->id);
      return view('seller.store.edit', compact('store'));
   }
   public function edit(Request $request, string $id)
   {
      $store = Store::findOrFail($id);
      return view('seller.store.edit', compact('store'));
   }
   public function store(request $request)
   {
   // Validate the request

     $request->validate([
      'store_name' => 'required|string',
      'details' => 'required|string',
      'slug' => 'required|string',
  ]);

  // Get the authenticated user's ID
  $userId = Auth::user();

  // Ensure the user is authenticated
  if (!$userId) {
      return response()->json(['error' => 'You must be logged in to create a store.'], 401);
  }
     Store::create([
      'store_name' => $request->input('store_name'),
      'user_id' => $userId->id,
      'details' => $request->input('details'),
      'slug' => Str::slug ($request->input('slug')),
  ]);
    return redirect()->route('seller.store.create');
 
   }
      public function update(Request $request, string $id)
      {
         $request->validate([
               'store_name' => 'required|string',
               'details' => 'required|string',
               'slug' => 'required|string',
         ]);
      
         $store = Store::findOrFail($id);
         $store->update($request->only('store_name', 'details', 'slug'));
      
         return redirect()->route('seller.store.manage')->with('success', 'Store updated successfully!');
      }


      public function destroy($id)

      {
         $store = Store::findOrfail($id);
         $store->delete();
         return redirect()->route('seller.store.manage')->with('success', 'Store deleted successfully!');
      }

      public function search(Request $request)
      {
          $query = $request->input('search');
          $stores = Store::where('store_name', 'LIKE', "%{$query}%")
               ->orWhere('details', 'LIKE', "%{$query}%")
               ->orWhere('slug', 'LIKE', "%{$query}%")
          ->get();
  
          return response()->json($stores);
      }

   }
