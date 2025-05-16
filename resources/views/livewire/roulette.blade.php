<div class="flex flex-col items-center mt-10 space-y-6">
    <!-- Contenedor de la ruleta -->
    <div class="relative">
        <!-- Puntero -->
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-full z-10">
            <div class="w-0 h-0 border-l-8 border-r-8 border-b-16 border-transparent border-b-red-600"></div>
        </div>

        <!-- Rueda -->
        <div id="wheel"
            class="w-72 h-72 rounded-full border-[8px] border-gray-300 relative overflow-hidden shadow-lg">
            <canvas id="wheel-canvas" width="300" height="300" class="rounded-full"></canvas>
        </div>
    </div>

    <!-- Botón de girar -->
    <button onclick="spinWheel()" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-full hover:bg-blue-700">
        🎯 Girar Ruleta
    </button>

    <script>
        const canvas = document.getElementById('wheel-canvas');
        const ctx = canvas.getContext('2d');
        const segments = ["100", "200", "500", "¡Pierdes!", "300", "Gira de nuevo", "1000", "¡Sorpresa!"];
        const colors = ["#f87171", "#60a5fa", "#34d399", "#fbbf24", "#c084fc", "#fb7185", "#38bdf8", "#facc15"];
        const totalSegments = segments.length;
        const radius = canvas.width / 2;
        let angle = 0;
        let isSpinning = false;

        // Dibuja la rueda
        function drawWheel() {
            for (let i = 0; i < totalSegments; i++) {
                const startAngle = (i * 2 * Math.PI) / totalSegments;
                const endAngle = ((i + 1) * 2 * Math.PI) / totalSegments;

                ctx.beginPath();
                ctx.moveTo(radius, radius);
                ctx.arc(radius, radius, radius, startAngle, endAngle);
                ctx.fillStyle = colors[i % colors.length];
                ctx.fill();
                ctx.stroke();

                // Texto
                ctx.save();
                ctx.translate(radius, radius);
                ctx.rotate(startAngle + (endAngle - startAngle) / 2);
                ctx.textAlign = "right";
                ctx.fillStyle = "#fff";
                ctx.font = "bold 14px sans-serif";
                ctx.fillText(segments[i], radius - 10, 5);
                ctx.restore();
            }
        }

        drawWheel();

        function spinWheel() {
            if (isSpinning) return;
            isSpinning = true;

            const spinAngle = 360 * 5 + Math.floor(Math.random() * 360); // 5 vueltas + aleatorio
            const duration = 4000;
            const wheel = document.getElementById('wheel');

            wheel.style.transition = `transform ${duration}ms cubic-bezier(0.33, 1, 0.68, 1)`;
            wheel.style.transform = `rotate(${spinAngle}deg)`;

            setTimeout(() => {
                isSpinning = false;
                const finalAngle = spinAngle % 360;
                const index = totalSegments - Math.floor((finalAngle / 360) * totalSegments) % totalSegments;
                const result = segments[index % totalSegments];
                alert("🎉 Premio: " + result);
            }, duration + 100);
        }
    </script>

</div>
