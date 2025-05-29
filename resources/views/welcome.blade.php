<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AI Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow p-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="{{asset('Images/Doczone.png')}}" alt="AI Avatar" class="w-10 h-10 rounded-full">
            <h1 class="text-xl font-semibold">DZ Assistant</h1>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="document.body.classList.toggle('dark')" class="text-xl">🌓</button>
            <a href="/chat/export" class="bg-green-500 text-white px-4 py-1 rounded">Export PDF</a>
        </div>
    </header>

    <!-- Chat Box -->
    <main id="chat-box" class="flex-1 overflow-y-auto p-4 space-y-4">
        @foreach($messages as $msg)
            <div class="{{ $msg->role === 'user' ? 'text-right' : 'text-left' }}">
                <div class="inline-block max-w-md px-4 py-2 rounded-lg {{ $msg->role === 'user' ? 'bg-blue-500 text-white' : 'bg-gray-300 dark:bg-gray-700' }}">
                    @if ($msg->image_path)
                        <img src="{{ asset('storage/' . $msg->image_path) }}" class="mb-2 rounded">
                    @endif
                    {{ $msg->content }}
                </div>
            </div>
        @endforeach
    </main>

    <!-- Form -->
    <form id="chat-form" class="bg-white dark:bg-gray-800 p-4 flex flex-col sm:flex-row gap-2" enctype="multipart/form-data">
        <input type="text" id="user-message" name="message" class="flex-grow px-4 py-2 border border-gray-300 dark:border-gray-600 rounded" placeholder="Type your message...">
        <input type="file" id="image-upload" name="image" accept="image/*" class="hidden">
        <label for="image-upload" class="cursor-pointer px-4 py-2 bg-yellow-400 rounded text-white">📷</label>
        <button type="button" id="start-voice" class="bg-red-500 text-white px-4 py-2 rounded">🎤</button>
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Send</button>
    </form>

    <script>
        const chatForm = document.getElementById('chat-form');
        const chatBox = document.getElementById('chat-box');
        const messageInput = document.getElementById('user-message');

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(chatForm);

            const userText = formData.get('message');
            if (userText.trim() !== '') {
                const userMsg = document.createElement('div');
                userMsg.className = 'text-right';
                userMsg.innerHTML = `<div class='inline-block bg-blue-500 text-white px-4 py-2 rounded-lg max-w-md'>${userText}</div>`;
                chatBox.appendChild(userMsg);
                chatBox.scrollTop = chatBox.scrollHeight;
            }

            const response = await fetch('/chat', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });

            const data = await response.json();

            const botMsg = document.createElement('div');
            botMsg.className = 'text-left';
            botMsg.innerHTML = `<div class='inline-block bg-gray-300 dark:bg-gray-700 text-black dark:text-white px-4 py-2 rounded-lg max-w-md'>${data.reply}</div>`;
            chatBox.appendChild(botMsg);
            chatBox.scrollTop = chatBox.scrollHeight;

            messageInput.value = '';
        });

        // Voice Input
        document.getElementById('start-voice').addEventListener('click', () => {
            const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';
            recognition.start();
            recognition.onresult = function(event) {
                messageInput.value = event.results[0][0].transcript;
            };
        });



        //voice to text

    const voiceBtn = document.getElementById('start-voice');
    const messageInput = document.getElementById('user-message');

    voiceBtn.addEventListener('click', () => {
        const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US';
        recognition.start();

        recognition.onresult = function(event) {
            messageInput.value = event.results[0][0].transcript;
        };
    });



    </script>
</body>
</html>
