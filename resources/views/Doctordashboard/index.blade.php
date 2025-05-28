<x-app>
    <!DOCTYPE html>
<html lang="en" class="transition duration-300">
<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' };
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slide-in {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        .animate-slide-in {
            animation: slide-in 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans transition duration-300">

<div class="min-h-screen flex flex-col md:flex-row">

    <!-- Sidebar (Responsive) -->
    

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        

        <!-- Page Content -->
        <main class="p-4 md:p-6 space-y-6 animate-slide-in">
            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-4 rounded shadow hover:shadow-lg transition">
                    <h2 class="text-lg font-semibold"> Appointments</h2>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{$appointmentsCount}}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded shadow hover:shadow-lg transition">
                    <h2 class="text-lg font-semibold">Total Patients</h2>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $patientCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded shadow hover:shadow-lg transition">
                    <h2 class="text-lg font-semibold">Unread Messages</h2>
                    <p class="text-3xl font-bold text-red-600 dark:text-red-400 mt-2">2</p>
                </div>
            </div>

            
            <!-- Recent Appointments -->
            <div class="bg-white dark:bg-gray-800 p-4 md:p-6 rounded shadow overflow-x-auto">
                <h3 class="text-xl font-semibold mb-4">Recent Appointments</h3>
                <table class="min-w-full text-sm text-left">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-sm">
                            <th class="px-4 py-2">Patient</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $appointments)
                              <tr class="border-t border-gray-300 dark:border-gray-600">
                                    <td class="px-4 py-2">{{$appointments->patient_name}}</td>
                                    <td class="px-4 py-2">{{$appointments->appointment_date}}</td>
                                    <td class="px-4 py-2">{{$appointments->appointment_time}}</td>
                                    <td class="px-4 py-2 text-green-600 dark:text-green-400 font-medium">{{$appointments->status}}</td>
                            </tr>
                        @empty
                            
                        @endforelse
                      
                      
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- JS: Dark Mode Toggle -->
<script>
    const darkToggle = document.getElementById('darkToggle');
    const html = document.documentElement;

    if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
    }

    darkToggle?.addEventListener('click', () => {
        html.classList.toggle('dark');
        localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
    });
</script>

</body>
</html>

</x-app>