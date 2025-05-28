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
     @forelse ($appointments as $appointment)
<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
  <div class="flex items-center space-x-4">
    <img src="{{ asset('storage/' . $appointment->patient_image) }}" alt="Patient Image"
         class="w-12 h-12 rounded-full object-cover" />
    <div>
      <p class="font-semibold text-lg">{{ $appointment->patient_name }}</p>
    </div>
  </div>

  <div class="text-sm mt-4 space-y-1">
    <p><strong>Date & Time:</strong> {{ $appointment->appointment_date }} at {{ $appointment->appointment_time }}</p>
    <p><strong>Type:</strong> {{ ucfirst($appointment->type) }} Consultation</p>
    <p>
      <strong>Status:</strong>
      <span class="inline-block px-2 py-1 rounded-full
          {{ $appointment->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}
          dark:bg-green-700 dark:text-green-200 text-xs font-semibold">
        {{ ucfirst($appointment->status) }}
      </span>
    </p>
  </div>

  <div class="flex justify-end space-x-2 mt-4">
    @if ($appointment->status === 'pending')
      <form action="{{ route('appointments.confirm', $appointment->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
          Confirm
        </button>
      </form>
    @elseif ($appointment->status === 'confirmed')
      <button class="bg-green-600 text-white px-3 py-1 rounded">
        Start
      </button>
    @endif

    <form action="" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded text-sm">
        Cancel
      </button>
    </form>
  </div>
</div>
@empty
  <p class="text-gray-500">No appointments available.</p>
@endforelse


    </div>
  </main>

</body>
</html>

</x-app>