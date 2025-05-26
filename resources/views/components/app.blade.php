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
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
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
                <a href="{{ route('doctorindex') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Dashboard</a>
                <a href="{{ route('doctorappointment') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Appointments</a>
                <a href="{{ route('doctorpatient') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Patients</a>
                <a href="#"
                    class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Messages</a>
                <a href="{{ route('doctorblogs') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Blogs</a>
                <a href="{{ route('doctorprofile') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 dark:hover:bg-gray-700 transition">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2  rounded hover:bg-red-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m4.5-3h-13.5m0 0l3.75-3.75M6.75 12l3.75 3.75" />
                        </svg>
                        Logout
                    </button>
                </form>
            </nav>
        </aside>
        @if (Auth::check() && Auth::user()->role === 'doctor')
            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Header -->
                <header class="bg-white dark:bg-gray-800 shadow px-6 py-4 flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-semibold">Welcome, Dr. {{ Auth::user()->name }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Profile Picture -->
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture"
                            class="w-12 h-12 rounded-full border-2 border-blue-400 dark:border-blue-300 shadow-md object-cover">



                        <!-- Logout -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                        </form>
                    </div>
                </header>
                <div>
                    {{ $slot }}
                </div>
        @endif
