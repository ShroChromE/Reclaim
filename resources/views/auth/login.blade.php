<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Reclaim</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen flex">

        <div class="hidden md:flex md:w-1/2 bg-gray-900 flex-col justify-center p-16">
            <div class="text-white font-bold tracking-widest mb-10">RECLAIM</div>
            <h1 class="text-4xl font-bold text-white mb-4">Kehilangan barang?</h1>
            <p class="text-gray-400">Laporkan dan temukan kembali barangmu</p>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="w-full max-w-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Masuk ke Akun</h2>

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="login" value="Email atau Username" />
                        <x-text-input id="login" class="block mt-1 w-full" type="text" name="login"
                            :value="old('login')" required autofocus
                            placeholder="Masukkan email atau username" />
                        <x-input-error :messages="$errors->get('login')" class="mt-2" />
                    </div>

                    <div class="mb-2">
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            required autocomplete="current-password" placeholder="Masukkan password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="text-right mb-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-orange-500 font-medium hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition">
                        Masuk
                    </button>

                    <p class="text-center text-sm text-gray-500 mt-4">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-orange-500 font-medium hover:underline">Daftar sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>