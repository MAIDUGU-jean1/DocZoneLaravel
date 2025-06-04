<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chat App</title>

  <!-- Remix Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" />

  <!-- Alpine.js -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen bg-gray-100">

  <div class="flex h-full w-full">

    <!-- Sidebar: Chat List -->
    <aside class="w-full max-w-xs bg-white border-r flex flex-col">
      <div class="p-4 border-b">
        <h2 class="text-xl font-bold">Chats</h2>
      </div>
      <div class="flex-1 overflow-y-auto">
        <!-- Livewire Chat List -->
        <livewire:chat.chatlist />
      </div>
    </aside>

    <!-- Main Chat Section -->
    <main class="flex-1 flex flex-col bg-white shadow-md">

      <!-- Chat Header -->
      <div class="p-4 border-b flex items-center gap-3 bg-white">
        <img src="https://i.pravatar.cc/40?img=1" alt="User" class="w-10 h-10 rounded-full object-cover">
        <h2 class="text-lg font-semibold">Alice</h2>
      </div>

      <!-- Chat Messages -->
      <div class="flex-1 overflow-y-auto p-4 bg-gray-50 space-y-4">
        <!-- Livewire Chat Box -->
        <livewire:chat.chatbox />
      </div>

      <!-- Input Area -->
      <div class="p-4 border-t bg-white">
        <form class="flex items-center gap-2">
          <input
            type="text"
            placeholder="Type your message..."
            class="flex-1 px-4 py-2 border rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
          />
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 shadow">
            <i class="ri-send-plane-2-line text-lg"></i>
          </button>
        </form>
      </div>

    </main>
  </div>

</body>
</html>

