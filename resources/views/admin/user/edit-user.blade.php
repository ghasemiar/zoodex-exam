<x-app-layout>
    <div class="bg-gray-100 m-10 p-10 rounded-2xl">
        <form method="POST" action="{{ route('admin.user.update',['user'=>$user->id]) }}">
            @csrf
            @method('PATCH')
            <div>
                <x-input-label for="name" :value="__('auth.Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('auth.Email')" />

                <x-text-input id="email" class="block mt-1 w-full"
                              type="text"
                              name="email"
                              :value="$user->email"
                              required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="password" :value="__('auth.Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                              type="text"
                              name="password"
                               />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="role" :value="__('auth.Password')" />
                <select name="role_id" id="role" class="select select-bordered block mt-1 w-full">
                    <option value="">{{__('user.empty')}}</option>
                    @foreach(\App\Models\Role::all() as $role)
                        <option selected="{{$user->role->id == $role->id ?? 'selected'}}" value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('auth.update user') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
