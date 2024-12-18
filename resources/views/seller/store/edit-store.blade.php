<x-app-layout>
    <div class="bg-gray-100 m-10 p-10 rounded-2xl">
        <form method="POST" action="{{ route('seller.store.update', ['store' => $store->id]) }}">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('fa.name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$store->name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('fa.address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$store->address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('fa.description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$store->description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('fa.update store') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-app-layout>
