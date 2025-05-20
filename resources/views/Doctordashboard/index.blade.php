<!DOCTYPE html>
<html lang="en" class="transition duration-300">
<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

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

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-md p-6">
            <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-8 animate-fade-in">DocZone</h2>
            <nav class="space-y-4">
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Dashboard</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Appointments</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Patients</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Messages</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Profile</a>
                  <button type="submit"
                  
                                class="bg-red-500 text-white px-4 py-2  rounded hover:bg-red-600 transition">
                                  <svg xmlns="http://www.w3.org/2000/svg"
         fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor"
         class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m4.5-3h-13.5m0 0l3.75-3.75M6.75 12l3.75 3.75" />
    </svg>
                            Logout
                 </button>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white dark:bg-gray-800 shadow px-6 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-semibold">Welcome, Dr. {{ Auth::user()->name }}</h1>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Profile Picture -->
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                         alt="Profile Picture"
                         class="w-10 h-10 rounded-full border-2 border-blue-400 dark:border-blue-300 shadow-md object-cover">

                  

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                      
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6 space-y-6 animate-slide-in">
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow hover:shadow-lg transition">
                        <h2 class="text-lg font-semibold">Today's Appointments</h2>
                        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">5</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow hover:shadow-lg transition">
                        <h2 class="text-lg font-semibold">New Patients</h2>
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">3</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow hover:shadow-lg transition">
                        <h2 class="text-lg font-semibold">Unread Messages</h2>
                        <p class="text-3xl font-bold text-red-600 dark:text-red-400 mt-2">2</p>
                    </div>
                </div>

                <!-- Recent Appointments -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                    <h3 class="text-xl font-semibold mb-4">Recent Appointments</h3>
                    <table class="min-w-full table-auto text-left">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-4 py-2">Patient</th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Time</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-gray-300 dark:border-gray-600">
                                <td class="px-4 py-2">John Doe</td>
                                <td class="px-4 py-2">May 20, 2025</td>
                                <td class="px-4 py-2">10:00 AM</td>
                                <td class="px-4 py-2 text-green-600 dark:text-green-400 font-medium">Confirmed</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-gray-600">
                                <td class="px-4 py-2">Jane Smith</td>
                                <td class="px-4 py-2">May 20, 2025</td>
                                <td class="px-4 py-2">11:30 AM</td>
                                <td class="px-4 py-2 text-yellow-600 dark:text-yellow-400 font-medium">Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script>
        const darkToggle = document.getElementById('darkToggle');
        const html = document.documentElement;

        darkToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });

        // Apply saved dark mode preference
        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }
    </script>

</body>
</html>
