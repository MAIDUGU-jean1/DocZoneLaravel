<!DOCTYPE html>
<html lang="en" class="transition duration-300">

<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { animation: fade-in 0.6s ease-out forwards; }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans transition duration-300">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 h-screen w-64 bg-white dark:bg-gray-800 shadow-md p-6 z-30 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <!-- Close Icon for Mobile -->
        <div class="flex justify-end md:hidden">
            <button onclick="closeSidebar()" class="text-gray-600 dark:text-gray-300 text-2xl">
                &times;
            </button>
        </div>

        <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-8">DocZone</h2>
        <nav class="space-y-4">
            <!-- your nav links here -->
              <a href="{{ route('doctorindex') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Dashboard</a>
                <a href="{{ route('doctorappointment') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Appointments</a>
                <a href="{{ route('doctorpatient') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Patients</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Messages</a>
                <a href="{{ route('doctorblogs') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Blogs</a>
                <a href="{{ route('doctorprofile') }}" class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition mt-4">
                        Logout
                    </button>
                </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="md:ml-64 flex flex-col min-h-screen">

        <!-- Header -->
        <header
            class="fixed top-0 left-0 md:left-64 w-full md:w-[calc(100%-16rem)] bg-white dark:bg-gray-800 shadow z-20 px-4 py-4 flex items-center justify-between md:px-6">
            <div class="flex items-center gap-4">
                <!-- Hamburger for Mobile -->
                <button onclick="openSidebar()" class="md:hidden text-2xl">
                    ☰
                </button>
                <h1 class="text-lg md:text-xl font-semibold">Welcome, Dr. {{ Auth::user()->name }}</h1>
            </div>
            <div class="flex items-center gap-4">
                <!-- Notification bell -->
                <button
                    class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors relative">
                    <i class="fas fa-bell text-gray-700 dark:text-gray-300"></i>
                    <span
                        class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">6</span>
                </button>
                <!-- Profile -->
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture"
                    class="w-10 h-10 rounded-full border-2 border-blue-400 dark:border-blue-300 object-cover">
            </div>
        </header>

        <!-- Scrollable Content -->
        <main class="pt-24 px-4 md:px-6 overflow-y-auto h-screen">
            {{ $slot }}
        </main>
    </div>

    <!-- JavaScript for Toggle -->
    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
        }
    </script>
</body>


</html>
