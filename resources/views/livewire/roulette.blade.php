<div class="flex flex-col items-center mt-10 space-y-6 relative w-full max-w-4xl mx-auto">
    <!-- Puntero centrado -->
    <div class="absolute top-[110px] left-1/2 -translate-x-1/2 z-20 pointer-events-none">
        <div class="w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-red-600"></div>
    </div>

    <!-- Carrusel -->
    <div class="relative w-full overflow-hidden border border-gray-300 rounded-lg shadow-md">
        <div id="carousel" class="flex transition-transform duration-700 ease-out will-change-transform px-[50%]">
            @foreach ($data as $movie)
                <div class="carousel-card flex-shrink-0 w-48 bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden h-[360px] mx-2 transition-all duration-300"
                     data-title="{{ $movie['title'] }}">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="w-full h-40 object-cover"
                         alt="{{ $movie['title'] }}" />
                    <div class="p-3 flex flex-col justify-between h-full">
                        <div class="space-y-1">
                            <a href="{{ route('movie.details', ['id' => $movie['id'] ?? $movie['movie_id']]) }}"
                               class="text-base font-bold text-gray-900 dark:text-white hover:text-red-500 block truncate">
                                {{ $movie['title'] }}
                            </a>
                            <span class="text-slate-500 text-sm font-semibold">
                                {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                            </span>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                                {{ $movie['overview'] }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <div class="text-yellow-500 text-lg font-bold flex items-center gap-1">
                                <span>IMDB</span> <span class="text-xl">{{ $movie['vote_average'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Botón -->
    <button id="spinBtn"
        class="bg-blue-600 text-white font-bold py-2 px-6 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        🎯 Girar Carrusel
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carousel = document.getElementById("carousel");
            const spinBtn = document.getElementById("spinBtn");
            const cardWidth = 224;
            let spinning = false;

            function cloneForLooping() {
                const cards = Array.from(carousel.querySelectorAll('.carousel-card'));
                cards.forEach(card => {
                    const cloneBefore = card.cloneNode(true);
                    const cloneAfter = card.cloneNode(true);
                    carousel.appendChild(cloneAfter);
                    carousel.insertBefore(cloneBefore, carousel.firstChild);
                });
            }

            function getAllCards() {
                return carousel.querySelectorAll('.carousel-card');
            }

            function clearSelection() {
                getAllCards().forEach(card => card.classList.remove('ring-4', 'ring-red-500', 'scale-105', 'z-10'));
            }

            function resetLoopIfNeeded(currentTranslate) {
                const totalCards = getAllCards().length;
                const originalCount = totalCards / 3;
                const maxIndex = totalCards - originalCount;
                if (currentTranslate / cardWidth >= maxIndex - 1) {
                    carousel.style.transition = 'none';
                    carousel.style.transform = `translateX(calc(50% - ${originalCount * cardWidth}px))`;
                }
            }

            cloneForLooping();

            spinBtn.addEventListener('click', () => {
                if (spinning) return;
                spinning = true;
                clearSelection();

                const cards = getAllCards();
                const total = cards.length;
                const randomIndex = Math.floor(Math.random() * total);
                const spins = 3;
                const distance = (spins * total + randomIndex) * cardWidth;

                carousel.style.transition = 'transform 3s cubic-bezier(0.25, 1, 0.5, 1)';
                carousel.style.transform = `translateX(calc(50% - ${distance}px))`;

                setTimeout(() => {
                    const selected = cards[randomIndex];
                    selected.classList.add('ring-4', 'ring-red-500', 'scale-105', 'z-10');
                    const title = selected.dataset.title || 'Película';
                    alert(`🎬 Seleccionada: ${title}`);
                    resetLoopIfNeeded(distance / cardWidth);
                    spinning = false;
                }, 3100);
            });
        });
    </script>
</div>
