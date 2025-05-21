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
