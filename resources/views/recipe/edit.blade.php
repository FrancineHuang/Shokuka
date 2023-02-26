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

    <!-- ● カード1 レシピを作成する：タイトル＋写真＋紹介文-->
    <div class="flex justify-center">
      <div class="w-9/12 mt-36 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
        <h5 class="mb-2 text-1xl font-bold text-neutral-900">レシピを作成する</h5>
        <p class="mb-2 text-sm text-neutral-500 sm:text-base">クリックして料理の写真を載せる。</p>
        <p class="mb-5 text-xs text-red-800 sm:text-sm">*レシピの完成写真をのせましょう。オリジナルでないものや料理以外のものはご遠慮ください。</p>
        <div class="mb-8 flex items-center justify-center">
          <a href="#" class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/800x480/b0b0b0/000000.png&text=%E3%82%AF%E3%83%AA%E3%83%83%E3%82%AF%E3%81%97%E3%81%A6%E5%86%99%E7%9C%9F%E3%82%92%E3%82%A2%E3%83%83%E3%83%97%E3%83%AD%E3%83%BC%E3%83%89">
          </a>
        </div>
        <div class="my-3">
          <label for="recipe-title" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">1. レシピタイトル<span class="text-red-800">(＊30字以内)</span></label>
          <input type="text" id="base-input" class="w-11/12 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="レシピに合ったタイトルをつけてください。">
        </div>
        <div class="my-6">
          <label for="recipe-title" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">2. レシピの紹介文<span class="text-red-800">(＊200字以内)</span></label>
          <textarea rows="4" class="w-11/12 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="レシピの味や魅力をわかりやすい言葉で書いてください。"></textarea>
        </div>
      </div>
    </div>

    <!-- ● カード2 レシピを作成する：材料・分量-->
    <div class="flex justify-center">
      <div class="w-9/12 my-10 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
        <div class="my-3">
          <label for="recipe-title" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">3. 材料・分量<span class="text-red-800">(＊必須)</span></label>
          <p class="my-3 text-xs text-neutral-800 sm:text-sm">レシピの味が再現できるよう、材料（食材や調味料）とその分量を書いてください。</p>
          <p class="my-3 text-xs text-neutral-800 sm:text-sm">※分量を記載しにくい材料は「少々」や「適量」などで問題はありません。</p>
          <div class="flex flex-row">
          <input type="text" id="base-input" class="w-24 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="何人分">
          <p class="mx-3 my-5 text-xs text-neutral-500 sm:text-sm">例）2人分</p>
          </div>
        </div>
        <div class="my-6 flex flex-row items-center justify-center">
          <p class="w-2/5 mx-3 my-2 bg-red-200 text-neutral-900 text-sm text-center rounded-lg block p-2.5">材料・調味料</p>
          <p class="w-2/5 mx-3 my-2 bg-red-200 text-neutral-900 text-sm text-center rounded-lg block p-2.5">分量</p>
        </div>
        <div class="my-5 flex items-center justify-center">
          <i class="fas fa-bars text-red-800"></i>
          <input type="text" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="例）豚肉">
          <input type="text" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="例）300g">
          <i class="fas fa-times text-red-800"></i>
        </div>
        <div>
          <p class="px-24 my-3 text-xs text-neutral-800 sm:text-sm"><i class="fas fa-plus pr-1 text-red-800"></i>行を追加する</p>
        </div>
      </div>
    </div>

    <!-- ● カード3 レシピを作成する：作り方-->
    <div class="flex justify-center">
      <div class="w-9/12 my-5 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
        <div class="my-3">
          <label for="recipe-title" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">4.作り方<span class="text-red-800">(＊必須)</span></label>
          <p class="my-3 text-xs text-neutral-800 sm:text-sm">お料理初心者の方でもわかるよう、下ごしらえの方法や調理手順を書いてください。</p>
        </div>
        <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
          <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <p class="sm:text-xl text-2xl font-bold mb-4 text-red-800">Step 1 </p>
            <textarea rows="4" class="w-full my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"></textarea>
            <div class="flex justify-center">
              <button class="inline-flex text-white bg-red-800 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">追加</button>
              <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除</button>
            </div>
          </div>
          <div class="lg:max-w-md lg:w-2/12 md:w-1/3 w-1/4">
            <a href="#"><img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600"></a>
            <p class="sm:text-xs text-sm mb-4 text-neutral-500">※クリックして写真をアップロード</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ● カード4 レシピを作成する：コツ・ポイント-->
    <div class="flex justify-center">
      <div class="w-9/12 mt-5 mb-10 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
        <div class="my-3">
          <label for="recipe-title" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">5. コツ・ポイント<span class="text-red-800">(＊200字以内)</span></label>
          <p class="my-3 text-xs text-neutral-800 sm:text-sm">調理時の注意点や、おいしく作るコツなどを教えてください。</p>
          <textarea rows="4" class="w-11/12 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"></textarea>
        </div>
      </div>
    </div>

    <!-- ● ボタン レシピを作成する：公開/取消-->
    <div class="my-10 mx-48 text-right">
      <button type="button" class="mx-2 inline-flex w-36 cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded border border-red-800 bg-white px-3 py-2 text-sm font-medium text-red-800 transition hover:border-gray-300 hover:bg-gray-100 focus:border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
        取消</button>
      <button type="button" class="mx-2 inline-flex w-36 cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded bg-red-800 px-3 py-2 text-sm font-medium text-neutral-50 transition hover:border-red-800 hover:bg-red-500 focus:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-800">
        公開</button>
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