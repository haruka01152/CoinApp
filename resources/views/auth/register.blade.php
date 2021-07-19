<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="ニックネーム" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="メールアドレス" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="パスワード" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="パスワード確認" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

                

                <div class="mt-10">
                <div class="text-center">
                    <input type="submit" value="新規登録" class="rounded-lg bg-green-300 text-white px-6 py-2 cursor-pointer">

                    <a class="block mt-5 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    アカウントをお持ちの方はこちら
                </a>
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
