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
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @for ($i = 0; $i < 10; $i++)
                    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden">
                        <img src="https://m.media-amazon.com/images/M/MV5BMzI0NmVkMjEtYmY4MS00ZDMxLTlkZmEtMzU4MDQxYTMzMjU2XkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_QL75_UX380_CR0,1,380,562_.jpg"
                            class="w-full h-56 object-cover" alt="movie.title" />

                        <div class="p-4 space-y-2">
                            <a href="#"
                                class="text-lg font-bold text-gray-900 dark:text-white hover:text-red-500 block">
                                Spider-Man: Across the Spider-Verse
                            </a>
                            <span class="text-slate-500 text-sm font-semibold">(2023)</span>

                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                                Miles Morales catapults across the Multiverse, where he encounters a team of
                                Spider-People charged with protecting its very existence...
                            </p>

                            <div class="flex justify-between items-center pt-2">
                                <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                    <span>IMDB</span> <span class="text-2xl">8.8</span>
                                </div>
                                <span class="text-slate-400 text-xl font-bold">#8</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

</div>
