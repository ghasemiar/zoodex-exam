<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function sellerProductsIndex()
    {

        $products = auth()->user()->store->products;
        return view('seller.product.index-product', compact('products'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if (isset($search)) {
            $products = Product::search($search)->paginate(9);
        }
        else{
            $products = ProductResource::collection(Product::paginate(9));
        }
        return view('index-product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.product.create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $store_id = auth()->user()->store->id;
        $validated = $request->validated();
        $validated['store_id'] = $store_id;
        if (request()->hasFile('image')) {
            $file = $request->file('image');
            $file_name = date("Y_m_d_h_i_s") . $file->getClientOriginalName();
            $file->move(public_path(env('PRODUCT_IMAGES_PATH')), $file_name);
            $validated['image'] = $file_name;
        }
        Product::create($validated);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('manage-product',$product);
        return view('seller.product.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('manage-product',$product);
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            File::delete(public_path(env('PRODUCT_IMAGES_PATH').$product->image));
            $file = $request->file('image');
            $file_name = date("Y_m_d_h_i_s") . $file->getClientOriginalName();
            $file->move(public_path(env('PRODUCT_IMAGES_PATH')), $file_name);
            $validated['image'] = $file_name;
        }
        $product->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('manage-product',$product);
        $product->delete();
    }
}
