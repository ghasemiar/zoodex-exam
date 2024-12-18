<x-app-layout>
    <div class="mx-[10%] my-5">
        <div>
            <div class="divider my-10">{{__('fa.Stores')}}</div>
            <div class="grid xl:grid-cols-4 lg:grid-cols-3 grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($stores as $store)
                    <div class="card bg-base-100 shadow-xl">
                        <figure>
                            <img
                                src="{{asset(env('STORE_IMAGES_PATH').$store->logo)}}"
                                alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $store->name }}</h2>
                            <p>{{ $store->description }}</p>
                            <div class="card-actions justify-end">
                                <a class="btn btn-primary">{{__('fa.see more')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $stores->links('vendor.pagination.tailwind') }}
    </div>
</x-app-layout>
