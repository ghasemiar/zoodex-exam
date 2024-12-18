<x-app-layout>
    <div class="overflow-x-auto m-10 bg-white p-10 text-black">
         <x-custom-button type="submit" class="btn-primary"><a href="{{route('admin.user.create')}}">{{__('fa.create user')}}</a></x-custom-button>
        <div class="m-5"><table class="table table-zebra">
                <!-- head -->
                <thead>
                <tr class="text-black">
                    <th>{{__('fa.name')}}</th>
                    <th>{{__('fa.email')}}</th>
                    <th>{{__('fa.role')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>{{__('fa.'.$user->role->name) ?? __('fa.guest')}}</td>
                        <td class="flex gap-3 justify-end">
                            <form method="POST" action="{{route('admin.user.destroy',['user' => $user->id])}}">
                                @csrf
                                @method('DELETE')
                                <x-custom-button type="submit" class="btn-error">{{__('fa.delete')}}</x-custom-button>
                            </form>
                            <x-custom-button type="submit" class="btn-secondary"><a href="{{route('admin.user.edit',['user'=>$user->id])}}">{{__('fa.edit')}}</a> </x-custom-button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table></div>
    </div>
</x-app-layout>
