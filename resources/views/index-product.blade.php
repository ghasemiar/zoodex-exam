<x-app-layout>
    <div class="mx-[10%] my-5">
        <form action="">
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="search" :value="request('search')" required autofocus />
            <x-primary-button class="ms-3">
            {{ __('fa.search') }}
            </x-primary-button>
        </form>
        <div>
            <div class="divider my-10">{{__('fa.Products')}}</div>
            <div class="grid xl:grid-cols-4 lg:grid-cols-3 grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($products as $product)
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
        {{ $products->links('vendor.pagination.tailwind') }}
    </div>
</x-app-layout>
