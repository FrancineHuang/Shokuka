<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>食華 - 本場の中華レシピを探そう</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="中国人が作る本場中華料理のレシピシェアサービス。本場中華を作りたいならココ！作り方検索できる。本場中華料理が大好きな人は自分のレシピを作成し、公開できる。">
    <meta name="keywords" content="食華,Shokuka,しょくか,本場中華,中華料理,中国料理,中華レシピ,レシピサービス,ChineseFood,Recipe">
    
    <!-- Fonts -->
    
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!--＊＊＊　共通Headerはここから　＊＊＊-->
    <header class="fixed max-w-full top-0 left-0 right-0 z-30">
        <nav class="bg-red-800 border-gray-200 h-16 px-2 sm:px-4 py-2.5">
            <div class="container flex flex-wrap items-center justify-between mx-auto my-2">
                <a href="#" class="flex items-center">
                <span class="text-xl font-semibold whitespace-nowrap text-neutral-50">Shokuka</span>
                </a>
            </div>
        </nav>
    </header>
    <!--＊＊＊　共通Headerはここまで　＊＊＊-->

    <main>
        {{ $slot }}
    </main>

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
            <nav class="mt-12 flex w-full flex-col-reverse items-center justify-between space-y-4 space-y-reverse text-xs font-medium text-neutral-50 sm:flex-row sm:space-y-0">
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