<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('fa.Seller Account') }}
        </h2>
    </header>
        <form method="POST" action="{{ route('profile.seller') }}">
            @csrf
                <x-primary-button>{{ __('fa.Seller Request') }}</x-primary-button>
        </form>
</section>
