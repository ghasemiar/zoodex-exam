<x-app-layout>
    <div class="mx-[10%] my-5">
    <div>
        <div class="divider my-10">{{$store->name}}</div>
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div>
                <h3 class="text-lg">{{__('fa.Description')}}</h3>
                <p>{{$store->description}}</p>
            </div>
            <div>
                <h3 class="text-lg">{{__('fa.Address')}}</h3>
                <p>{{$store->address}}</p>
            </div>
        </div>
    </div>
    <div class="grid xl:grid-cols-4 lg:grid-cols-3 grid-cols-1 md:grid-cols-2 gap-5 mt-5">
        @foreach($store->products as $product)
            <div class="card bg-base-100 shadow-xl">
                <figure>
                    <img
                        src="{{asset(env('PRODUCT_IMAGES_PATH').$product->image)}}"
                        alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $product->title }}</h2>
                    <p>{{ $product->description }}</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">{{__('fa.see more')}}</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</x-app-layout>
