@if (session()->has( 'password' ) && session()->has( 'user_id' ) )
<script>
    window.location = "/today_promote";
</script>
@endif

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('user_login') }}">
            @csrf
            <div>
                <x-jet-label for="user_id" value="{{ __('User ID') }}" />
                <x-jet-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user_register') }}">
                    {{ __('Registered') }}
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
        @if (session('fail_msg'))
        <div class="text-red-500 bg-white py-4 text-center font-bold shadow-xl sm:rounded-lg mb-4">
            {{ session('fail_msg') }}
        </div>
        @endif
    </x-jet-authentication-card>

</x-guest-layout>
