<x-app>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Appointment Booking</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div x-data="{ showForm: false }" class="relative z-10">

    <!-- Trigger Button -->
    <button 
      @click="showForm = true"
      class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl font-semibold transition">
      Book Appointment with Dr. John Smith
    </button>

    <!-- Full Screen Modal -->
    <div 
      x-show="showForm"
      x-transition
      class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center overflow-auto p-6"
      style="display: none;"
    >
      <!-- Close Button -->
      <button 
        @click="showForm = false"
        class="absolute top-4 right-4 text-gray-600 hover:text-red-500 text-3xl font-bold focus:outline-none"
        aria-label="Close">
        &times;
      </button>

      <!-- Appointment Form -->
      <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-3xl font-bold mb-6 text-center text-teal-600">Book Appointment with Dr. John Smith</h2>

        <form action="/appointments" method="POST" class="space-y-5">
          <input type="hidden" name="doctor_id" value="1" />
          <input type="hidden" name="doctor_name" value="Dr. John Smith" />

          <div>
            <label class="block font-medium text-gray-700 mb-1">Doctor</label>
            <div class="px-4 py-2 bg-gray-100 rounded-xl border border-gray-200 text-gray-700">
              Dr. John Smith - Cardiologist
            </div>
          </div>

          <div>
            <label for="patientName" class="block font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" id="patientName" name="patient_name" required
              class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400" />
          </div>

          <div>
            <label for="email" class="block font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" required
              class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400" />
          </div>

          <div>
            <label for="phone" class="block font-medium text-gray-700 mb-1">Phone Number</label>
            <input type="tel" id="phone" name="phone" required
              class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400" />
          </div>

          <div>
            <label for="date" class="block font-medium text-gray-700 mb-1">Appointment Date</label>
            <input type="date" id="date" name="date" required
              class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400" />
          </div>

          <div>
            <label for="time" class="block font-medium text-gray-700 mb-1">Preferred Time</label>
            <input type="time" id="time" name="time" required
              class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400" />
          </div>

          <div>
            <label for="notes" class="block font-medium text-gray-700 mb-1">Reason or Notes</label>
            <textarea id="notes" name="notes" rows="4"
              class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400"
              placeholder="Briefly describe symptoms or concerns..."></textarea>
          </div>

          <div class="flex justify-end">
            <button type="submit"
              class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-6 rounded-xl transition duration-200">
              Confirm Appointment
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>

</body>
</html>

</x-app>