<x-guest-layout>
    <div class="bg-gray-100 m-10 p-10 rounded-2xl">
        <form method="POST" action="{{ route('admin.store.store') }}">
            @csrf
            <div>
                <x-input-label for="name" :value="__('fa.name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="address" :value="__('fa.address')" />

                <x-text-input id="address" class="block mt-1 w-full"
                              type="text"
                              name="address"
                              required />

                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="description" :value="__('fa.description')" />

                <x-text-input id="description" class="block mt-1 w-full"
                              type="text"
                              name="description"
                              required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="user" :value="__('fa.user')" />
                <select name="user_id" id="user" class="select select-bordered block mt-1 w-full">
                    <option value="">{{__('fa.empty')}}</option>
                    @foreach($sellers as $seller)
                        <option value="{{$seller->id}}">{{$seller->name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user')" class="mt-2" />
            </div>
            <div class="mt-4 flex gap-5">
                <x-text-input type="checkbox" class="" id="is_approved" name="is_approved" />
                <x-input-label for="is_approved" :value="__('fa.is_approved')" />
                <x-input-error :messages="$errors->get('is_approved')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('fa.create store') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
