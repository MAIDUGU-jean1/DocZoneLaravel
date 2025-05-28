  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- Booking Page Layout -->
<div class="min-h-screen bg-blue-100 flex flex-col">
    <!-- Hero Section -->
    <div class="relative h-[40vh] bg-cover bg-center" style="background-image: url('/images/booking-hero.jpg');">
        <div class="absolute inset-0 bg-blue-600 bg-opacity-80 flex items-center justify-center">
            <h1 class="text-white text-4xl md:text-5xl font-bold animate-fade-in-up">Book Your Doctor</h1>
        </div>
    </div>

    <!-- Booking Card -->
    <div class="max-w-4xl mx-auto -mt-20 z-10 p-6">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:flex gap-6 transition-all duration-300 ease-in-out hover:scale-[1.01]">
            <!-- Doctor Info -->
            <div class="md:w-1/2 flex flex-col items-center text-center md:text-left">
                <img src="{{asset('storage/' .$doctor->profile_picture)}}"
                     alt="Doctor"
                     class="w-32 h-32 rounded-full border-4 border-blue-500 shadow-md mb-4 animate-fade-in" />
                <h2 class="text-2xl font-bold text-gray-800 truncate">Dr.  {{$doctor->name}}</h2>
                <p class="text-blue-500 font-medium mb-2">{{$doctor->specialization}}</p>
                <p class="text-gray-600 text-sm text-center">Compassionate care with professional excellence.</p>
            </div>

            <!-- Booking Form -->
            <div class="md:w-1/2 mt-6 md:mt-0 animate-fade-in-up">
                <form method="POST" action="{{route('confirmBook')}}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input disabled type="text" name="patient_name" value="{{$patient}}"
                            class="mt-1 block w-full rounded-md  shadow-sm p-2 focus:ring-blue-500 outline-none border-blue-500 border-2 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="appointment_date" required
                            class="mt-1 block w-full rounded-md shadow-sm outline-none border-blue-500 border-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="appointment_type" class="block text-sm font-medium text-gray-700 mb-1">
                            Appointment Type
                        </label>
                        <select name="appointment_type" id="appointment_type"
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="calls">Calls</option>
                            <option value="messages">Messages</option>
                            <option value="in-person">In-person</option>
                            <option value="video-call">Video Call</option>
                        </select>
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700">Time</label>
                        <input type="time" name="appointment_time" required
                            class="mt-1 block w-full rounded-md outline-none border-blue-500 border-2 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 shadow hover:shadow-lg">
                            Confirm Booking
                       </button>
                   
                </form>
            </div>
        </div>
    </div>

    <!-- Optional Section: Why Book with Us -->
<div class="mt-20 px-6 text-center pb-10">
    <h3 class="text-2xl font-bold mb-4">Why Choose Our Doctors?</h3>
    <div class="flex flex-col md:flex-row justify-center gap-6 text-gray-700">
        
        <!-- Certified Doctors -->
        <div class="w-full md:w-1/3 p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-blue-600 text-4xl mb-4">
                <i class="fas fa-user-md"></i>
            </div>
            <p class="text-base font-medium">Certified professionals with years of experience.</p>
        </div>

        <!-- Virtual Appointments -->
        <div class="w-full md:w-1/3 p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-blue-600 text-4xl mb-4">
                <i class="fas fa-video"></i>
            </div>
            <p class="text-base font-medium">Easy virtual appointments from anywhere.</p>
        </div>

        <!-- 24/7 Support -->
        <div class="w-full md:w-1/3 p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="text-blue-600 text-4xl mb-4">
                <i class="fas fa-headset"></i>
            </div>
            <p class="text-base font-medium">24/7 support and follow-up care.</p>
        </div>
        
    </div>
</div>

</div>
<script>
    // tailwind.config.js
module.exports = {
  theme: {
    extend: {
      animation: {
        'fade-in': 'fadeIn 0.5s ease-out forwards',
        'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
      },
      keyframes: {
        fadeIn: {
          from: { opacity: '0' },
          to: { opacity: '1' }
        },
        fadeInUp: {
          from: { opacity: '0', transform: 'translateY(20px)' },
          to: { opacity: '1', transform: 'translateY(0)' }
        }
      }
    }
  }
}

</script>