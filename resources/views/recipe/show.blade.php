@php
$userData = auth()->user();
@endphp

<x-header-footer :userData="$userData">
    <!-- ● カード1：レシピ全体の表示部分-->
      <div class="flex justify-center">
        <div class="w-9/12 mt-36 mb-8 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
          <x-message :message="session('message')"></x-message>
      <!--　ユーザーのニックネームとアイコン　-->
          <div class="flex flex-row py-3">
            @if($showUserData->icon_path)
            <a href="{{ route('user.show', ['user_id' => $showRecipeData->user_id]) }}">
              <img class="w-8 h-8 rounded-full" src="{{ asset('storage/icon_image/' . $showUserData->icon_path) }}" alt="user photo">
            </a>
            @else
            <img class="w-8 h-8 rounded-full" src="/default_avatar.jpeg" alt="user photo">
            @endif
            <p class="pt-2 px-3 text-xs text-neutral-700 font-bold">{{ $showUserData->username }}</p>
          </div>
      <!--　レシピのタイトルといいねボタン（ハート）　-->
          <div class="flex flex-row py-3">
            <h5 class="mb-2 text-2xl font-bold text-neutral-900">{{ $showRecipeData->title }}</h5>
          </div>
      <!--　レシピのカバー写真と作成・更新日　-->
          <div class="flex flex-row">
            <div class="mb-8 flex items-center justify-center max-w-4xl max-h-96 lg:max-w-lg md:w-1/2 w-5/6 md:mb-0">
              <img class="object-cover object-center rounded" src="{{ asset('storage/cover_image/' . $showRecipeData->cover_photo_path) }}">
            </div>
            <div class="flex flex-col-reverse text-xs text-neutral-600 px-5">
              <p>レシピ公開日：{{ $showRecipeData->created_at }}</p>
              <p>レシピ更新日：{{ $showRecipeData->updated_at }}</p>
            </div>
          </div>
      <!-- ボタングループ -->
      <div class="inline-flex rounded-md shadow-sm my-3">
        @if($like)
        <a href="{{route('recipe.unlike',['recipe_id' => $showRecipeData->id])}}" aria-current="page" class="px-4 py-2 text-sm font-medium text-red-800 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700">
          <i class="fa-solid fa-heart"></i> お気に入り（{{$userData->likes->count()}}）
        </a>
        @else
        <a href="{{route('recipe.like',['recipe_id' => $showRecipeData->id])}}" aria-current="page" class="px-4 py-2 text-sm font-medium text-red-800 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700">
          <i class="fa-regular fa-heart"></i> お気に入り
          @if($userData)
          （{{$userData->likes->count()}}）
          @endif
        </a>
        @endif
        <a href="{{ route('recipe.edit', ['recipe_id' => $showRecipeData->id]) }}" class="px-4 py-2 text-sm font-medium text-red-800 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700">
          編集する
        </a>
        <form action="{{ route('recipe.destroy', ['recipe_id' => $showRecipeData->id]) }}" method="POST">
          @csrf
          <button onclick="return comfirm('本当に削除してもよろしいでしょうか？')" class="px-4 py-2 text-sm font-medium text-red-800 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700">
            削除する
          </button>
        </form>
      </div>
      <!--　レシピの紹介文　-->
          <div class="flex flex-col py-3">
            <i class="fa-solid fa-quote-left text-red-800 text-1xl py-3"></i> <!-- left quote -->
            <p class="flex items-center text-base text-neutral-900 py-1 max-w-4xl">
              {{ $showRecipeData->introduction }}
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
                @foreach ($showIngredientData as $ingredient)
                <div class="flex flex-row w-full border-b-2 border-neutral-100 border-opacity-100 py-4">
                  <dt class="text-neutral-800">{{ $ingredient->material }}</dt>
                  <dd class="text-neutral-800 text-right font-semibold pl-8">{{ $ingredient->quantity }}</dd>
                </div>
                @endforeach
              </dl>
          </div>
      <!--　レシピのステップリスト　-->
          <div class="pt-8 pb-4">
            <h5 class="mb-2 text-1xl font-bold text-neutral-900">
              <span class="text-2xl text-red-800 px-2"><i class="fa-solid fa-list-ol"></i></span>
              作り方・ステップ
            </h5>
            @foreach ($showStepData as $step)
            <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
              <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <p class="sm:text-xl text-base font-bold mb-4 text-red-800">Step {{ $loop->iteration }} </p>
                <p class="w-full my-2 text-gray-900 text-sm block">
                {{ $step->content }}
                </p>
              </div>
              <div class="lg:max-w-md lg:w-2/12 md:w-1/3 w-1/4">
                <a href="#"><img class="object-cover object-center rounded" alt="step" src="{{ asset('storage/step_image/' . $step->step_photo_path) }}"></a>
              </div>
            </div>
            @endforeach
          </div>
      <!--　レシピのコツ・ポイント　-->
          <div class="py-4">
            <h5 class="mb-2 text-1xl font-bold text-neutral-900">
              <span class="text-2xl text-red-800 px-2"><i class="fa-solid fa-pen-fancy"></i></span>
              コツ・ポイント
            </h5>
            <p class="flex items-center justify-center text-base text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
              {{ $showRecipeData->tip }}
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
        <!--コメント送信-->
        <form action="{{ route('comment.store', ['recipe_id' => $showRecipeData->id]) }}" method="POST" class="flex flex-row py-3">
          @csrf
          <input name="recipe_id" type="hidden" value="{{ $showRecipeData->id }}">
          <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/474x/a0/7c/4f/a07c4f179663ea3e663cdac4a7534b6b.jpg" alt="user photo">
          <textarea rows="4" name="content" class="w-3/5 my-2 pl-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
          <button type="submit" class="mx-2 h-12 w-36 inline-flex cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded bg-red-800 px-3 py-2 text-sm font-medium text-neutral-50 transition hover:border-red-800 hover:bg-red-500 focus:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-800">
            返信</button>
        </form>
    <!--　ユーザーアイコン・ニックネーム・コメントの日時　-->
    @if($showCommentData)
      @forelse($showCommentData as $comment)
        <div class="flex flex-col">
          <div class="flex flex-row py-3">
            <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/564x/af/66/f6/af66f6f05298dacf38f7badfc176080b.jpg" alt="user photo">
            <p class="pt-2 px-3 text-xs text-left text-neutral-700">{{ $comment->user->username }}</p>
            <p class="pt-2 px-3 text-xs text-left text-neutral-400">{{ $comment->created_at }}</p>
          </div>
          <p class="flex items-center text-base text-left text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
            {{ $comment->content }}
          </p>
          <div class="flex flex-row py-3">
            <button href="#" class="pl-7 pr-3 text-xs text-red-800 hover:text-red-600">返信</button>
            <!--ここに削除する際に条件付きが必要-->
            <form action="{{ route('comment.destroy', ['id' => $comment->id, 'recipe_id' => $showRecipeData->id]) }}" method="POST">
              @csrf
              <input type="hidden" name="recipe_id" value="{{ $showRecipeData->id }}">
              <button type="submit" class="px-3 text-xs text-red-800 hover:text-red-600">削除</button>
            </form>
          </div>
        </div>
      @empty
        <p class="flex items-center justify-center text-base text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
          コメントがありません。
        </p>
      @endforelse
    @endif
      </div>
    </div>
  </x-header-footer>