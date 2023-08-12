<x-header-footer-login>
    <section class="bg-white z-0">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img
                alt="Pattern"
                src="https://images.unsplash.com/photo-1603093058783-9e68b22e06fc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                class="absolute inset-0 h-full w-full object-cover"/>
            </aside>
            
            <div
            aria-label="Main"
            class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    
                    <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                        Welcome to Shokuka 🥘
                    </h1>
                    
                    <p class="mt-4 leading-relaxed text-gray-500">
                        本格中華料理を楽しみにしましょう。
                    </p>
                    
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <x-alert :alert="$error"></x-alert>
                        @endforeach
                    @endif

                    <form method="POST" action="{{route('login')}}" class="mt-8 grid grid-cols-4 gap-6">
                    @csrf
                    <div class="my-4 col-span-4 sm:col-span-3">
                        
                        <!-- Email or Username(*in progress*) login method -->
                        <div class="my-4 col-span-4">
                            <label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700">
                            <span class="font-bold">ユーザーネーム</span> または <span class="font-bold">メールアドレス</span>
                            </label>
                            
                            <input
                            id="email_or_username" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                            type="text" name="email_or_username" :value="old('email_or_username')" required autofocus/>
                        </div>
                        
                        <!-- Password -->
                        <div class="my-4 col-span-4 sm:col-span-3">
                            <label
                            for="password" :value="__('Password')"
                            class="block text-sm font-medium text-gray-700">
                            パスワード
                            </label>
                            
                            <input
                            id="password" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password"/>
                        </div>
                    
                        <!-- Remember Me -->
                        <div class="my-4 col-span-4">
                            <label for="remember_me" class="flex gap-4">
                                <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="h-5 w-5 rounded-md border-gray-200 bg-white shadow-sm"/>
                            
                                <span class="text-sm text-gray-700">
                                ユーザー情報を保存する
                                </span>
                            </label>
                        </div>
                        
                        <div class="my-4 col-span-4 sm:flex sm:items-center sm:gap-4">
                            <button
                            class="inline-block shrink-0 rounded-md border border-red-800 bg-red-800 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-red-800 focus:outline-none focus:ring active:text-red-600">
                            {{ __('Log in') }}
                            </button>
                            
                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                            パスワードを忘れた場合は
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-gray-700 underline">こちら</a>
                            @endif
                            </p>
                        </div>
                    </form>

                    </div>
                </div>
        </div>
    </section>
</x-header-footer-login>

<?php /*
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

*/ ?>
