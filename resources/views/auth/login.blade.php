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
                <x-button class="mt-2 mr-2">
                    {{ __('Login') }}
                </x-button> <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">

{{ __('Or Register') }}

</a>

            <div>
            
                <a class="btn mt-2" href="{{ route('auth.github') }}"
                style="background: black; padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff; possition: flex;">
                Login with Github
                </a> 

                 <a class="btn mt-2" href="{{ route('auth.tiktok') }}"
                style="background: black; padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff; possition: flex;">
                Login with Tiktok
                </a>

                <a class="btn mt-2" href="{{ url('auth/google') }}"
                style="background: black; padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff; possition: flex;">
                Login with Google
                </a>

                

                <!-- <a href='{SERVER_ENDPOINT_OAUTH}'>Continue with TikTok</a> -->
        </div>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
