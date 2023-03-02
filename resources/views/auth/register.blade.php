<x-header-footer-login>
    <section class="bg-white z-0">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img
                alt="Pattern"
                src="https://images.unsplash.com/photo-1572141619956-3af324e62ddc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
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
                    
                    <form method="POST" action="{{route('register')}}" class="mt-8 grid grid-cols-6 gap-6">
                    @csrf
                        <!-- Username -->
                        <div class="col-span-6 sm:col-span-3">
                            <label
                            for="username" :value="__('Username')"
                            class="block text-sm font-medium text-gray-700">
                                ユーザーネーム
                            </label>
                            
                            <input
                            id="username" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                            type="text" name="username" :value="old('username')" required autofocus />

                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <!-- Nickname -->
                        <div class="col-span-6 sm:col-span-3">
                            <label
                            for="nickname" :value="__('Nickname')"
                            class="block text-sm font-medium text-gray-700">
                            ニックネーム
                            </label>
                        
                            <input
                            id="nickname" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                            type="text" name="nickname" :value="old('nickname')" required autofocus />

                            <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
                        </div>
                        
                        <!-- Email Address -->
                        <div class="col-span-6">
                            <label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700">
                            メールアドレス
                            </label>

                            <input
                            id="email" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" 
                            type="email" name="email" :value="old('email')" required/>

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        
                        <!-- Password -->
                        <div class="col-span-6 sm:col-span-3">
                            <label
                            for="password" :value="__('Password')" 
                            class="block text-sm font-medium text-gray-700">
                            パスワード
                            </label>
                            
                            <input
                            id="password" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        
                        <!-- Password Confirmation -->
                        <div class="col-span-6 sm:col-span-3">
                            <label
                            for="password_confirmation" :value="__('Confirm Password')"
                            class="block text-sm font-medium text-gray-700">
                            パスワードを再入力
                            </label>
                            
                            <input
                            id="password_confirmation" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                            type="password"
                            name="password_confirmation" required/>

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                      </div>
                    
                      <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                        <button
                          class="inline-block shrink-0 rounded-md border border-red-800 bg-red-800 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-red-800 focus:outline-none focus:ring active:text-red-600"
                        >
                            {{ __('Register') }}
                        </button>
                      
                        <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                          既にユーザー登録済み方は
                          <a href="{{route('login')}}" class="text-gray-700 underline">こちらへ</a>
                        </p>
                      </div>
                    </form>
                  </div>
              </div>
        </div>
    </section>

<?php /* 
    <form method="POST" action="{{ route('register') }}">
        @csrf



        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="Nickname" :value="__('Nickname')" />
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" required autofocus />
            <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
*/ ?>
</x-header-footer-login>
