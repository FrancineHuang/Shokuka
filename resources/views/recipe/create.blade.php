<!--Mainはここから-->
<x-header-footer>
      <form action="{{ route('recipe.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <!-- ● カード1 レシピを作成する：タイトル＋写真＋紹介文-->
      <div class="flex justify-center">

        <div class="w-9/12 mt-36 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
          <h5 class="mb-2 text-1xl font-bold text-neutral-900">レシピを作成する</h5>
          <p class="mb-2 text-sm text-neutral-500 sm:text-base">クリックして料理の写真を載せる。</p>
          <p class="mb-5 text-xs text-red-800 sm:text-sm">*レシピの完成写真をのせましょう。オリジナルでないものや料理以外のものはご遠慮ください。</p>

        <!-- Upload Image -->
        <div class="flex items-center justify-center w-full">
          <label
            for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50" >
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg
                    aria-hidden="true"
                    class="w-10 h-10 mb-3 text-gray-400"
                    fill="none" stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500">画像をここに<span class="font-semibold">クリック、またはドラッグ＆ドロップ</span> してください</p>
                  <p class="text-xs text-gray-500">PNG or JPG (最大800×400px)</p>
              </div>
              <input id="dropzone-file" type="file" name="cover_photo_path" class="hidden" required>
          </label>

        </div> 


          <!--<div class="mb-8 flex items-center justify-center">
            <a href="#" class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
              <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/800x480/b0b0b0/000000.png&text=%E3%82%AF%E3%83%AA%E3%83%83%E3%82%AF%E3%81%97%E3%81%A6%E5%86%99%E7%9C%9F%E3%82%92%E3%82%A2%E3%83%83%E3%83%97%E3%83%AD%E3%83%BC%E3%83%89">
            </a>
          </div>-->

          <div class="my-3">
            <label for="title" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">1. レシピタイトル<span class="text-red-800">(＊30字以内)</span></label>
            <input type="text" name="title" class="w-11/12 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="レシピに合ったタイトルをつけてください。">
          </div>

          <div class="my-6">
            <label for="introduction" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">2. レシピの紹介文<span class="text-red-800">(＊200字以内)</span></label>
            <textarea name="introduction" rows="4" class="w-11/12 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="レシピの味や魅力をわかりやすい言葉で書いてください。"></textarea>
          </div>

        </div>
      </div>

      <!-- ● カード2 レシピを作成する：材料・分量-->
      <div class="flex justify-center">
        <div class="w-9/12 my-10 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
          <div class="my-3">
            <p class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">3. 材料・分量<span class="text-red-800">(＊必須)</span></p>
            <p class="my-3 text-xs text-neutral-800 sm:text-sm">レシピの味が再現できるよう、材料（食材や調味料）とその分量を書いてください。</p>
            <p class="my-3 text-xs text-neutral-800 sm:text-sm">※分量を記載しにくい材料は「少々」や「適量」などで問題はありません。</p>
            <label for="person" class="flex flex-row">
            <input type="text" name="person" id="base-input" class="w-24 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="何人分">
            <p class="mx-3 my-5 text-xs text-neutral-500 sm:text-sm">例）2人分</p>
            </label>
          </div>
          <div>
            <div class="my-6 flex flex-row items-center justify-center">
              <label for="material" class="w-2/5 mx-3 my-2 bg-red-200 text-neutral-900 text-sm text-center rounded-lg block p-2.5">材料・調味料</label>
              <label for="quantity" class="w-2/5 mx-3 my-2 bg-red-200 text-neutral-900 text-sm text-center rounded-lg block p-2.5">分量</label>
            </div>
            <div class="my-5 flex items-center justify-center">
              <i class="fas fa-bars text-red-800"></i>
              <input type="text" name="material" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="例）豚肉">
              <input type="text" name="quantity" class="w-2/5 mx-3 my-1 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="例）300g">
              <i class="fas fa-times text-red-800"></i>
            </div>
          </div>
          <div>
            {{-- ここに無限追加機能を実装する->後で調べてみる --}}
            <p class="px-24 my-3 text-xs text-neutral-800 sm:text-sm"><i class="fas fa-plus pr-1 text-red-800"></i>行を追加する</p>
          </div>
        </div>
      </div>

      <!-- ● カード3 レシピを作成する：作り方-->
      <div class="flex justify-center">
        <div class="w-9/12 my-5 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
          <div class="my-3">
            <p class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">4.作り方<span class="text-red-800">(＊必須)</span></p>
            <p class="my-3 text-xs text-neutral-800 sm:text-sm">お料理初心者の方でもわかるよう、下ごしらえの方法や調理手順を書いてください。</p>
          </div>

          <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
              <label for="content" class="sm:text-xl text-2xl font-bold mb-4 text-red-800">Step 1 </label>
              <textarea name="content" rows="4" class="w-full my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"></textarea>
              <div class="flex justify-center">
                <button class="inline-flex text-white bg-red-800 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">追加</button>
                <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除</button>
              </div>
            </div>

            <!--ステップ写真のアップロード-->
            <label class="flex w-1/5 cursor-pointer appearance-none justify-center rounded-md border border-dashed border-gray-300 bg-white px-3 py-6 text-sm transition hover:border-gray-400 focus:border-solid focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 disabled:cursor-not-allowed disabled:bg-gray-200 disabled:opacity-75" tabindex="0"><span for="photo-dropbox" class="flex items-center space-x-2">
              <svg class="h-6 w-6 stroke-gray-400" viewBox="0 0 256 256">
                <path d="M96 208H72A56 56 0 0172 96a57.5 57.5.0 0113.9 1.7" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                <path d="M80 128a80 80 0 11144 48" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                <polyline points="118.1 161.9 152 128 185.9 161.9" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                <line x1="152" y1="208" x2="152" y2="128" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line></svg>
                <span class="text-xs font-medium text-gray-600">クリックして写真をアップロード</span>
              <input name="cover_photo_path" id="photo-dropbox" type="file" class="sr-only"></label>
          </div>
        </div>
      </div>

      <!-- ● カード4 レシピを作成する：コツ・ポイント-->
      <div class="flex justify-center">
        <div class="w-9/12 mt-5 mb-10 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
          <div class="my-3">
            <label for="tip" class="mb-2 text-sm font-bold text-neutral-900 sm:text-base">5. コツ・ポイント<span class="text-red-800">(＊200字以内)</span></label>
            <p class="my-3 text-xs text-neutral-800 sm:text-sm">調理時の注意点や、おいしく作るコツなどを教えてください。</p>
            <textarea name="tip" rows="4" class="w-11/12 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"></textarea>
          </div>
        </div>
      </div>

      <!-- ● ボタン レシピを作成する：公開/取消-->
      <div class="my-10 mx-48 text-right">
        <button type="button" class="mx-2 inline-flex w-36 cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded border border-red-800 bg-white px-3 py-2 text-sm font-medium text-red-800 transition hover:border-gray-300 hover:bg-gray-100 focus:border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
          取消</button>
        <button type="submit" class="mx-2 inline-flex w-36 cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded bg-red-800 px-3 py-2 text-sm font-medium text-neutral-50 transition hover:border-red-800 hover:bg-red-500 focus:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-800">
          公開</button>
      </div>
      </form>
      </main>

</x-header-footer>
    <!--Mainはここまで-->