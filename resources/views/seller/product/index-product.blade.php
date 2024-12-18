<x-app-layout>
    <a class="btn btn-accent m-5" href="{{route('seller.product.create')}}">{{__('fa.create product')}}</a>
    <div class="grid grid-cols-4 gap-5 p-5">
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
                </div>
                <div class="card-actions justify-end m-4 gap-5">
                    <a href="{{route('seller.product.edit',['product' => $product->id])}}" class="btn btn-warning">{{__('fa.edit')}}</a>
                    <form method="POST" action="{{route('seller.product.destroy',['product'=> $product->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error">{{__('fa.delete')}}</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
