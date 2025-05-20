<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Doctor Dashboard - Messages</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { darkMode: 'class' }
  </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 h-screen flex">

  <!-- Sidebar (Conversations) -->
  <aside class="w-1/4 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 p-4 overflow-y-auto">
    <h2 class="text-xl font-semibold mb-4">Messages</h2>
    <ul class="space-y-3">
      <li class="cursor-pointer p-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-800 bg-indigo-200 dark:bg-indigo-700">
        <div class="font-medium">Jane Doe</div>
        <p class="text-sm text-gray-600 dark:text-gray-400 truncate">Hi Doctor, I have a quick question...</p>
      </li>
      <li class="cursor-pointer p-3 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700">
        <div class="font-medium">John Smith</div>
        <p class="text-sm text-gray-600 dark:text-gray-400 truncate">Thanks for the consultation...</p>
      </li>
      <!-- More patients -->
    </ul>
  </aside>

  <!-- Chat Area -->
  <main class="flex-1 flex flex-col">
    <!-- Header -->
    <header class="p-4 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
      <div>
        <h3 class="text-lg font-semibold">Jane Doe</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400">Online</p>
      </div>
      <button id="darkToggle" class="px-3 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-white">
        Toggle Dark Mode
      </button>
    </header>

    <!-- Chat Messages -->
    <div class="flex-1 p-4 space-y-4 overflow-y-auto bg-gray-50 dark:bg-gray-900">
      <!-- Patient Message -->
      <div class="max-w-md bg-white dark:bg-gray-800 p-3 rounded-lg shadow self-start">
        <p>Hello doctor, I’m feeling some discomfort in my chest lately.</p>
        <span class="text-xs text-gray-500 dark:text-gray-400 block mt-1">10:12 AM</span>
      </div>
      <!-- Doctor Message -->
      <div class="max-w-md bg-indigo-600 text-white p-3 rounded-lg shadow self-end">
        <p>Thanks for reaching out, can you describe the pain more?</p>
        <span class="text-xs text-indigo-200 block mt-1">10:14 AM</span>
      </div>
      <!-- More messages -->
    </div>

    <!-- Input Box -->
    <footer class="p-4 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
      <form class="flex items-center space-x-3">
        <input type="text" placeholder="Type your message..." class="flex-1 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white" />
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
          Send
        </button>
      </form>
    </footer>
  </main>

  <script>
    document.getElementById('darkToggle').addEventListener('click', () => {
      document.documentElement.classList.toggle('dark');
    });
  </script>
</body>
</html>
