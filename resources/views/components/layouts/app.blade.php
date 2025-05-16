<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        @include('components.layouts.footer')
    </div>

    <!-- Chat Panel -->
    <div id="chat-panel"
        class="fixed top-0 right-0 h-full w-96 bg-white dark:bg-gray-800 shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="p-4 border-b dark:border-gray-700 relative">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Chat</h2>
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                onclick="toggleChatPanel()">
                &times;
            </button>
        </div>
        <div class="flex flex-col h-[calc(100%-64px)] p-4">
            <div id="chat-messages" class="flex-grow overflow-y-auto mb-4 space-y-2">
                <p class="text-gray-600 dark:text-gray-400">👋 ¡Hola! ¿En qué puedo ayudarte hoy?</p>
            </div>
            <div class="flex">
                <input id="chat-input" type="text" placeholder="Escribe tu mensaje..."
                    class="w-full px-3 py-2 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                <button onclick="sendMessage()"
                    class="bg-blue-500 text-white px-4 py-2 rounded-r-lg hover:bg-blue-600">Enviar</button>
            </div>
        </div>
    </div>

    <!-- Chat Button -->
    <div id="chat-button" class="fixed bottom-4 right-4 z-40">
        <button
            class="bg-blue-500 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center space-x-2"
            onclick="toggleChatPanel()">
            <span>🤖 Streamly bot</span>
        </button>
    </div>

    <!-- Chat Scripts -->
    <script>
        const ACCESS_TOKEN = "{{ session('access_token') }}";

        function toggleChatPanel() {
            const chatPanel = document.getElementById('chat-panel');
            const chatButton = document.getElementById('chat-button');

            const isHidden = chatPanel.classList.contains('translate-x-full');
            chatPanel.classList.toggle('translate-x-full');

            if (isHidden) {
                chatButton.classList.add('hidden');
            } else {
                chatButton.classList.remove('hidden');
            }
        }

        async function sendMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            if (!message) return;

            const chatMessages = document.getElementById('chat-messages');

            // Burbuja del usuario
            const userBubble = document.createElement('div');
            userBubble.className = "flex justify-end";
            userBubble.innerHTML = `
        <div class="bg-blue-500 text-white text-sm px-4 py-2 rounded-xl rounded-br-none max-w-[75%] shadow">
             ${message}
        </div>
    `;
            chatMessages.appendChild(userBubble);
            input.value = '';
            chatMessages.scrollTop = chatMessages.scrollHeight;

            try {
                const response = await fetch("http://localhost:8000/api/chat", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "Authorization": "Bearer " + ACCESS_TOKEN,
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        query: message
                    })
                });

                const data = await response.json();
                const reply = data.response ?? 'No hubo respuesta del bot.';

                // Burbuja del bot
                const botBubble = document.createElement('div');
                botBubble.className = "flex justify-start";
                botBubble.innerHTML = `
            <div class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white text-sm px-4 py-2 rounded-xl rounded-bl-none max-w-[75%] shadow">
                 ${reply}
            </div>
        `;
                chatMessages.appendChild(botBubble);
                chatMessages.scrollTop = chatMessages.scrollHeight;

            } catch (error) {
                console.error("Error:", error);
                const errorMsg = document.createElement('div');
                errorMsg.className = "flex justify-start";
                errorMsg.innerHTML = `
            <div class="bg-red-100 text-red-700 text-sm px-4 py-2 rounded-xl max-w-[75%] shadow">
                ❌ Error de conexión con el servidor.
            </div>
        `;
                chatMessages.appendChild(errorMsg);
            }
        }


        // Permitir enviar con Enter
        document.getElementById('chat-input').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') sendMessage();
        });
    </script>
</body>

</html>
