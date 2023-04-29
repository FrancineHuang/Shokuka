<x-header-footer>
    <!-- Card1: Carousel -->
    <section class="flex justify-center">
        <div id="default-carousel" class="w-9/12 mt-36 z-0 relative " data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://thewoksoflife.com/wp-content/uploads/2017/10/dry-fried-string-beans-2.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <div class="absolute inset-x-0 bottom-1 z-20 w-96 mb-10 p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 text-neutral-50 bg-opacity-50">
                        タイトル
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://thewoksoflife.com/wp-content/uploads/2015/06/smashed-asian-cucumber-salad-7.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <div class="absolute inset-x-0 bottom-1 z-20 w-96 mb-10 p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 text-neutral-50 bg-opacity-50">
                        タイトル
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://thewoksoflife.com/wp-content/uploads/2021/07/mushrooms-glass-noodles-11.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <div class="absolute inset-x-0 bottom-1 z-20 w-96 mb-10 p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 text-neutral-50 bg-opacity-50">
                        タイトル
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://thewoksoflife.com/wp-content/uploads/2021/07/mushrooms-glass-noodles-11.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <div class="absolute inset-x-0 bottom-1 z-20 w-96 mb-10 p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 text-neutral-50 bg-opacity-50">
                        タイトル
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://thewoksoflife.com/wp-content/uploads/2021/08/Stir-fried-cucumbers-wood-ear-bean-threads-11.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <div class="absolute inset-x-0 bottom-1 z-20 w-96 mb-10 p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 text-neutral-50 bg-opacity-50">
                        タイトル
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>

    <!-- Card2: 新着のレシピ -->
    <section class="my-10 flex flex-col">
        <div class="flex justify-center">
            <div class="w-9/12 pb-4 border-b border-gray-600">
            <h3 class="text-xl font-semibold leading-6 text-red-800">新着のレシピ</h3>
            </div>
        </div>
    
        <div class="w-9/12 flex justify-center relative mx-auto max-w-7xl">
            <div class="grid max-w-lg gap-8 mx-auto mt-12 lg:grid-cols-2 lg:max-w-none">
                <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
                    <a href="/blog-post">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48 rounded-lg" src="https://thewoksoflife.com/wp-content/uploads/2021/04/beef-onion-stir-fry-12.jpg" alt="">
                        </div>
                    </a>
                    <div class="flex flex-col justify-between flex-1">
                        <a href="/blog-post"></a>
                        <div class="flex-1">
                                <a href="/blog-post">
                                    <div class="flex pt-6 space-x-1 text-sm text-gray-500">
                                        <time datetime="2020-03-10"> Mar 10, 2020 </time>
                                        <span aria-hidden="true"> · </span>
                                        <span> 4 min read </span>
                                    </div>
                                </a>
                                <a href="#" class="block mt-2 space-y-6">
                                    <h3 class="text-2xl font-semibold leading-none tracking-tighter text-neutral-600">Typography on app.</h3>
                                    <p class="text-lg font-normal text-gray-500">Filling text so you can see how it looks like with text. Did I said text?</p>
                                    <div class="flex items-center mt-6">
                                        <div>
                                            <img class="inline-block rounded-full h-9 w-9" src="https://i.pinimg.com/564x/bd/76/69/bd766998ec89f6ca7fe731ded9c42ea8.jpg" alt="">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-700 group-hover:text-neutral-600">Jazz Torp</p>
                                        </div>
                                    </div>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
                        <a href="/blog-post">
                            <div class="flex-shrink-0">
                                <img class="object-cover w-full h-48 rounded-lg" src="https://thewoksoflife.com/wp-content/uploads/2023/04/orange-chicken-12.jpg" alt="">
                            </div>
                        </a>
                        <div class="flex flex-col justify-between flex-1">
                            <a href="/blog-post"></a>
                            <div class="flex-1">
                                <a href="/blog-post">
                                    <div class="flex pt-6 space-x-1 text-sm text-gray-500">
                                        <time datetime="2020-03-10"> Mar 10, 2020 </time>
                                        <span aria-hidden="true"> · </span>
                                        <span> 4 min read </span>
                                    </div>
                                </a>
                                <a href="#" class="block mt-2 space-y-6">
                                    <h3 class="text-2xl font-semibold leading-none tracking-tighter text-neutral-600">Typography on app.</h3>
                                    <p class="text-lg font-normal text-gray-500">Filling text so you can see how it looks like with text. Did I said text?</p>

                                    <div class="flex items-center mt-6">
                                        <div>
                                            <img class="inline-block rounded-full h-9 w-9" src="https://i.pinimg.com/564x/bd/76/69/bd766998ec89f6ca7fe731ded9c42ea8.jpg" alt="">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-700 group-hover:text-neutral-600">Robert Zox</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
                        <a href="/blog-post">
                            <div class="flex-shrink-0">
                                <img class="object-cover w-full h-48 rounded-lg" src="https://thewoksoflife.com/wp-content/uploads/2022/12/pepper-steak-12.jpg" alt="">
                            </div>
                        </a>
                        <div class="flex flex-col justify-between flex-1">
                            <a href="/blog-post"></a>
                            <div class="flex-1">
                                <a href="/blog-post">
                                    <div class="flex pt-6 space-x-1 text-sm text-gray-500">
                                        <time datetime="2020-03-10"> Mar 10, 2020 </time>
                                        <span aria-hidden="true"> · </span>
                                        <span> 4 min read </span>
                                    </div>
                                </a>
                                <a href="#" class="block mt-2 space-y-6">
                                    <h3 class="text-2xl font-semibold leading-none tracking-tighter text-neutral-600">Typography on app.</h3>
                                    <p class="text-lg font-normal text-gray-500">Filling text so you can see how it looks like with text. Did I said text?</p>
                                    
                                    <div class="flex items-center mt-6">
                                        <div>
                                            <img class="inline-block rounded-full h-9 w-9" src="https://i.pinimg.com/564x/bd/76/69/bd766998ec89f6ca7fe731ded9c42ea8.jpg" alt="">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-700 group-hover:text-neutral-600">Thomas Narrow</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Card3: みんなのためのレシピ -->
    <section class="flex flex-col">
        <div class="flex justify-center">
            <div class="w-9/12 pb-4 mb-8 border-b border-gray-600">
            <h3 class="text-xl font-semibold leading-6 text-red-800">みんなのためのレシピ</h3>
            </div>
        </div>
        <div class="w-9/12 flex justify-center relative mx-auto max-w-7xl">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
                    <a href="/blog-post">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48 rounded-lg" src="https://thewoksoflife.com/wp-content/uploads/2023/04/orange-chicken-12.jpg" alt="">
                        </div>
                    </a>
                    <div class="flex flex-col justify-between flex-1">
                        <a href="/blog-post"></a>
                        <div class="flex-1">
                            <a href="#" class="block mt-2 space-y-7">
                                <h3 class="text-xl font-semibold leading-none tracking-tighter text-neutral-600">サラダ・和えもの</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
                    <a href="/blog-post">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48 rounded-lg" src="https://thewoksoflife.com/wp-content/uploads/2023/04/orange-chicken-12.jpg" alt="">
                        </div>
                    </a>
                    <div class="flex flex-col justify-between flex-1">
                        <a href="/blog-post"></a>
                        <div class="flex-1">
                            <a href="#" class="block mt-2 space-y-7">
                                <h3 class="text-xl font-semibold leading-none tracking-tighter text-neutral-600">スープ</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
                    <a href="/blog-post">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48 rounded-lg" src="https://thewoksoflife.com/wp-content/uploads/2023/04/orange-chicken-12.jpg" alt="">
                        </div>
                    </a>
                    <div class="flex flex-col justify-between flex-1">
                        <a href="/blog-post"></a>
                        <div class="flex-1">
                            <a href="#" class="block mt-2 space-y-7">
                                <h3 class="text-xl font-semibold leading-none tracking-tighter text-neutral-600">麺類</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
                    <a href="/blog-post">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48 rounded-lg" src="https://thewoksoflife.com/wp-content/uploads/2022/12/pepper-steak-12.jpg" alt="">
                        </div>
                    </a>
                    <div class="flex flex-col justify-between flex-1">
                        <a href="/blog-post"></a>
                        <div class="flex-1">
                            <a href="#" class="block mt-2 space-y-7">
                                <h3 class="text-xl font-semibold leading-none tracking-tighter text-neutral-600">肉料理</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-header-footer>