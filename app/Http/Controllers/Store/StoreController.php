<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\CreateStoreRequest;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Http\Resources\StoreResource;
use App\Http\Resources\StoreResourceCollection;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('active.store')->only('edit', 'update', 'destroy');
        $this->middleware('do.not.have.store')->only('create', 'store');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        logger('User Role:', ['role' => $user->role ? $user->role->name : 'No Role']);

        $this->authorize('is-seller');
        $stores = StoreResource::collection(Store::paginate(12));
        return view('index-store',compact('stores'));
    }

    public function create()
    {
        return view('seller.store.create-store');
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
        auth()->user()->store()->create($validated);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        $store = new StoreResource($store);
        return view('show-store', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        $this->authorize('manage-store',$store);
        return view('seller.store.edit-store', compact('store'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $this->authorize('manage-store',$store);
        $validated = $request->validated();
        if (request()->hasFile('logo')) {
            File::delete(public_path(env('STORE_IMAGES_PATH').$store->logo));
            $file = $request->file('logo');
            $file_name = date("Y_m_d_h_i_s") . $file->getClientOriginalName();
            $file->move(public_path(env('STORE_IMAGES_PATH')), $file_name);
            $validated['logo'] = $file_name;
        }
        $store->update($validated);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $this->authorize('manage-store',$store);
        $store->delete();
        return redirect('/dashboard');
    }
}
