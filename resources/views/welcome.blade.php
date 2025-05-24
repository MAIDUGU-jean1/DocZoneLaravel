<<<<<<< HEAD
<div id="appointmentsModal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="modal-content bg-white dark:bg-dark-card w-full max-w-4xl rounded-lg shadow-xl p-6 mx-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">My Appointments</h3>
            <button class="close-modal text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Appointment Tabs -->
        <div class="border-b border-gray-200 dark:border-gray-700 mb-6">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <button
                        class="appointment-tab active inline-block py-2 px-4 font-medium text-primary border-b-2 border-primary"
                        data-tab="upcoming">Upcoming Appointments</button>
                </li>
                <li class="mr-2">
                    <button
                        class="appointment-tab inline-block py-2 px-4 font-medium text-gray-500 dark:text-gray-400 border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                        data-tab="past">Past Appointments</button>
                </li>
            </ul>
        </div>

        <!-- Upcoming Appointments -->
        <div class="appointment-content" id="upcomingAppointments">
            <div class="overflow-hidden shadow sm:rounded-md">
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Appointment 1 -->
                    <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                    alt="Dr. Marcus Johnson" class="w-12 h-12 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-gray-900 dark:text-white">Dr. Marcus Johnson</h4>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Cardiology</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900 dark:text-white">Today, 2:30 PM</p>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Confirmed
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-gray-100 dark:border-gray-800 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Appointment Type</p>
                                    <p class="font-medium text-gray-900 dark:text-white">Video Consultation</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Duration</p>
                                    <p class="font-medium text-gray-900 dark:text-white">30 minutes</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button
                                class="px-3 py-1.5 bg-primary text-white text-sm rounded hover:bg-opacity-90 transition-colors">
                                <i class="fas fa-video mr-1"></i> Join Now
                            </button>
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Reschedule
                            </button>
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-red-600 dark:text-red-400 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Cancel
                            </button>
                        </div>
                    </li>

                    <!-- Appointment 2 -->
                    <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="Dr. Olivia Williams" class="w-12 h-12 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-gray-900 dark:text-white">Dr. Olivia Williams</h4>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Pediatrics</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900 dark:text-white">Tomorrow, 10:00 AM</p>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    Scheduled
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-gray-100 dark:border-gray-800 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Appointment Type</p>
                                    <p class="font-medium text-gray-900 dark:text-white">Follow-up Visit</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Duration</p>
                                    <p class="font-medium text-gray-900 dark:text-white">45 minutes</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <i class="fas fa-bell mr-1"></i> Set Reminder
                            </button>
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Reschedule
                            </button>
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-red-600 dark:text-red-400 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Cancel
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Past Appointments -->
        <div class="appointment-content hidden" id="pastAppointments">
            <div class="overflow-hidden shadow sm:rounded-md">
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Past Appointment 1 -->
                    <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="Dr. Jasmine Carter" class="w-12 h-12 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-gray-900 dark:text-white">Dr. Jasmine Carter</h4>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Dermatology</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900 dark:text-white">May 15, 2023</p>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    Completed
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-gray-100 dark:border-gray-800 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Appointment Type</p>
                                    <p class="font-medium text-gray-900 dark:text-white">Skin Consultation</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Duration</p>
                                    <p class="font-medium text-gray-900 dark:text-white">30 minutes</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button
                                class="px-3 py-1.5 bg-primary text-white text-sm rounded hover:bg-opacity-90 transition-colors">
                                <i class="fas fa-file-medical-alt mr-1"></i> View Summary
                            </button>
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Book Again
                            </button>
                        </div>
                    </li>

                    <!-- Past Appointment 2 -->
                    <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                    alt="Dr. Marcus Johnson" class="w-12 h-12 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-gray-900 dark:text-white">Dr. Marcus Johnson</h4>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Cardiology</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900 dark:text-white">April 30, 2023</p>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    Completed
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-gray-100 dark:border-gray-800 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Appointment Type</p>
                                    <p class="font-medium text-gray-900 dark:text-white">Heart Checkup</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Duration</p>
                                    <p class="font-medium text-gray-900 dark:text-white">45 minutes</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button
                                class="px-3 py-1.5 bg-primary text-white text-sm rounded hover:bg-opacity-90 transition-colors">
                                <i class="fas fa-file-medical-alt mr-1"></i> View Summary
                            </button>
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Book Again
                            </button>
                        </div>
                    </li>

                    <!-- Past Appointment 3 -->
                    <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="Dr. Olivia Williams" class="w-12 h-12 rounded-full object-cover">
                                <div class="ml-4">
                                    <h4 class="font-medium text-gray-900 dark:text-white">Dr. Olivia Williams</h4>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Pediatrics</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-gray-900 dark:text-white">April 10, 2023</p>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    Completed
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-gray-100 dark:border-gray-800 pt-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Appointment Type</p>
                                    <p class="font-medium text-gray-900 dark:text-white">Initial Consultation</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400">Duration</p>
                                    <p class="font-medium text-gray-900 dark:text-white">60 minutes</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <button
                                class="px-3 py-1.5 bg-primary text-white text-sm rounded hover:bg-opacity-90 transition-colors">
                                <i class="fas fa-file-medical-alt mr-1"></i> View Summary
                            </button>
                            <button
                                class="px-3 py-1.5 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Book Again
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-6 text-center">
            <button class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition-colors">
                <i class="fas fa-plus mr-1"></i> Schedule New Appointment
            </button>
        </div>
    </div>
</div>
=======
<x-app>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Doctor Application</title>
  <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
  <script>
    (function(){
      emailjs.init("YOUR_PUBLIC_KEY"); // Replace with your EmailJS Public Key
    })();
  </script>
  <link rel="stylesheet" href="output.css" />
</head>
<body class="bg-gray-50">


<button id="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-full">
  Schedule New Appointment
</button>


<!-- Modal Background & Container -->
<div id="doctorModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-2xl shadow-xl max-h-screen overflow-y-auto w-full max-w-4xl p-4 relative">
    <!-- Close Button -->
    <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>

    <!-- Your Section Goes Here -->
    <section class="py-4 px-2 sm:px-4 lg:px-6">
      <!-- Keep your form code here (you pasted it in your message) -->
      
    <div class="max-w-4xl mx-auto">
      <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Apply to Join as a Doctor</h2>

      <!-- Success Alert -->
      <div id="success-message" class="hidden mb-6 rounded-xl p-4 bg-green-100 text-green-800 text-center font-semibold">
        ✅ Application submitted successfully. We'll review your credentials and contact you shortly.
      </div>

      <form id="doctor-form" class="bg-white rounded-2xl shadow-xl p-8 space-y-6">

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Your Email</label>
          <input type="email" name="email" required
                 class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Profile Photo Upload -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Upload Profile Photo <span class="text-red-500">*</span></label>
          <input type="file" name="photo" accept="image/*" required id="photo-file"
                 class="w-full border border-gray-300 rounded-lg p-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Full Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
          <input type="text" name="full_name" required
                 class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Specialty -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Specialty</label>
          <input type="text" name="specialty" required
                 class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Experience -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
          <input type="number" name="experience" required
                 class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- License -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">License Number</label>
          <input type="text" name="license" required
                 class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Bio -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Short Bio</label>
          <textarea name="bio" rows="4" required
                    class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>
        <!-- University Attended -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">University Attended <span class="text-red-500">*</span></label>
            <input type="text" name="university" required placeholder="e.g., University of Nairobi"
                class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        
        <!-- Medical Degree -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Medical Degree <span class="text-red-500">*</span></label>
            <input type="text" name="degree" required placeholder="e.g., MBBS, MD, DO"
                class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        
        <!-- Year of Graduation -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Year of Graduation <span class="text-red-500">*</span></label>
            <input type="number" name="graduation_year" min="1950" max="2099" required placeholder="e.g., 2015"
                class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        
        <!-- Country of Practice -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Country of Practice <span class="text-red-500">*</span></label>
            <input type="text" name="country" required placeholder="e.g., Kenya"
                class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        
        <!-- LinkedIn or Professional Profile -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn or Professional Profile (optional)</label>
            <input type="url" name="profile_url" placeholder="https://linkedin.com/in/example"
                class="w-full border border-gray-300 rounded-lg p-3 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        
        <!-- Upload Medical Certificate -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Medical Certificate (optional)</label>
            <input type="file" name="certificate" accept=".pdf,.jpg,.jpeg,.png"
                class="w-full border border-gray-300 rounded-lg p-2 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        
        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-full transition duration-300">
            Submit Application
          </button>
        </div>
      </form>
    </div>
  
      <!-- ... -->
    </section>
  </div>
</div>


  

  <script src="./script.js">
   
  </script>
  <script>
      document.getElementById('openModal').addEventListener('click', function () {
    document.getElementById('doctorModal').classList.remove('hidden');
  });

  document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('doctorModal').classList.add('hidden');
  });

  // Optional: Close modal when clicking outside the form
  document.getElementById('doctorModal').addEventListener('click', function (e) {
    if (e.target === this) {
      this.classList.add('hidden');
    }
  });
  </script>
</body>
</html>

</x-app>
>>>>>>> d4dd87a79fb0ef2d5fceded474e6c0f1bc7d3986
