<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\seller\SellerProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\customer\CustomerMainController;
use App\Http\Controllers\Admin\ProductAttributeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

//admin routes 

Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
 Route::prefix('admin')->group(function () {
    Route::controller(AdminMainController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
    Route::get('/settings', 'setting')->name('admin.settings');
    Route::get('/manage/users', 'manage_user')->name('admin.manage.user');
    Route::get('/manage/stores', 'manage_store')->name('admin.manage.store');
    Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
    Route::get('/order/history', 'order_history')->name('admin.order.history');
    });
      Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/add', 'index')->name('category.create');
   Route::post('/category/add', 'store')->name('category.create');
    Route::get('/category/manage', 'manage')->name('category.manage');
    Route::get('/category/edit/{id}', 'show')->name('category.edit');
    Route::post('/category/edit/{id}', 'show')->name('category.edit');
    Route::put('/category/edit/{id}', 'update')->name('category.edit');
    Route::get('/category/delete/{id}', 'destroy')->name('category.destroy');
    Route::delete('/category/delete/{id}', 'destroy')->name('category.destroy');
    Route::get('/search', 'Search')->name('Search');
   
    });
    
    Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/subcategory/add', 'index')->name('subcategory.create');
    Route::post('/subcategory/add', 'store')->name('subcategory.create');
    Route::get('/subcategory/manage', 'manage')->name('subcategory.manage');
    Route::get('/subcategory/edit/{id}', 'show')->name('subcategory.edit');
    Route::post('/subcategory/edit/{id}', 'show')->name('subcategory.edit');
    Route::put('/subcategory/edit/{id}', 'update')->name('subcategory.edit');
    Route::get('/subcategory/delete/{id}', 'destroy')->name('subcategory.destroy');
    Route::delete('/subcategory/delete/{id}', 'destroy')->name('subcategory.destroy');
    Route::get('/subcategory/search', 'Subcategorysearch')->name('subsearch');  
});
    
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/manage', 'index')->name('product.manage');
        Route::get('/product/review/manage', 'review')->name('product.manage_product_review');
        });
        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/productattribute/create', 'index')->name('product_attribute.create');
            Route::get('/productattribute/manage', 'manage')->name('product_attribute.manage');
            Route::post('/productattribute/create', 'store')->name('product_attribute.create');
             Route::get('/productattribute/edit/{id}', 'show')->name('product_attribute.edit');
            Route::post('/productattribute/edit/{id}', 'show')->name('product_attribute.edit');
            Route::put('/productattribute/edit/{id}', 'update')->name('product_attribute.edit');
            Route::get('/productattribute/delete/{id}', 'destroy')->name('product_attribute.destroy');
            Route::delete('/productattribute/delete/{id}', 'destroy')->name('product_attribute.destroy');

            });
             Route::controller(ProductDiscountController::class)->group(function () {
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage');
        });

    });
});
 

//vendor routes 

Route::middleware(['auth', 'verified','rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function () {
       Route::controller(SellerMainController::class)->group(function () {
       Route::get('/dashboard', 'index')->name('vendor');
       Route::get('/order/history', 'historyorder')->name('seller.orderhistory');
   });
   Route::controller(SellerProductController::class)->group(function () {
    Route::get('/product/create', 'index')->name('seller.product');
  Route::get('/product/manage', 'manage')->name('seller.product.manage');
    });
    Route::controller(SellerStoreController::class)->group(function () {
        Route::get('/store/create', 'index')->name('seller.store.create');
        Route::post('/store/create', 'store')->name('seller.store.create');
        Route::get('/store/manage', 'manage')->name('seller.store.manage');
        Route::get('/store/edit/{id}', 'show')->name('seller.store.edit');
        Route::post('/store/edit/{id}', 'show')->name('seller.store.edit');
        Route::put('/store/edit/{id}', 'update')->name('seller.store.edit');
        Route::get('/store/delete/{id}', 'destroy')->name('seller.store.destroy');
        Route::delete('/store/delete/{id}', 'destroy')->name('seller.store.destroy');
        Route::get('/search', 'search')->name('search');
          });
          });
          });

// customer routes
          Route::middleware(['auth', 'verified','rolemanager:customer'])->group(function () {
            Route::prefix('customer')->group(function () {
             Route::controller(CustomerMainController::class)->group(function () {
             Route::get('/dashboard', 'index')->name('dashboard');
             Route::get('/order/history', 'history')->name('customer.history');
             Route::get('/payment', 'payment')->name('customer.payment');
             Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
     });

    });
});
        
// route  For search  

//Route::get('/',[SearchController::class, 'index'])->name('search');
//Route::get('/search/store',[SearchController::class, 'search'])->name('search.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
