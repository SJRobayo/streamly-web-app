<div>
    <x-header title="Streamly" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Form -->
            <div class="mb-6">
                <div class="flex items-center gap-4">
                    <select name="genre" wire:model="selectedGenre"
                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <option value="">All Genres</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre }}">{{ $genre }}</option>
                        @endforeach
                    </select>
                    <button type="button" wire:click="cleanFilters"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Limpiar
                    </button>
                </div>
            </div>


            <!-- Movie Carousel -->
            @if ($query)
                @include('components.search-movies')
            @else
                @include('components.home-recomendations')
                @include('components.top-ten-movies')

            @endif

        </div>

          <script>
        function carousel() {
            return {
                scrollStep: 300,
                scrollRight() {
                    const container = this.$refs.container;
                    if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 1) {
                        container.scrollLeft = 0;
                    } else {
                        container.scrollBy({
                            left: this.scrollStep,
                            behavior: 'smooth'
                        });
                    }
                },
                scrollLeft() {
                    const container = this.$refs.container;
                    if (container.scrollLeft <= 0) {
                        container.scrollLeft = container.scrollWidth;
                    } else {
                        container.scrollBy({
                            left: -this.scrollStep,
                            behavior: 'smooth'
                        });
                    }
                }
            };
        }
    </script>

    <style>
        .no-scrollbar {
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }
    </style>
    </div>


   

</div>
