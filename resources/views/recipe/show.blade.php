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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <!-- ● カード1：レシピ全体の表示部分-->
      <div class="flex justify-center">
        <div class="w-9/12 mt-36 mb-8 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
      <!--　ユーザーのニックネームとアイコン　-->
          <div class="flex flex-row py-3">
            <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/474x/a0/7c/4f/a07c4f179663ea3e663cdac4a7534b6b.jpg" alt="user photo">
            <p class="pt-2 px-3 text-xs text-neutral-700 font-bold">UserNickName</p>
          </div>
      <!--　レシピのタイトルといいねボタン（ハート）　-->
          <div class="flex flex-row py-3">
            <h5 class="mb-2 text-2xl font-bold text-neutral-900">レシピタイトルレシピタイトル</h5>
            <!-- 「いいね」をした場合はfa-solidで書き換える（ここに後で実装）-->
            <i class="fa-regular fa-heart text-red-800 px-3 py-1"></i>
          </div>
      <!--　レシピのカバー写真と作成・更新日　-->
          <div class="flex flex-row">
            <div class="mb-8 flex items-center justify-center max-w-4xl max-h-96 lg:max-w-lg md:w-1/2 w-5/6 md:mb-0">
              <img class="object-cover object-center rounded" src="https://placehold.jp/800x600.png">
            </div>
            <div class="flex flex-col-reverse text-xs text-neutral-600 px-5">
              <p>レシピ公開日：2023/1/1</p>
              <p>レシピ更新日：2023/1/1</p>
            </div>
          </div>
      <!--　レシピの紹介文　-->
          <div class="flex flex-col py-3">
            <i class="fa-solid fa-quote-left text-red-800 text-1xl py-3"></i> <!-- left quote -->
            <p class="flex items-center justify-center text-base text-neutral-900 py-1 max-w-4xl">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
            <i class="fa-solid fa-quote-right text-red-800 text-1xl py-3 text-right"></i> <!-- right quote -->
          </div>
      <!--　レシピの材料リスト　-->
          <div class="py-3">
            <h5 class="mb-2 text-1xl font-bold text-neutral-900">
              <span class="text-2xl text-red-800 px-2"><i class="fa-solid fa-pepper-hot"></i></span>
              材料
            </h5>
              <dl class="w-8/12">
                <div class="flex flex-row w-full border-b-2 border-neutral-100 border-opacity-100 py-4">
                <dt class="text-neutral-800">テキストテキスト</dt>
                <dd class="text-neutral-800 text-right font-semibold pl-8">1個</dd>
                </div>
                <div class="flex flex-row w-full border-b-2 border-neutral-100 border-opacity-100 py-4">
                  <dt class="text-neutral-800">テキストテキスト</dt>
                  <dd class="text-neutral-800 text-right font-semibold pl-8">300g</dd>
                </div>
                <div class="flex flex-row w-full border-b-2 border-neutral-100 border-opacity-100 py-4">
                  <dt class="text-neutral-800">テキストテキスト</dt>
                  <dd class="text-neutral-800 text-right font-semibold pl-8">大さじ1</dd>
                </div>
              </dl>
          </div>
      <!--　レシピのステップリスト　-->
          <div class="pt-8 pb-4">
            <h5 class="mb-2 text-1xl font-bold text-neutral-900">
              <span class="text-2xl text-red-800 px-2"><i class="fa-solid fa-list-ol"></i></span>
              作り方・ステップ
            </h5>
            <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
              <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <p class="sm:text-xl text-base font-bold mb-4 text-red-800">Step 1 </p>
                <p class="w-full my-2 text-gray-900 text-sm block">
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                </p>
              </div>
              <div class="lg:max-w-md lg:w-2/12 md:w-1/3 w-1/4">
                <a href="#"><img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600"></a>
              </div>
            </div>
          </div>
      <!--　レシピのコツ・ポイント　-->
          <div class="py-4">
            <h5 class="mb-2 text-1xl font-bold text-neutral-900">
              <span class="text-2xl text-red-800 px-2"><i class="fa-solid fa-pen-fancy"></i></span>
              コツ・ポイント
            </h5>
            <p class="flex items-center justify-center text-base text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
              テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
          </div>
        </div>
      </div>

    <!-- ● カード2：レシピのコメント部分-->
    <div class="flex justify-center">
      <div class="w-9/12 mt-8 mb-36 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
    <!--　セクションタイトル　-->
        <div class="flex flex-row py-3">
          <h5 class="text-2xl font-bold text-neutral-900">コメント<span class="text-red-800">(1)</span></h5>
        </div>
    <!--　ユーザーアイコン・ニックネーム・コメントの日時　-->
        <div class="flex flex-col">
          <div class="flex flex-row py-3">
            <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/564x/af/66/f6/af66f6f05298dacf38f7badfc176080b.jpg" alt="user photo">
            <p class="pt-2 px-3 text-xs text-neutral-700">UserNickName</p>
            <p class="pt-2 px-3 text-xs text-neutral-400">2023年1月1日</p>
          </div>
          <p class="flex items-center justify-center text-base text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </p>
          <div class="flex flex-row py-3">
            <a href="#" class="pl-7 pr-3 text-xs text-red-800 hover:text-red-600">返信</a>
            <!--ここに削除する際に条件付きが必要-->
            <a href="#" class="px-3 text-xs text-red-800 hover:text-red-600">削除</a>
          </div>
        </div>
        <div class="flex flex-row py-3">
          <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/474x/a0/7c/4f/a07c4f179663ea3e663cdac4a7534b6b.jpg" alt="user photo">
          <textarea rows="4" class="w-3/5 my-2 pl-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
          <button type="button" class="mx-2 h-12 w-36 inline-flex cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded bg-red-800 px-3 py-2 text-sm font-medium text-neutral-50 transition hover:border-red-800 hover:bg-red-500 focus:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-800">
            返信</button>

        </div>
      </div>
    </div>

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