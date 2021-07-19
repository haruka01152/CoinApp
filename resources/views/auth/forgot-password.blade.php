<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            パスワードをお忘れの際は、ご登録頂いているメールアドレスを下記のフォームにご記入ください。
            新しいパスワードをお送りします。
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="メールアドレス" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-10">
                <div class="text-center">
                    <input type="submit" value="パスワードを再発行する" class="rounded-lg bg-green-300 text-white px-6 py-2 cursor-pointer">

                    <a class="block mt-5 underline text-sm text-gray-600 hover:text-gray-900" href="login">
                ログイン画面に戻る
            </a>
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>