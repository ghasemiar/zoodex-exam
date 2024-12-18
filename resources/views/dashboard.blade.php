<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('fa.Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('is-seller')
                        @cannot('have-store')
                        <div class="flex justify-between">
                            <span>{{__('fa.you are logged in')}}</span>
                            <a href="{{route('seller.store.create')}}" class="btn btn-secondary">{{__('fa.Create')}}</a>
                        </div>
                        @endcannot
                        @can('have-store')
                            @include('seller.seller-index')
                        @endcan
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
