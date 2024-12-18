<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\Admin\CreateStoreRequest;
use App\Http\Requests\Store\Admin\UpdateStoreRequest;
use App\Http\Resources\StoreResource;
use App\Models\Role;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AdminStoreController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = StoreResource::collection(Store::all());
        return view('admin.store.index-store', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sellerRole = Role::where('name', 'seller')->first();
        $sellers = User::where('role_id', $sellerRole->id)
            ->doesntHave('store')
            ->get();
        return view('admin.store.create-store',compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStoreRequest $request)
    {
        $validated = $request->validated();
        if (request()->hasFile('logo')) {
            $file = $request->file('logo');
            $file_name = date("Y_m_d_h_i_s") . $file->getClientOriginalName();
            $file->move(public_path(env('STORE_IMAGES_PATH')), $file_name);
            $validated['logo'] = $file_name;
        }
        Store::create($validated);
        return redirect('/admin/store');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('admin.store.edit-store', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $validated = $request->validated();
        if (request()->hasFile('logo')) {
            File::delete(public_path(env('STORE_IMAGES_PATH').$store->logo));
            $file = $request->file('logo');
            $file_name = date("Y_m_d_h_i_s") . $file->getClientOriginalName();
            $file->move(public_path(env('STORE_IMAGES_PATH')), $file_name);
            $validated['logo'] = $file_name;
        }
        $store->update($validated->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return back();
    }
}
