<x-app-layout>
    <div class="grid grid-cols-4 gap-5 p-5">
        @foreach($storeData->products as $product)
            <div class="card bg-base-100 shadow-xl">
                <figure>
                    <img
                        src="{{asset(env('PRODUCT_IMAGES_PATH').$product->image)}}"
                        alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $product->title }}</h2>
                    <p>{{ $product->description }}</p>
                    <form method="POST" action="{{route('admin.product.destroy',['product'=>$product->id])}}" class="card-actions justify-end">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error">{{__('fa.delete')}}</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
