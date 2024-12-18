<x-app-layout>
    <div class="overflow-x-auto m-10 bg-white p-10 text-black">
        <x-custom-button type="submit" class="btn-primary"><a href="{{route('admin.store.create')}}">{{__('fa.create store')}}</a></x-custom-button>
        <div class="m-5"><table class="table table-zebra">
                <!-- head -->
                <thead>
                <tr class="text-black">
                    <th>{{__('fa.name')}}</th>
                    <th>{{__('fa.status')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($stores as $store)
                    <tr>
                        <td>
                            {{$store->name}}
                        </td>
                        <td class="{{$store->is_approved ? 'text-green-500' : 'text-red-500'}}">{{$store->is_approved ? __('fa.approved') : __('fa.not approved')}}</td>
                        <td class="flex gap-3 justify-end">
                            <form method="POST" action="{{route('admin.store.destroy',['store' => $store->id])}}">
                                @csrf
                                @method('DELETE')
                                <x-custom-button type="submit" class="btn-error">{{__('fa.delete')}}</x-custom-button>
                            </form>
                            <x-custom-button type="submit" class="btn-secondary"><a href="{{route('admin.store.edit',['store' => $store->id])}}">{{__('fa.update store')}}</a> </x-custom-button>
                            <x-custom-button type="submit" class="btn-secondary"><a href="{{route('admin.product.indexByStore',['store' => $store->id])}}">{{__('fa.products')}}</a> </x-custom-button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table></div>
    </div>
</x-app-layout>
