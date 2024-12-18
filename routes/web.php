<?php

use App\Http\Resources\StoreResource;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Store;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function (){
    $stores = Store::paginate(8);
    $products = Product::paginate(8);
    return view('welcome',compact('stores','products'));
});

Route::get('/dashboard', function () {
    $store = new StoreResource(auth()->user()->store);
    return view('dashboard',compact('store'));
})->middleware(['auth'])->name('dashboard');




// Other web routes
require_once __DIR__.'/store.php';
require_once __DIR__.'/product.php';
require_once __DIR__.'/profile.php';
require_once __DIR__.'/users.php';
require __DIR__.'/auth.php';
