<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
            <h2 class="text-center mt-4 bold">LOGIN PEMINJAM ALAT & BAHAN</h2>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <div class="block mt-4">
              <div class="row">
                <x-jet-button class="flex justify-center w-full btn-cyan-500">
                    {{ __('Masuk') }}
                </x-jet-button>
              </div>
          </div>

            <div class="flex items-center justify-center mt-4 mb-4">
                @if (Route::has('password.request'))
                    <a class=" text-sm text-sky-900 hover:text-gray-900" href="{{ route('password.request') }}">
                      Lupa Password?
                    </a>
                @endif
                
              </div>
              <hr>
              
              <div class="flex items-center justify-center mt-4 text-sm">
                Belum Mempunyai Akun? &nbsp;
                    <a class="underline text-sm text-blue-400 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Daftar Disini') }}
                    </a>

                
              </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>