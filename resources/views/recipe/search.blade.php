<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>食華 - 本場の中華料理を探そう</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="中国人が作る本場中華料理のレシピシェアサービス。本場中華を作りたいならココ！作り方検索できる。本場中華料理が大好きな人は自分のレシピを作成し、公開できる。">
    <meta name="keywords" content="食華,Shokuka,しょくか,本場中華,中華料理,中国料理,中華レシピ,レシピサービス,ChineseFood,Recipe">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</head>

<body>
    <!--＊＊＊　共通Headerはここから　＊＊＊-->
    <header class="fixed max-w-full top-0 left-0 right-0">
      <nav class="bg-red-800 border-gray-200 px-2 sm:px-4 py-2.5">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="https://flowbite.com/" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-neutral-50">Shokuka</span>
        </a>

        <div class="flex items-center md:order-3">
          <button type="button" class="text-white bg-red-800 border-neutral-50 hover:bg-white hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-neutral-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-5 md:mr-4">投稿する</button>
            <button type="button" class="flex mr-3 text-sm bg-neutral-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/474x/a0/7c/4f/a07c4f179663ea3e663cdac4a7534b6b.jpg" alt="user photo">
            </button>
            
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-neutral-100 rounded-lg shadow" id="user-dropdown">
              <div class="px-4 py-3">
                <span class="block text-sm text-neutral-900">Bonnie Green</span>
                <span class="block text-sm font-medium text-neutral-500 truncate">name@flowbite.com</span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-100">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-100">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-100">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-100">Sign out</a>
                </li>
              </ul>
            </div>
            
            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-neutral-500 rounded-lg md:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200" aria-controls="mobile-menu-2" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

          <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <form class="flex items-center">   
              <label for="voice-search" class="sr-only">Search</label>
              <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-neutral-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
              <input type="text" id="search" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-neutral-500 focus:border-red-500 block w-full pl-10 p-2.5" placeholder="サイト内で検索" required>
              </div>
              <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-red-800 bg-neutral-50 rounded-lg border border-red-700 hover:text-red-600 focus:ring-4 focus:outline-none focus:ring-red-300">
                <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search
              </button>
              </form>
          </div>
        </div>
      </nav>
    </header>
    <!--＊＊＊　共通Headerはここまで　＊＊＊-->

    <!--Mainはここから-->
    <main>
      <!--セクションタイトルはここから-->
      <div class="container px-5 pt-24 pb-8 mx-auto flex flex-wrap w-full mb-3 mt-16">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
          <p class="sm:text-2xl text-2xl font-medium title-font mb-2 text-neutral-900">「キーワード」を含まれているレシピ：100件</p>
          <div class="h-1 w-20 bg-red-800 rounded ml-9"></div>
        </div>
      </div>
      <!--セクションタイトルはここまで-->

      <!--検索結果のカードはここから-->
      <!--バックエンド側のロジックを追加してください-->
      <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
          <div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm">
            <img src="https://i.pinimg.com/564x/07/fc/15/07fc15fe60f7b2bade7ae6f3a8d29012.jpg" class="object-cover w-full h-64" alt="" />
            <div class="p-5 border border-t-0">
              <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                <a href="/" class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700" aria-label="Category" title="traveling">Uncle Roger</a>
                <span class="text-gray-600">— 28 Dec 2020</span>
              </p>
              <a href="/" aria-label="Category" title="Visit the East" class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">本格中華チャーハン</a>
              <p class="mb-2 text-gray-700">
                Sed ut perspiciatis unde omnis iste natus error sit sed quia consequuntur magni voluptatem doloremque.
              </p>
              <a href="/" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">詳しくみる</a>
            </div>
          </div>
          <div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm">
            <img src="https://i.pinimg.com/564x/32/f1/04/32f1040d86f3f379a737ff7e3ce26648.jpg" class="object-cover w-full h-64" alt="" />
            <div class="p-5 border border-t-0">
              <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                <a href="/" class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700" aria-label="Category" title="traveling">Auntie Hersha</a>
                <span class="text-gray-600">— 28 Dec 2020</span>
              </p>
              <a href="/" aria-label="Category" title="Simple is better" class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">中華野菜と肉の炒め</a>
              <p class="mb-2 text-gray-700">
                Sed ut perspiciatis unde omnis iste natus error sit sed quia consequuntur magni voluptatem doloremque.
              </p>
              <a href="/" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">詳しくみる</a>
            </div>
          </div>
          <div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm">
            <img src="https://i.pinimg.com/564x/51/48/a5/5148a50942a0be90fecb6c7556f1df7e.jpg" class="object-cover w-full h-64" alt="" />
            <div class="p-5 border border-t-0">
              <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                <a href="/" class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700" aria-label="Category" title="traveling">四川激辛主婦</a>
                <span class="text-gray-600">— 28 Dec 2020</span>
              </p>
              <a href="/" aria-label="Category" title="Film It!" class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">本格！四川風マーポー豆腐</a>
              <p class="mb-2 text-gray-700">
                Sed ut perspiciatis unde omnis iste natus error sit sed quia consequuntur magni voluptatem doloremque.
              </p>
              <a href="/" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">詳しくみる</a>
            </div>
          </div>
        </div>
      </div>
      <!--検索結果のカードはここまで-->

      <!--ページ数の表示はここから-->
      <!--バックエンド側のロジックを追加してください-->
        <nav aria-label="Page navigation example" class="grid place-items-center pb-20">
          <ul class="inline-flex items-center -space-x-px">
            <li>
              <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                <span class="sr-only">Previous</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
              </a>
            </li>
            <li>
              <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
            </li>
            <li>
              <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
            </li>
            <!--選択されたページを赤色の背景に強調する。条件文の追加が必要-->
            <li>
              <a href="#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-red-600 border border-red-300 bg-red-50 hover:bg-red-100 hover:text-red-700">3</a>
            </li>
            <!--選択されたページを赤色の背景に強調する。条件文の追加が必要-->
            <li>
              <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">4</a>
            </li>
            <li>
              <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">5</a>
            </li>
            <li>
              <a href="#" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                <span class="sr-only">Next</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
              </a>
            </li>
          </ul>
        </nav>
      <!--ページ数の表示はここまで-->
      
    </main>
    <!--Mainはここまで-->

    <!--＊＊＊共通Footerはここから＊＊＊-->
    <footer class="bg-red-800">
      <div class="mx-auto flex w-full max-w-7xl flex-col items-center px-4 py-12 sm:items-start">
        <div class="text-neutral-50 text-2xl">
          <a href="#">Shokuka</a>
        </div>
        <nav class="mt-6 flex items-center space-x-3">
          <a href="#" class="rounded-lg bg-gray-100 p-1 text-gray-500 transition hover:bg-gray-200">
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