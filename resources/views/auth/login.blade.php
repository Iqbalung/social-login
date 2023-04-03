<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <btncheck1 id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->

  

            <!-- <div class="flex items-center justify-end mt-4"> -->

                @if (Route::has('password.request'))

                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">

                        {{ __('Forgot your password?') }}

                    </a>

                @endif

            
                <div>
                <x-button class="mt-2">
                    {{ __('Login') }}
                </x-button>

                <a class="btn mt-5" href="{{ route('auth.github') }}"
                style="background: black; padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                Login with Github
                </a>

                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
