<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>AI Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <style>
        :root {
            --primary: #5D5CDE;
            --primary-dark: #4B4AB5;
            --secondary: #64748B;
            --accent: #0EA5E9;
            --user-bubble: #dcf8c6;
            --user-bubble-dark: #005c4b;
            --ai-bubble: #ffffff;
            --ai-bubble-dark: #222e35;
            --timestamp-color: #667781;
            --timestamp-color-dark: #8696a0;
        }

        body {
            background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%);
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
        }

        .dark body {
            background: linear-gradient(135deg, #111b21 0%, #0b141a 100%);
        }

        .message-container {
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 8px 0;
            padding: 0 24px;
            animation: messageAppear 0.3s ease-out;
            transform-origin: center top;
        }

        .message-bubble {
            position: relative;
            max-width: 75%;
            padding: 10px 14px;
            border-radius: 12px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
            word-break: break-word;
            transition: all 0.2s ease;
        }

        .message-bubble.user {
            background-color: var(--user-bubble);
            color: #303030;
            border-top-right-radius: 4px;
            margin-left: auto;
        }

        .dark .message-bubble.user {
            background-color: var(--user-bubble-dark);
            color: #e9edef;
        }

        .message-bubble.ai {
            background-color: var(--ai-bubble);
            color: #303030;
            border-top-left-radius: 4px;
            margin-right: auto;
        }

        .dark .message-bubble.ai {
            background-color: var(--ai-bubble-dark);
            color: #e9edef;
        }

        .message-bubble::before {
            content: '';
            position: absolute;
            top: 0;
            width: 12px;
            height: 12px;
            background: inherit;
        }

        .message-bubble.user::before {
            right: -6px;
            border-bottom-left-radius: 16px;
        }

        .message-bubble.ai::before {
            left: -6px;
            border-bottom-right-radius: 16px;
        }

        .message-actions {
            position: absolute;
            top: -8px;
            opacity: 0;
            transition: opacity 0.2s ease;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .dark .message-actions {
            background-color: rgba(42, 57, 66, 0.9);
        }

        .message-container:hover .message-actions {
            opacity: 1;
        }

        .message-container.user .message-actions {
            right: 20px;
        }

        .message-container.ai .message-actions {
            left: 20px;
        }

        .action-button {
            border: none;
            background: transparent;
            padding: 5px 8px;
            cursor: pointer;
            color: var(--secondary);
            border-radius: 20px;
            transition: background-color 0.2s ease;
        }

        .action-button:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .dark .action-button {
            color: #8696a0;
        }

        .dark .action-button:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .action-button.delete:hover {
            color: #ef4444;
        }

        .timestamp {
            font-size: 11px;
            padding-top: 4px;
            margin-left: auto;
            margin-right: 4px;
            color: var(--timestamp-color);
            display: inline-block;
            margin-top: 2px;
        }

        .message-container.ai .timestamp {
            margin-left: 4px;
            margin-right: auto;
        }

        .dark .timestamp {
            color: var(--timestamp-color-dark);
        }

        .typing-container {
            display: flex;
            margin: 8px 0;
            padding: 0 16px;
        }

        .typing-indicator {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 8px 12px;
            background-color: var(--ai-bubble);
            border-radius: 8px;
            border-top-left-radius: 0;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
            margin-right: auto;
            position: relative;
        }

        .typing-indicator::before {
            content: '';
            position: absolute;
            top: 0;
            left: -6px;
            width: 12px;
            height: 12px;
            background: inherit;
            border-bottom-right-radius: 16px;
        }

        .dark .typing-indicator {
            background-color: var(--ai-bubble-dark);
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            background: var(--secondary);
            border-radius: 50%;
            animation: typingAnimation 1.4s infinite ease-in-out;
        }

        .typing-dot:nth-child(1) { animation-delay: 0s; }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typingAnimation {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-4px); }
        }

        @keyframes messageAppear {
            0% { transform: scale(0.96); opacity: 0; }  
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dark .glass-effect {
            background: rgba(30, 41, 59, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .button-hover {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .button-hover:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button-hover:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .custom-scrollbar {
            scroll-behavior: smooth;
            overscroll-behavior-y: contain;
            scrollbar-width: thin;
            scrollbar-color: var(--secondary) transparent;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: var(--secondary);
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        .unread-indicator {
            position: fixed;
            bottom: 100px;
            right: 30px;
            background-color: var(--primary);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 100;
        }

        .unread-indicator.visible {
            opacity: 1;
            transform: scale(1);
        }

        .message-input {
            transition: all 0.3s ease;
        }

        .message-input:focus {
            border-color: var(--primary);
        }

        .message-input-container {
            position: relative;
        }

        .input-placeholder {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .message-input:focus + .input-placeholder,
        .message-input:not(:placeholder-shown) + .input-placeholder {
            opacity: 0;
        }

        .emoji-button {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: var(--secondary);
            cursor: pointer;
            z-index: 2;
            transition: all 0.2s ease;
        }

        .emoji-button:hover {
            color: var(--primary);
        }

        .hidden-message {
            height: 0;
            margin: 0;
            padding: 0;
            opacity: 0;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .swipe-delete {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .swipe-delete.swiped {
            transform: translateX(100%);
            opacity: 0;
        }

        .ai-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 8px;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .message-with-avatar {
            display: flex;
            align-items: flex-start;
        }

        .message-content-wrapper {
            display: flex;
            flex-direction: column;
        }

        .send-button {
            background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
            transition: all 0.3s ease;
        }

        .send-button:hover:not(:disabled) {
            background: linear-gradient(135deg, #00d2ff 0%, #0082ff 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 114, 255, 0.2);
        }

        .send-button:disabled {
            background: linear-gradient(135deg, #b3e0ff 0%, #99c2ff 100%);
            cursor: not-allowed;
        }

        .header-content {
            padding: 0 16px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .dark .header-content {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .chat-container {
            max-width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .message-date {
            text-align: center;
            margin: 16px 0;
            font-size: 12px;
            color: var(--secondary);
            position: relative;
        }

        .message-date::before,
        .message-date::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: rgba(0, 0, 0, 0.1);
        }

        .message-date::before {
            left: 0;
        }

        .message-date::after {
            right: 0;
        }

        .dark .message-date::before,
        .dark .message-date::after {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="h-screen flex flex-col transition-colors duration-300">
    <!-- Header -->
    <header class="glass-effect sticky top-0 z-10">
        <div class="header-content">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-indigo-600 flex items-center justify-center text-white shadow-lg">
                        <img src="{{asset('Images/DZ ai.png')}}" alt="">
                    </div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full ring-2 ring-white dark:ring-gray-800"></div>
                </div>
                <div>
                    <h1 class=" font-semibold text-blue-800">DocZone Assistant</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-300">Online</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors button-hover">
                    <i class="fas fa-moon dark:hidden text-gray-600 text-lg"></i>
                    <i class="fas fa-sun hidden dark:block text-yellow-400 text-lg"></i>
                </button>
                <button id="clear-chat" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors button-hover">
                    <i class="fas fa-trash text-gray-600 dark:text-gray-300 text-lg"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Chat Box -->
    <main id="chat-box" class="flex-1 overflow-y-auto py-4 custom-scrollbar">
        <div class="chat-container">
            <div class="message-date">
                Today
            </div>
            @foreach($messages as $msg)
                <div class="message-container {{ $msg->role === 'user' ? 'user' : 'ai' }}" data-id="{{ $msg->role }}-{{ $loop->index }}">
                    <div class="message-actions">
                        <button class="action-button delete" aria-label="Delete message">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    @if($msg->role === 'ai')
                        <div class="message-with-avatar">
                            <div class="ai-avatar">
                                <img src="{{asset('Images/DZ ai.png')}}" alt="">
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message-bubble ai">
                                    @if ($msg->image_path)
                                        <img src="{{ asset('storage/' . $msg->image_path) }}" class="mb-2 rounded-lg max-w-full h-auto" />
                                    @endif
                                    {{ $msg->content }}
                                </div>
                                <div class="timestamp">{{ $msg->created_at->format('h:i A') }}</div>
                            </div>
                        </div>
                    @else
                        <div class="message-content-wrapper">
                            <div class="message-bubble user">
                                @if ($msg->image_path)
                                    <img src="{{ asset('storage/' . $msg->image_path) }}" class="mb-2 rounded-lg max-w-full h-auto" />
                                @endif
                                {{ $msg->content }}
                            </div>
                            <div class="timestamp">{{ $msg->created_at->format('h:i A') }}</div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </main>

    <!-- Unread messages indicator -->
    <div id="unread-indicator" class="unread-indicator">
        <i class="fas fa-chevron-down"></i>
    </div>

    <!-- Input Form -->
    <form id="chat-form" class="glass-effect p-3 shadow-lg">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-grow flex items-center gap-2 relative">
                <div class="flex-grow relative">
                    <input type="text" id="user-message" name="message" 
                        class="message-input w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white transition-colors text-base pr-10" 
                        placeholder=" " autocomplete="off" />
                    <span class="input-placeholder">Type a message</span>
                    <button type="button" class="emoji-button">
                        <i class="far fa-smile"></i>
                    </button>
                </div>
                <div class="flex gap-1">
                    <input type="file" id="image-upload" name="image" accept="image/*" class="hidden" />
                    <label for="image-upload" class="cursor-pointer p-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-full text-gray-600 dark:text-gray-300 transition-colors button-hover">
                        <i class="fas fa-image"></i>
                    </label>
                    <button type="button" id="start-voice" class="p-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-full text-gray-600 dark:text-gray-300 transition-colors button-hover">
                        <i class="fas fa-microphone"></i>
                    </button>
                </div>
            </div>
            <button type="submit" id="send-button" class="send-button text-white p-3 rounded-full transition-colors button-hover disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </form>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
        });

        const chatForm = document.getElementById('chat-form');
        const chatBox = document.getElementById('chat-box');
        const messageInput = document.getElementById('user-message');
        const sendButton = document.getElementById('send-button');
        const unreadIndicator = document.getElementById('unread-indicator');
        const clearChatButton = document.getElementById('clear-chat');

        // Keep track of messages for deletion
        let messageCounter = {{ count($messages) }};
        let isScrolledToBottom = true;
        let isTyping = false;

        // Enable/disable send button based on input
        messageInput.addEventListener('input', () => {
            sendButton.disabled = messageInput.value.trim() === '';
        });

        // Get the current time formatted as HH:MM AM/PM
        function getCurrentTime() {
            const now = new Date();
            return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

        // Auto-scroll to bottom when new content is added
        function scrollToBottom(force = false) {
            if (isScrolledToBottom || force) {
                chatBox.scrollTo({
                    top: chatBox.scrollHeight,
                    behavior: 'smooth'
                });
            }
        }

        // Check if scrolled to bottom
        chatBox.addEventListener('scroll', () => {
            const scrollPosition = chatBox.scrollHeight - chatBox.scrollTop - chatBox.clientHeight;
            isScrolledToBottom = scrollPosition < 50;
            
            if (isScrolledToBottom) {
                unreadIndicator.classList.remove('visible');
            }
        });

        // Unread indicator click
        unreadIndicator.addEventListener('click', () => {
            scrollToBottom(true);
            unreadIndicator.classList.remove('visible');
        });

        // Delete message functionality
        document.addEventListener('click', (e) => {
            if (e.target.closest('.action-button.delete')) {
                const messageContainer = e.target.closest('.message-container');
                deleteMessage(messageContainer);
            }
        });

        function deleteMessage(messageElement) {
            // Add swipe animation
            messageElement.classList.add('swipe-delete', 'swiped');
            
            // After animation completes, remove the element
            setTimeout(() => {
                messageElement.remove();
            }, 300);
        }

        // Create user message element
        function createUserMessage(text, withImage = null) {
            const messageId = `user-${messageCounter++}`;
            const container = document.createElement('div');
            container.className = 'message-container user';
            container.dataset.id = messageId;
            
            let messageContent = text;
            if (withImage) {
                messageContent = `<img src="${withImage}" class="mb-2 rounded-lg max-w-full h-auto" />${text ? text : ''}`;
            }
            
            container.innerHTML = `
                <div class="message-actions">
                    <button class="action-button delete" aria-label="Delete message">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                <div class="message-content-wrapper">
                    <div class="message-bubble user">
                        ${messageContent}
                    </div>
                    <div class="timestamp">${getCurrentTime()}</div>
                </div>
            `;
            
            return container;
        }

        // Create AI message element
        function createAIMessage(text, isError = false) {
            const messageId = `ai-${messageCounter++}`;
            const container = document.createElement('div');
            container.className = 'message-container ai';
            container.dataset.id = messageId;
            
            container.innerHTML = `
                <div class="message-actions">
                    <button class="action-button delete" aria-label="Delete message">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                <div class="message-with-avatar">
                    <div class="ai-avatar">
                        <img src="{{asset('Images/DZ ai.png')}}" alt="">
                    </div>
                    <div class="message-content-wrapper">
                        <div class="message-bubble ai${isError ? ' bg-red-100 dark:bg-red-900' : ''}">
                            ${text}
                        </div>
                        <div class="timestamp">${getCurrentTime()}</div>
                    </div>
                </div>
            `;
            
            return container;
        }

        // Create typing indicator
        function createTypingIndicator() {
            const container = document.createElement('div');
            container.className = 'typing-container';
            container.id = 'typing-indicator';
            
            container.innerHTML = `
                <div class="message-with-avatar">
                    <div class="ai-avatar">
                       <img src="{{asset('Images/Doczone.png')}}" alt="">
                    </div>
                    <div class="typing-indicator">
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                    </div>
                </div>
            `;
            
            return container;
        }

        // Show unread indicator if not at bottom
        function showUnreadIndicator() {
            if (!isScrolledToBottom) {
                unreadIndicator.classList.add('visible');
            }
        }

        // Clear all messages
        clearChatButton.addEventListener('click', () => {
            // Keep only the welcome message
            const messages = chatBox.querySelectorAll('.message-container');
            messages.forEach((msg, index) => {
                if (index > 0) { // Keep the first welcome message
                    deleteMessage(msg);
                }
            });
        });

        // Handle form submission
        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const userText = messageInput.value.trim();
            const imageInput = document.getElementById('image-upload');
            const imageFile = imageInput.files[0];
            
            if (!userText && !imageFile) return;
            
            // Clear input
            messageInput.value = '';
            sendButton.disabled = true;
            
            let userImageUrl = null;
            
            // If image is selected, create preview URL
            if (imageFile) {
                userImageUrl = URL.createObjectURL(imageFile);
                imageInput.value = ''; // Clear the file input
            }
            
            // Add user message to chat
            const userMsg = createUserMessage(userText, userImageUrl);
            chatBox.appendChild(userMsg);
            scrollToBottom();
            
            // Show typing indicator
            if (!isTyping) {
                isTyping = true;
                const typingIndicator = createTypingIndicator();
                chatBox.appendChild(typingIndicator);
                scrollToBottom();
            }
            
            // Create form data for submission
            const formData = new FormData();
            if (userText) formData.append('message', userText);
            if (imageFile) formData.append('image', imageFile);
            
            try {
                const response = await fetch('/chat', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                });

                const data = await response.json();
                
                // Remove typing indicator
                const indicator = document.getElementById('typing-indicator');
                if (indicator) indicator.remove();
                isTyping = false;
                
                // Add AI response with word-by-word animation
                const words = data.reply.split(' ');
                const aiMsg = createAIMessage('');
                chatBox.appendChild(aiMsg);
                scrollToBottom();
                showUnreadIndicator();
                
                const messageBubble = aiMsg.querySelector('.message-bubble');
                let displayedText = '';
                
                // Animate text appearance word by word
                for (let i = 0; i < words.length; i++) {
                    await new Promise(resolve => setTimeout(resolve, 80 + Math.random() * 50));
                    displayedText += (i > 0 ? ' ' : '') + words[i];
                    messageBubble.textContent = displayedText;
                    scrollToBottom();
                }
                
            } catch (error) {
                console.error('Error:', error);
                
                // Remove typing indicator
                const indicator = document.getElementById('typing-indicator');
                if (indicator) indicator.remove();
                isTyping = false;
                
                // Show error message
                const errorMsg = createAIMessage('Sorry, something went wrong. Please try again.', true);
                chatBox.appendChild(errorMsg);
                scrollToBottom();
                showUnreadIndicator();
            }
        });

        // Voice Input
        document.getElementById('start-voice').addEventListener('click', () => {
            const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';
            recognition.start();
            
            const voiceButton = document.getElementById('start-voice');
            voiceButton.classList.add('animate-pulse');
            
            recognition.onresult = function(event) {
                messageInput.value = event.results[0][0].transcript;
                voiceButton.classList.remove('animate-pulse');
                // Enable send button when voice input is received
                sendButton.disabled = messageInput.value.trim() === '';
            };
            
            recognition.onerror = function() {
                voiceButton.classList.remove('animate-pulse');
            };
        });

        // Image Preview
        document.getElementById('image-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Enable send button when image is selected
                sendButton.disabled = false;
            }
        });

        // Add touch swipe to delete messages
        let touchStartX = 0;
        let touchEndX = 0;
        const minSwipeDistance = 100;

        document.addEventListener('touchstart', e => {
            const messageElem = e.target.closest('.message-container');
            if (messageElem) {
                touchStartX = e.changedTouches[0].screenX;
            }
        }, false);

        document.addEventListener('touchend', e => {
            const messageElem = e.target.closest('.message-container');
            if (messageElem) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe(messageElem);
            }
        }, false);

        function handleSwipe(messageElem) {
            const swipeDistance = touchEndX - touchStartX;
            // For user messages (swipe left)
            if (messageElem.classList.contains('user') && swipeDistance < -minSwipeDistance) {
                deleteMessage(messageElem);
            } 
            // For AI messages (swipe right)
            else if (messageElem.classList.contains('ai') && swipeDistance > minSwipeDistance) {
                deleteMessage(messageElem);
            }
        }

        // Initial scroll to bottom
        scrollToBottom(true);
    </script>
</body>
</html>