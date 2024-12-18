<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card card-side bg-base-100 shadow-xl">
                    <figure>
                        <img
                            src="{{asset(env('STORE_IMAGES_PATH'). $store->logo)}}"
                            alt="Movie" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{__('fa.name')}} : {{$store->name}}</h2>
                        <p>{{__('fa.description')}} : {{$store->description}}</p>
                        <p>{{__('fa.address')}} : {{$store->address}}</p>
                        <span class="{{$store->is_approved? 'text-green-500':'text-red-500'}}">{{__('fa.status')}} : {{$store->is_approved?__('fa.approved'):__('fa.not approved')}}</span>
                        <div class="card-actions justify-end gap-5">
                            <a href="{{route('seller.product.index')}}" class="btn btn-primary">{{__('fa.products')}}</a>
                            <a href="{{route('seller.store.edit',['store' => $store->id])}}" class="btn btn-warning">{{__('fa.edit')}}</a>
                            <form method="POST" action="{{route('seller.store.destroy',['store'=> $store->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-error">{{__('fa.delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
