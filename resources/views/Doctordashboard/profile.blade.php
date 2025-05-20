<x-app>
  <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center p-4 sm:p-6">

    <div class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 sm:p-8">
      <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-6 sm:space-y-0 sm:space-x-6">
        <!-- Profile Picture -->
        <img src="{{ asset('Images/A woman in a white lab coat is standing in a room with a bottle of liquid _ Premium AI-generated image.jpeg') }}"
             alt="Dr. John Doe"
             class="w-28 h-28 sm:w-32 sm:h-32 rounded-full object-cover shadow-lg" />

        <!-- Doctor Info -->
        <div class="text-center sm:text-left">
          <h1 class="text-2xl sm:text-3xl font-bold">Dr. John Doe</h1>
          <p class="text-blue-600 dark:text-blue-400 text-lg sm:text-xl mt-1">Cardiologist</p>
          <p class="mt-2 text-gray-600 dark:text-gray-300">
            Experienced cardiologist with over 10 years helping patients maintain heart health and improve their quality of life.
          </p>

          <!-- Action Buttons -->
          <div class="mt-4 flex flex-col sm:flex-row justify-center sm:justify-start gap-3">
            <a href="tel:+1234567890"
               class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded shadow inline-flex items-center justify-center space-x-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 5h2l3 7-1 2-4 1v2l4-1 2 1 7-3v-2l-1-2-7 3-3-7z" />
              </svg>
              <span>Call</span>
            </a>
            <a href="mailto:john.doe@example.com"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow inline-flex items-center justify-center space-x-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 12v.01M8 12v.01M12 12v.01M8 16h8a2 2 0 002-2V8a2 2 0 00-2-2H8a2 2 0 00-2 2v6a2 2 0 002 2z" />
              </svg>
              <span>Message</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Divider -->
      <hr class="my-6 border-gray-300 dark:border-gray-700" />

      <!-- Specialties -->
      <div>
        <h2 class="text-xl sm:text-2xl font-semibold mb-4">Specialties</h2>
        <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
          <li>Heart Disease Treatment</li>
          <li>Arrhythmia Management</li>
          <li>Hypertension Control</li>
          <li>Cardiac Rehabilitation</li>
          <li>Preventive Cardiology</li>
        </ul>
      </div>
    </div>

  </body>
</x-app>
