<x-app>
    

  <!-- Patients List -->
  <main class="p-6 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse ($appointments as $appointment)
          <!-- Patient Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-5 flex flex-col items-center">
          <img src="{{asset('storage/'. $appointment->patient_image)}}" class="w-24 h-24 rounded-full border-4 border-indigo-500" />
          <h2 class="mt-4 text-xl font-semibold">{{$appointment->patient_name}}</h2>
          
        </div>
      @empty
        <p>No confirmed appointments found.</p>
      @endforelse
    

    </div>
  </main>



</x-app>