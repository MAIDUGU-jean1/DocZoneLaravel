<x-app>
    <!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Appointments</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

  <main class="container mx-auto px-4 sm:px-6 py-6">
    <div class="space-y-6">
      
      <!-- Card 1 -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center space-x-4">
          <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Jane Doe" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="font-semibold text-lg">Jane Doe</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Age: 29</p>
          </div>
        </div>
        <div class="text-sm mt-4 space-y-1">
          <p><strong>Date & Time:</strong> May 22, 2025 at 10:30 AM</p>
          <p><strong>Type:</strong> Video Consultation</p>
          <p>
            <strong>Status:</strong> 
            <span class="inline-block px-2 py-1 rounded-full bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-200 text-xs font-semibold">
              Confirmed
            </span>
          </p>
        </div>
        <div class="flex justify-end space-x-2 mt-4">
          <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1 rounded text-sm">Start</button>
          <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded text-sm">Cancel</button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center space-x-4">
          <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="John Smith" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="font-semibold text-lg">John Smith</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Age: 42</p>
          </div>
        </div>
        <div class="text-sm mt-4 space-y-1">
          <p><strong>Date & Time:</strong> May 22, 2025 at 2:00 PM</p>
          <p><strong>Type:</strong> In-Person Visit</p>
          <p>
            <strong>Status:</strong> 
            <span class="inline-block px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-200 text-xs font-semibold">
              Pending
            </span>
          </p>
        </div>
        <div class="flex justify-end space-x-2 mt-4">
          <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1 rounded text-sm">View</button>
          <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded text-sm">Cancel</button>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <div class="flex items-center space-x-4">
          <img src="https://randomuser.me/api/portraits/women/52.jpg" alt="Mary Johnson" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="font-semibold text-lg">Mary Johnson</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Age: 35</p>
          </div>
        </div>
        <div class="text-sm mt-4 space-y-1">
          <p><strong>Date & Time:</strong> May 23, 2025 at 9:00 AM</p>
          <p><strong>Type:</strong> Video Consultation</p>
          <p>
            <strong>Status:</strong> 
            <span class="inline-block px-2 py-1 rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 text-xs font-semibold">
              Completed
            </span>
          </p>
        </div>
        <div class="flex justify-end mt-4">
          <button class="bg-green-800 text-white px-4 py-1 rounded text-sm  cursor-not-allowed" disabled>
            Completed
          </button>
        </div>
      </div>

    </div>
  </main>

</body>
</html>

</x-app>