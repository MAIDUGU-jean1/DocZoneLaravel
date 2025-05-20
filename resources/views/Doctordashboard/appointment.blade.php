<x-app>
    <main class="container mx-auto p-6 flex-grow">
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm">
        <thead class="bg-indigo-600 text-white dark:bg-indigo-700">
          <tr>
            <th class="p-3 text-left">Patient</th>
            <th class="p-3 text-left">Date & Time</th>
            <th class="p-3 text-left">Consultation Type</th>
            <th class="p-3 text-left">Status</th>
            <th class="p-3 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
          <!-- Appointment 1 -->
          <tr>
            <td class="p-3 flex items-center space-x-3">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Patient Jane Doe" class="w-10 h-10 rounded-full object-cover" />
              <div>
                <p class="font-semibold">Jane Doe</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Age: 29</p>
              </div>
            </td>
            <td class="p-3">May 22, 2025 <br /> 10:30 AM</td>
            <td class="p-3">Video Consultation</td>
            <td class="p-3">
              <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-200 text-sm font-semibold">
                Confirmed
              </span>
            </td>
            <td class="p-3 text-center space-x-2">
              <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm">
                Start
              </button>
              <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                Cancel
              </button>
            </td>
          </tr>

          <!-- Appointment 2 -->
          <tr>
            <td class="p-3 flex items-center space-x-3">
              <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Patient John Smith" class="w-10 h-10 rounded-full object-cover" />
              <div>
                <p class="font-semibold">John Smith</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Age: 42</p>
              </div>
            </td>
            <td class="p-3">May 22, 2025 <br /> 2:00 PM</td>
            <td class="p-3">In-Person Visit</td>
            <td class="p-3">
              <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-200 text-xsm font-semibold">
                Pending
              </span>
            </td>
            <td class="p-3 text-center space-x-2">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-xsm">
                view
              </button>
              <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                Cancel
              </button>
            </td>
          </tr>

          <!-- Appointment 3 -->
          <tr>
            <td class="p-3 flex items-center space-x-3">
              <img src="https://randomuser.me/api/portraits/women/52.jpg" alt="Patient Mary Johnson" class="w-10 h-10 rounded-full object-cover" />
              <div>
                <p class="font-semibold">Mary Johnson</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Age: 35</p>
              </div>
            </td>
            <td class="p-3">May 23, 2025 <br /> 9:00 AM</td>
            <td class="p-3">Video Consultation</td>
            <td class="p-3">
              <span class="inline-block px-3 py-1 rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 text-sm font-semibold">
                Completed
              </span>
            </td>
            <td class="p-3 text-center space-x-2">
              <button class="bg-gray-600 cursor-not-allowed text-white px-3 py-1 rounded text-xsm opacity-50" disabled>
                Completed
              </button>
            </td>
          </tr>

          <!-- More appointments can be added here -->
        </tbody>
      </table>
    </div>
  </main>
</x-app>