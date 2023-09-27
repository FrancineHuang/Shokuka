<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>食華 - 本場の中華レシピを作ろう</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="中国人が作る本場中華料理のレシピシェアサービス。本場中華を作りたいならココ！作り方検索できる。本場中華料理が大好きな人は自分のレシピを作成し、公開できる。">
    <meta name="keywords" content="食華,Shokuka,しょくか,本場中華,中華料理,中国料理,中華レシピ,レシピサービス,ChineseFood,Recipe">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!--＊＊＊　共通Headerはここから　＊＊＊-->
    <header>

      <nav class="bg-red-800 border-gray-200 flex items-center h-16 px-2 sm:px-4 py-2.5">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('index') }}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Shokuka</span>
        </a>
        @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white bg-red-800 border-neutral-50 hover:bg-white hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-neutral-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-5 md:mr-4">マイページ</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white bg-red-800 border-neutral-50 hover:bg-white hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-neutral-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-5 md:mr-4">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white bg-red-800 border-neutral-50 hover:bg-white hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-neutral-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-5 md:mr-4">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        </div>
      </nav>
      
    </header>
    <!--＊＊＊　共通Headerはここまで　＊＊＊-->

    <main>
    <!--Mainvisualはここから-->
      <div class="relative flex flex-col-reverse pt-16 lg:py-0 lg:flex-col">
        <div class="w-full max-w-xl px-4 mx-auto md:px-0 lg:px-8 lg:py-20 lg:max-w-screen-xl">
          <div class="mb-0 lg:max-w-lg lg:pr-8 xl:pr-6">
            <h2 class="mb-5 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none md:text-center">
              Share Your<br class="hidden md:block" />
              Chinese Cooking Recipes
            </h2>
            <p class="mb-5 text-base text-gray-700 md:text-lg md:text-center">
              たまに刺激的な料理を食べたくなる<br>
              たまに本場の中華料理を作りたくなる<br>
              たまに食卓に新しい色をつけたくなる<br>
              さあ、あなたの食卓を、本場中華の色へ
            </p>
            <div class="mb-10 text-center md:mb-16 lg:mb-20">
              <a
                href="{{ route('index') }}"
                class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md md:w-auto bg-red-800 hover:bg-red-700 focus:shadow-outline focus:outline-none"
              >
                もっと見る
              </a>
            </div>
            <div class="flex flex-col items-center">
              <div class="mb-2 text-sm text-gray-600 md:mb-2">Follow us</div>
              <div class="flex items-center space-x-4">
                <div class="flex items-center">
                  <a href="/" class="text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                      <path
                        d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
                      ></path>
                    </svg>
                  </a>
                </div>
                <div class="flex items-center">
                  <a href="/" class="text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                      <circle cx="15" cy="15" r="4"></circle>
                      <path
                        d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
                      ></path>
                    </svg>
                  </a>
                </div>
                <div class="flex items-center">
                  <a href="/" class="text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                      <path
                        d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                      ></path>
                    </svg>
                  </a>
                </div>
                <div class="flex items-center">
                  <a href="/" class="text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-6">
                      <path
                        d="M23.8,7.2c0,0-0.2-1.7-1-2.4c-0.9-1-1.9-1-2.4-1C17,3.6,12,3.6,12,3.6h0c0,0-5,0-8.4,0.2 c-0.5,0.1-1.5,0.1-2.4,1c-0.7,0.7-1,2.4-1,2.4S0,9.1,0,11.1v1.8c0,1.9,0.2,3.9,0.2,3.9s0.2,1.7,1,2.4c0.9,1,2.1,0.9,2.6,1 c1.9,0.2,8.2,0.2,8.2,0.2s5,0,8.4-0.3c0.5-0.1,1.5-0.1,2.4-1c0.7-0.7,1-2.4,1-2.4s0.2-1.9,0.2-3.9v-1.8C24,9.1,23.8,7.2,23.8,7.2z M9.5,15.1l0-6.7l6.5,3.4L9.5,15.1z"
                      ></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="inset-y-0 top-0 right-0 w-full max-w-xl px-4 mx-auto mb-6 md:px-0 lg:pl-8 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-1/2 lg:max-w-full lg:absolute xl:px-0">
          <img
            class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full"
            src="https://images.unsplash.com/photo-1603092872173-a162b667afc6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=832&q=80"
            alt=""
          />
        </div>
      </div>

    <!--Mainvisualはここまで-->

    <!--section #aboutはここから-->

<section class="bg-white">
  <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
    <section
      class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6"
    >
      <img
        alt="Night"
        src="https://images.unsplash.com/photo-1609570324378-ec0c4c9b6ba8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
        class="absolute inset-0 h-full w-full object-cover opacity-80"
      />

      <div class="hidden lg:relative lg:block lg:p-12">
        <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
          食華とは？
        </h2>

        <p class="mt-4 leading-relaxed text-white/90">
          什么是「食华」？
        </p>
      </div>
    </section>

    <main
      aria-label="Main"
      class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6"
    >


        <div class="mb-0 lg:max-w-lg lg:pr-8 xl:pr-6">
          <p class="mb-5 leading-relaxed text-base text-gray-700 md:text-lg md:text-center">
            「食華」は、<br>
            本場中華料理のレシピをかんたんに作成し、<br>
            シェアできるサービスです。<br>
            日本のスーパーで<br>
            手軽に買える食材や調味料を手に入れ、<br>
            日本にいる中華系の人でも、<br>
            中華料理に興味を持っている人でも<br>
            手軽に本場アレンジできます。
          </p>

      </div>
    </main>
  </div>
</section>

    <!--section #aboutはここまで-->
    </main>

    <!--＊＊＊共通Footerはここから＊＊＊-->
    <footer class="bg-red-800">
        <div class="mx-auto flex w-full max-w-7xl flex-col items-center px-4 py-12 sm:items-start">
          <div class="text-neutral-50 text-2xl">
            <a href="{{ route('welcome') }}">Shokuka</a>
          </div>
          <nav class="mt-6 flex items-center space-x-3">
            <a href="https://twitter.com/Francine_webdev" class="rounded-lg bg-gray-100 p-1 text-gray-500 transition hover:bg-gray-200">
              <svg class="h-6 w-6" viewBox="0 0 512 512">
                <path
                  fill="currentColor"
                  d="M437 152a72 72 0 01-40 12a72 72 0 0032-40a72 72 0 01-45 17a72 72 0 00-122 65a200 200 0 01-145-74a72 72 0 0022 94a72 72 0 01-32-7a72 72 0 0056 69a72 72 0 01-32 1a72 72 0 0067 50a200 200 0 01-105 29a200 200 0 00309-179a200 200 0 0035-37" />
              </svg>
            </a>
            <a href="#" class="rounded-lg bg-gray-100 p-1 text-gray-500 transition hover:bg-gray-200">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 512 512">
                <circle cx="142" cy="138" r="37" />
                <path stroke="currentColor" stroke-width="66" d="M244 194v198M142 194v198" />
                <path d="M276 282c0-20 13-40 36-40 24 0 33 18 33 45v105h66V279c0-61-32-89-76-89-34 0-51 19-59 32" />
              </svg>
            </a>
          </nav>
          <nav
            class="mt-12 flex w-full flex-col-reverse items-center justify-between space-y-4 space-y-reverse text-xs font-medium text-neutral-50 sm:flex-row sm:space-y-0">
            <p>© 2023 Francine Huang All Rights Reserved.</p>
            <p>
              <a href="#" class="hover:underline">お問い合わせ</a>
            </p>
          </nav>
        </div>
      </footer>
      <!--＊＊＊共通Footerはここまで＊＊＊-->
</body>
</html>