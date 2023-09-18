@php
$userData = auth()->user();
$showRecipeData = $showUserData->recipes()->latest()->limit(3)->get();
@endphp

<x-header-footer :userData="$userData">
    {{--カード1: ユーザープロフィール--}}
    <div class="flex justify-center mt-24">
        <div class="w-9/12 my-5 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row">

                {{-- アイコン --}}
                @if ($showUserData->icon_path)
                <img src="{{ asset('storage/icon_image/' . $showUserData->icon_path) }}" alt="" class="self-center flex-shrink-0 w-24 h-24 border rounded-full md:justify-self-start">
                @else
                <img src="/default_avatar.jpeg" alt="" class="self-center flex-shrink-0 w-24 h-24 border rounded-full md:justify-self-start">
                @endif
                {{--ユーザーネームと自己紹介--}}
                <div class="flex flex-col">
                    <h4 class="text-lg font-semibold text-center md:text-left">{{ $showUserData->nickname }}</h4>
                    <p class="text-neutral-500">＠{{ $showUserData->username }}</p>
                    <p class="text-neutral-700">{{ $showUserData->introduction }}</p>
                    {{--フォロー数とフォロワー数--}}
                    <div class="flex flex-row mt-5">
                        <div class="flex flex-row">
                            <p class="text-neutral-500">フォロー中</p>
                            <p class="text-neutral-700 pl-2">{{ $followingCount }}</p>
                        </div>
                        <div class="flex flex-row pl-5">
                            <p class="text-neutral-500">フォロワー</p>
                            <p class="text-neutral-700 pl-2">{{ $followerCount }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row pt-3">
                        <div class="flex flex-row">
                            <i class="text-red-800 fa-solid fa-location-dot"></i>
                        </div>
                        <div class="flex flex-row pl-3">
                            <p class="text-neutral-500">{{$showUserData->location}}</p>
                        </div>
                    </div>
                </div>
                {{-- フォローするボタン --}}
                @auth
                @if(!$currentlyFollowing AND auth()->user()->id !== $showUserData->id)
                <form action="{{ route('user.follow', ['user_id' => $showUserData->id]) }}" method="POST" class="flex flex-col pl-40">
                @csrf
                    <button type="submit" class="focus:outline-none text-white bg-red-800 hover:bg-red-700 focus:ring-4 focus:ring-red-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">フォローする</button>
                </form>
                @elseif($currentlyFollowing)
                <form action="{{ route('user.unfollow', ['user_id' => $showUserData->id]) }}" method="POST" class="flex flex-col pl-40">
                @csrf
                    <button type="submit" class="focus:outline-none text-white bg-red-800 hover:bg-red-700 focus:ring-4 focus:ring-red-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">フォロー中</button>
                </form>
                @endif
                    @if(auth()->user()->id == $showUserData->id)
                    <a href="/" class="focus:outline-none text-white bg-red-800 hover:bg-red-700 focus:ring-4 focus:ring-red-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">プロフィール編集</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    {{--カード2: 全てのレシピ--}}
    {{--タイトル--}}
    <div class="flex justify-between w-10/12 my-5 lg:pl-40">
        <h4 class="text-red-800 text-lg font-semibold text-center md:text-left">レシピ（{{ $showUserData->recipes->count() }}）</h4>
        <a href="{{route('user.all_recipes', ['user_id' => $showUserData->id])}}" class="flex justify-end text-neutral-700 hover:text-neutral-500">
            <p class="text-base text-right pr-1">もっと見る</p>
            <i class="fa-solid fa-chevron-right text-sm  text-center pr-1"></i>
        </a>
    </div>
    {{--写真付きカード--}}
    @if($showRecipeData)
    @forelse($showRecipeData as $recipe)
    <div class="flex justify-center my-1">
        <div class="w-9/12 my-3 flex flex-row bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <img class="object-cover h-36 w-36 lg:h-36 lg:w-36 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" src="{{ asset('storage/cover_image/' . $recipe->cover_photo_path) }}">
            <div class="mb-8 ml-8">
                <a href="{{ route('recipe.show', ['recipe_id' => $recipe->id]) }}" class="text-gray-900 font-bold text-xl mb-2">{{ $recipe->title }}</a>
                <p class="py-1 text-gray-700 text-base">{{ $recipe->introduction }}</p>
            </div>
        </div>
    </div>
    @empty
    <p class="flex items-center justify-center text-base text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
        レシピがありません。
    </p>
    @endforelse
    @endif


    {{--カード3: お気に入りレシピ--}}
    {{--タイトル--}}
@if($likedRecipes->count() > 0)
    <div class="flex justify-between w-10/12 my-5 lg:pl-40">
        <h4 class="text-red-800 text-lg font-semibold text-center md:text-left">お気に入り（{{ $likedRecipes->count() }}）</h4>
        <a href="{{route('user.likes', ['user_id' => $showUserData->id])}}" class="flex justify-end text-neutral-700 hover:text-neutral-500">
            <p class="text-base text-right pr-1">もっと見る</p>
            <i class="fa-solid fa-chevron-right text-sm  text-center pr-1"></i>
        </a>
    </div>
    @foreach($likedRecipes as $like)
    <div class="flex justify-center my-1">
        <div class="w-9/12 my-3 flex flex-row bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <img class="object-cover h-36 w-36 lg:h-36 lg:w-36 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" src="{{ asset('storage/cover_image/' . $like->recipe->cover_photo_path)}}">
            <div class="mb-8 ml-8">
                <div class="text-gray-900 font-bold text-xl mb-2">{{ $like->recipe->title }}</div>
                <p class="text-gray-700 text-base">{{ $like->recipe->introduction }}</p>
            </div>
        </div>
    </div>
    @endforeach
@else
    <p class="flex items-center justify-center text-base text-neutral-900 my-2 py-1 pl-7 max-w-4xl">
        レシピがありません。
    </p>
@endif
</x-header-footer>
