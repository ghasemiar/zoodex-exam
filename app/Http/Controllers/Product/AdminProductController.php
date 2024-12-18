<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\StoreResource;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    public function indexByStore(Store $store)
    {
        $storeData = new StoreResource($store);
        return view('admin.product.index-product', compact('storeData'));
    }
    public function createByStore(Store $store)
    {
        return view('admin.product.create-product', compact('store'));
    }
    public function storeByStore(CreateProductRequest $request,Store $store)
    {
        $validated = $request->validated();
        if (request()->hasFile('image')) {
            $file = $request->file('image');
            $file_name = date("Y_m_d_h_i_s") . $file->getClientOriginalName();
            $file->move(public_path(env('PRODUCT_IMAGES_PATH')), $file_name);
            $validated['image'] = $file_name;
        }
        $store->products()->create($validated);
        redirect()->route('admin.product.indexByStore', ['store' => $store->id]);
    }
    public function editByStore(Product $product)
    {
        return view('admin.product.edit-product', compact('product'));
    }

    public function updateByStore(UpdateProductRequest $request,Product $product)
    {
        $validated = $request->validated();
        if (request()->hasFile('image')) {
            File::delete(public_path(env('PRODUCT_IMAGES_PATH').$product->image));
            $file = $request->file('image');
            $file_name = date("Y_m_d_h_i_s") . $file->getClientOriginalName();
            $file->move(public_path(env('PRODUCT_IMAGES_PATH')), $file_name);
            $validated['image'] = $file_name;
        }
        $product->update($validated);
        return redirect()->route('admin.product.indexByStore',['store' => $product->store_id]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
