<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <span class="font-bold text-2xl text-red-500" style="font-family: 'Courier New', Courier, monospace;">
                    {{ __('Streamly') }}

                </span>
            </h2>
            <div>
                <input type="text" placeholder="Search..."
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Form -->
            <div class="mb-6">
                <form method="GET" action="#">
                    <div class="flex items-center gap-4">
                        <select name="genre"
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">All Genres</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre }}">{{ $genre }}</option>
                            @endforeach
                        </select>
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Movie Carousel -->
            <div class="swiper mySwiper py-12">
                <div class="swiper-wrapper">
                    @foreach ($data as $movie)
                        <div class="swiper-slide">
                            <div
                                class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden max-w-xs h-[420px] mx-auto flex flex-col">
                                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                                    class="w-full h-52 object-cover" alt="movie.title" />

                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div class="space-y-1">
                                        <a href="#"
                                            class="text-lg font-bold text-gray-900 dark:text-white hover:text-red-500 block truncate">
                                            {{ $movie['title'] }}
                                        </a>
                                        <span class="text-slate-500 text-sm font-semibold">
                                            {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                                        </span>

                                        <p
                                            class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3 overflow-hidden">
                                            {{ $movie['overview'] }}
                                        </p>
                                    </div>

                                    <div class="flex justify-between items-center pt-2">
                                        <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                            <span>IMDB</span> <span class="text-2xl">{{ $movie['vote_average'] }}</span>
                                        </div>
                                        <span class="text-slate-400 text-xl font-bold">#8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Swiper Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                speed: 5000, // Controla qué tan rápido se mueve todo el carrusel
                autoplay: {
                    delay: 0, // Movimiento continuo sin pausa
                    disableOnInteraction: false,
                },
                grabCursor: true, // Efecto visual de "agarre"
                allowTouchMove: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                    1280: {
                        slidesPerView: 5,
                    },
                },
            });
        });
    </script>


</div>
