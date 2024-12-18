<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <label for="my-drawer" class="btn btn-primary drawer-button">{{__('fa.menu')}}</label>
    </div>
    <div class="drawer-side z-10">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
            <li><a href="{{route('admin.store.index')}}">{{__('fa.stores')}}</a></li>
            <li><a href="{{route('admin.user.index')}}">{{__('fa.users')}}</a></li>
        </ul>
    </div>
</div>
