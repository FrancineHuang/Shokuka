@php
$userData = auth()->user();
@endphp

<x-header-footer :userData="$userData">
      {{--セクションタイトルはここから--}}
      <div class="container px-5 pt-24 pb-8 mx-auto flex flex-wrap w-full mb-3 mt-16">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
          <p class="sm:text-2xl text-2xl font-medium title-font mb-2 text-neutral-900">「{{ $keyword }}」を含まれているレシピ：{{ $totalCount }}件</p>
          <div class="h-1 w-20 bg-red-800 rounded ml-9"></div>
        </div>
      </div>
      {{--セクションタイトルはここまで--}}

      {{--検索結果のカードはここから--}}
      {{--バックエンド側のロジックを追加してください--}}
      <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
        @if($results)
          @forelse($results as $result)
          <div class="overflow-hidden transition-shadow duration-300 bg-white rounded shadow-sm">
            <img src="{{ $result->cover_photo_path }}" class="object-cover w-full h-64" alt="" />
            <div class="p-5 border border-t-0">
              <p class="mb-3 text-xs font-semibold tracking-wide uppercase">
                <a href="/" class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700" aria-label="Category" title="traveling">{{ $result->user->username }}</a>
                <span class="text-gray-600">— {{$result->created_at}}</span>
              </p>
              <a href="/" aria-label="Category" title="Visit the East" class="inline-block mb-3 text-2xl font-bold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">{{ $result->title }}</a>
              <p class="mb-2 text-gray-700">
                {{ $result->introduction }}
              </p>
              <a href="/" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">詳しくみる</a>
            </div>
          </div>
          @empty
          <p class="flex items-center justify-center text-base text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
          検索結果がありません。
          </p>
          @endforelse
        @endif
        </div>
      </div>
      {{--検索結果のカードはここまで--}}

      {{--ページ数の表示はここから--}}
      {{--バックエンド側のロジックを追加してください--}}
        {{--<nav aria-label="Page navigation example" class="grid place-items-center pb-20">
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
        </nav>--}}
      {{--ページ数の表示はここまで--}}

</x-header-footer>