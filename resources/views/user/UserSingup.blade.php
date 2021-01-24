<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('userRegister') }}">
            @csrf
            <div>
                <x-jet-label for="user_id" value="{{ __('User ID') }}" />
                <x-jet-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="old('name')"
                    required autofocus autocomplete="user_id" />
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>
            <div>
                <x-jet-label for="channel_name" value="{{ __('Channel Name') }}" />
                <x-jet-input id="channel_name" class="block mt-1 w-full" type="text" name="channel_name"
                    :value="old('name')" required autofocus />
            </div>
            <div>
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('name')" required
                    autofocus />
            </div>


            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>


            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user_login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        {{-- Show Succss Message  --}}
        @if (session('faild_msg'))
        <div class="text-red-500 bg-white py-4 text-center font-bold shadow-xl sm:rounded-lg mb-4">
            {{ session('faild_msg') }}
        </div>
        @endif
        @if (session('success_msg'))
        <div class="text-green-500 bg-white py-4 text-center font-bold shadow-xl sm:rounded-lg mb-4">
            {{ session('success_msg') }}
        </div>
        @endif
    </x-jet-authentication-card>
</x-guest-layout>
