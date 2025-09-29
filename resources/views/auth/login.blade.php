<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#144F5F] to-[#73BA7D]">
        <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm px-6">
            @csrf

            <!-- Judul -->
            <h1 class="text-3xl font-bold text-center text-white mb-2">Login</h1>
            <p class="text-center text-white/80 mb-6">Silakan masuk untuk melanjutkan</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <x-text-input id="email" class="block mt-1 w-full rounded-md border-0 text-gray-900"
                    type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-200" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-white" />
                <x-text-input id="password" class="block mt-1 w-full rounded-md border-0 text-gray-900"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-200" />
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-[#144F5F] shadow-sm focus:ring-[#73BA7D]"
                        name="remember">
                    <span class="ms-2 text-sm text-white/90">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white hover:text-gray-200"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Tombol Login -->
            <button type="submit"
                class="mt-6 w-full py-2 rounded-lg font-semibold text-white bg-white/20 hover:bg-white/30 backdrop-blur-sm transition">
                {{ __('Log in') }}
            </button>

            <!-- Register -->
            @if (Route::has('register'))
                <p class="mt-6 text-center text-sm text-white/90">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-semibold underline">
                        Daftar Sekarang
                    </a>
                </p>
            @endif
        </form>
    </div>
</x-guest-layout>
