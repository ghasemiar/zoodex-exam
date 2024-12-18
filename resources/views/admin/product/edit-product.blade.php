<x-guest-layout>
    <div class="bg-gray-100 m-10 p-10 rounded-2xl">
        <form method="POST" action="{{ route('admin.product.updateByStore',['product'=> $product->id]) }} " enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <x-input-label for="title" :value="__('fa.title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$product->title" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('fa.description')" />

            <x-text-input id="description" class="block mt-1 w-full"
                          type="text"
                          name="description"
                          :value="$product->description"
                          required />

            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="quantity" :value="__('fa.quantity')" />
            <x-text-input id="quantity" class="block mt-1 w-full"
                          type="number"
                          :value="$product->quantity"
                          name="quantity"
                          required />
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="price" :value="__('fa.price')" />
            <x-text-input id="price" class="block mt-1 w-full"
                          type="number"
                          :value="$product->price"
                          name="price"
                          required />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="image" :value="__('fa.image')" />
            <x-text-input id="image" class="block mt-1 w-full"
                          type="file"
                          name="image"/>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('fa.update product') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-guest-layout>
