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
    </div>

    <!-- Chat Panel -->
    <!-- Chat Panel -->
    <div id="chat-panel"
        class="fixed top-0 right-0 h-full w-80 bg-white dark:bg-gray-800 shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="p-4 border-b dark:border-gray-700 relative">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Chat</h2>
            <button class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                onclick="toggleChatPanel()">
                &times;
            </button>
        </div>
        <div class="flex flex-col h-[calc(100%-64px)] p-4">
            <div class="flex-grow overflow-y-auto mb-4">
                <p class="text-gray-600 dark:text-gray-400">Chat functionality coming soon!</p>
            </div>
            <div>
                <input type="text" placeholder="Escribe tu mensaje..."
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
            </div>
        </div>
    </div>

    <!-- Chat Button -->
    <div id="chat-button" class="fixed bottom-4 right-4 z-40">
        <button
            class="bg-blue-500 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center space-x-2"
            onclick="toggleChatPanel()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m-7 4h8a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Chat with us</span>
        </button>
    </div>

    <script>
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
    </script>

</body>

</html>
