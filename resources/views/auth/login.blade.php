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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="メールアドレス" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="パスワード" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">次回入力を省略する</span>
                </label>
            </div>

            <div class="mt-8">
                <div class="text-center">
                <input type="submit" value="ログイン" class="rounded-lg bg-green-300 text-white px-6 py-2 cursor-pointer">
                </div>

                <a class="block mt-5 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        新規登録はこちらから
                    </a>
                @if (Route::has('password.request'))
                    <a class="block mt-5 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        パスワードをお忘れですか？
                    </a>
                @endif
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
