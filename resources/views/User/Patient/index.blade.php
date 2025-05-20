<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocZone | Premium Online Healthcare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#5D5CDE',
                        secondary: '#FF9500',
                        accent: '#34D399',
                        dark: {
                            bg: '#121212',
                            card: '#1E1E1E',
                            border: '#333333'
                        },
                        light: {
                            bg: '#F9FAFB',
                            card: '#FFFFFF',
                            border: '#E5E7EB'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Montserrat', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="output.css">
    <style>
        /* Animation classes */
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease forwards;
        }

        .slide-in-bottom {
            transform: translateY(50px);
            opacity: 0;
            animation: slideInBottom 0.6s ease forwards;
        }

        .slide-in-left {
            transform: translateX(-50px);
            opacity: 0;
            animation: slideInLeft 0.6s ease forwards;
        }

        .slide-in-right {
            transform: translateX(50px);
            opacity: 0;
            animation: slideInRight 1.5s ease forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes slideInBottom {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Delay utilities */
        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-600 {
            animation-delay: 0.6s;
        }

        /* Card hover effects */
        .doctor-card {
            transition: all 0.3s ease;
        }

        .doctor-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .dark .doctor-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
        }

        /* Mobile menu animation */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        /* Hamburger menu animation */
        .hamburger-line {
            transition: all 0.3s ease;
        }

        .menu-open .line1 {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-open .line2 {
            opacity: 0;
        }

        .menu-open .line3 {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        /* Modern scale animation for CTA buttons */
        .btn-scale {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-scale:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .btn-scale:active {
            transform: scale(0.98);
        }

        /* Create custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .dark ::-webkit-scrollbar-track {
            background: #2d2d2d;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Modal styles */
        .modal {
            transition: opacity 0.3s ease;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
            animation: modalScale 0.3s ease;
        }

        @keyframes modalScale {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Testimonial slider */
        .testimonial-slider {
            position: relative;
            overflow: hidden;
        }

        .testimonial-slide {
            transition: transform 0.5s ease;
        }

        .testimonial-slider-nav button {
            transition: all 0.3s ease;
        }

        .testimonial-slider-nav button:hover {
            background-color: rgba(93, 92, 222, 0.1);
        }

        /* Chat system styles */
        #chatPanel {
            transition: transform 0.3s ease;
            transform: translateX(100%);
        }

        #chatPanel.active {
            transform: translateX(0);
        }

        .chat-message {
            max-width: 80%;
            margin-bottom: 0.75rem;
        }

        .chat-message.sent {
            margin-left: auto;
            background-color: #5D5CDE;
            color: white;
            border-radius: 16px 16px 4px 16px;
        }

        .chat-message.received {
            margin-right: auto;
            background-color: #f2f2f7;
            color: #333;
            border-radius: 16px 16px 16px 4px;
        }

        .dark .chat-message.received {
            background-color: #333;
            color: #eee;
        }

        /* Typing indicator */
        .typing-indicator {
            display: flex;
            align-items: center;
        }

        .typing-indicator span {
            height: 8px;
            width: 8px;
            float: left;
            margin: 0 1px;
            background-color: #9E9EA1;
            display: block;
            border-radius: 50%;
            opacity: 0.4;
        }

        .typing-indicator span:nth-of-type(1) {
            animation: 1s blink infinite 0.3333s;
        }

        .typing-indicator span:nth-of-type(2) {
            animation: 1s blink infinite 0.6666s;
        }

        .typing-indicator span:nth-of-type(3) {
            animation: 1s blink infinite 0.9999s;
        }

        @keyframes blink {
            50% {
                opacity: 1;
            }
        }

        /* Profile section styles */
        .profile-tab.active {
            color: #5D5CDE;
            border-bottom-color: #5D5CDE;
        }

        /* Dashboard stats animation */
        .stat-number {
            display: inline-block;
            animation: countUp 2s ease-out forwards;
        }

        @keyframes countUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* WhatsApp-like Message Styling */
        .message {
            max-width: 70%;
            margin-bottom: 8px;
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }

        .message.sent {
            margin-left: auto;
        }

        .message.received {
            margin-right: auto;
        }

        .message-content {
            padding: 8px 12px;
            border-radius: 7.5px;
            position: relative;
            word-wrap: break-word;
        }

        .message.sent .message-content {
            background-color: #dcf8c6;
            color: #303030;
            border-top-right-radius: 0;
        }

        .message.received .message-content {
            background-color: white;
            color: #303030;
            border-top-left-radius: 0;
        }

        .message-time {
            font-size: 0.75rem;
            color: #667781;
            margin-top: 2px;
            text-align: right;
        }

        .message-status {
            font-size: 0.75rem;
            color: #667781;
            margin-left: 4px;
        }

        .typing-indicator {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            background-color: #f0f0f0;
            border-radius: 7.5px;
            margin-bottom: 8px;
            width: fit-content;
        }

        .typing-indicator span {
            height: 8px;
            width: 8px;
            background-color: #919191;
            border-radius: 50%;
            display: inline-block;
            margin: 0 1px;
            animation: typing 1s infinite;
        }

        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="font-sans bg-light-bg dark:bg-dark-bg text-gray-800 dark:text-gray-200 transition-colors duration-300">
    <!-- Header and Navigation -->
    <header class="sticky top-0 z-40 bg-white dark:bg-dark-card shadow-md transition-colors duration-300">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center gap-2">
                        <span class="text-2xl font-bold text-primary">
                            DocZone
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="#featured"
                        class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary transition-colors hover:underline">Doctors</a>
                    <a href="#categories"
                        class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary transition-colors hover:underline">Services</a>
                    <a href="#how-it-works"
                        class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary transition-colors hover:underline">How
                        It Works</a>
                    <a href="#testimonials"
                        class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary transition-colors hover:underline">Testimonials</a>
                    <a href="#blog"
                        class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary transition-colors hover:underline">Doctor
                        Blogs</a>
                    <a href="#faq"
                        class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary transition-colors hover:underline">FAQ</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <!-- Search Icon -->
                    <button id="searchBtn"
                        class="hidden p-2 rounded-full hover:bg-gray-200 dark:hover:bg-dark-border transition-colors">
                        <i class="fas fa-search text-gray-700 dark:text-gray-300"></i>
                    </button>

                    <!-- Chat Icon with Notification -->
                    <button id="chatBtn"
                        class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-dark-border transition-colors relative">
                        <i class="fas fa-comment-dots text-gray-700 dark:text-gray-300"></i>
                        <span
                            class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                    </button>
                    <button onclick="opennot()" id="notbtn"
                        class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-dark-border transition-colors relative">
                        <i class="fas fa-bell text-gray-700 dark:text-gray-300"></i>
                        <span
                            class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                    </button>


                    <!-- User Profile -->
                    <div class="relative " id="userProfileContainer">
                        <button id="accountBtn" class="relative flex items-center">
                            <img src="{{ asset('storage/' . Auth::user()?->profile_picture) }}" alt="User"
                                class="w-8 h-8 rounded-full border-2 border-primary">
                            <span
                                class="absolute bottom-0 right-0 bg-green-500 h-3 w-3 rounded-full border-2 border-white dark:border-gray-900"></span>
                        </button>
                        <div>
                            <!-- notification Dropdown (Hidden by default) -->
                            <div id="notificationDropdown"
                                class="hidden fixed right-4 top-16 w-96 bg-white dark:bg-gray-800 rounded-lg shadow-xl z-50 border border-gray-200 dark:border-gray-700">
                                <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Notifications
                                        </h3>
                                        <button
                                            class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                            <i class="fas fa-check-double"></i> Mark all as read
                                        </button>
                                    </div>
                                    <div class="flex gap-2 mb-4">
                                        <button
                                            class="px-3 py-1 bg-primary text-white rounded-full text-sm">All</button>
                                        <button
                                            class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm">Unread</button>
                                    </div>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <!-- Notification Item 1 -->
                                    <div
                                        class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-gray-100 dark:border-gray-700">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Doctor"
                                                    class="w-10 h-10 rounded-full">
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Dr.
                                                        Marcus Johnson</p>
                                                    <span class="text-xs text-gray-500">2m ago</span>
                                                </div>
                                                <p class="text-sm text-gray-600 dark:text-gray-300">Your appointment has
                                                    been confirmed for tomorrow at 2:30 PM</p>
                                                <div class="mt-2 flex gap-2">
                                                    <button class="text-xs text-primary hover:text-primary-dark">View
                                                        Details</button>
                                                    <button
                                                        class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">Dismiss</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notification Item 2 -->
                                    <div
                                        class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-gray-100 dark:border-gray-700">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('Images/Doctor with Stethoscope Smiling Isolated on White Background _ Premium AI-generated image.jpeg') }}"
                                                    alt="Doctor" class="w-10 h-10 rounded-full">
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Dr.
                                                        Sarah Williams</p>
                                                    <span class="text-xs text-gray-500">1h ago</span>
                                                </div>
                                                <p class="text-sm text-gray-600 dark:text-gray-300">Your prescription
                                                    has been renewed and is ready for pickup</p>
                                                <div class="mt-2 flex gap-2">
                                                    <button class="text-xs text-primary hover:text-primary-dark">View
                                                        Details</button>
                                                    <button
                                                        class="text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">Dismiss</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                                    <button
                                        class="w-full text-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                                        View All Notifications
                                    </button>
                                </div>
                            </div>



                            <!-- Profile Dropdown (Hidden by default) -->
                            <div id="profileDropdown"
                                class="hidden container  fixed right-0 w-fit bg-white dark:bg-gray-800 rounded-lg shadow-lg z-50">
                                <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . Auth::user()?->profile_picture) }}" alt="User"
                                            class="w-14 h-14 rounded-full mr-3">
                                        <div>
                                            <h4 class="font-bold text-gray-900 dark:text-white">Michael Rodriguez</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                michael.rodriguez@example.com</p>
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary bg-opacity-10 text-primary mt-1">
                                                <i class="fas fa-check-circle mr-1"></i> Premium Member
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <a href="#" id="viewProfileBtn"
                                        class="flex items-center px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-user mr-3 text-primary w-5"></i> View Profile
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-file-medical mr-3 text-primary w-5"></i> Medical Records
                                    </a>
                                    <a href="#" id="viewAppointmentsBtn"
                                        class="flex items-center px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-calendar-check mr-3 text-primary w-5"></i> My Appointments
                                    </a>
                                    <a href="#" id="viewMessagesBtn"
                                        class="flex items-center px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-envelope mr-3 text-primary w-5"></i> Messages
                                        <span
                                            class="ml-auto bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-credit-card mr-3 text-primary w-5"></i> Billing & Plans
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-cog mr-3 text-primary w-5"></i> Settings
                                    </a>
                                </div>
                                <div class="border-t border-gray-200 dark:border-gray-700 py-2">
                                  <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                       <a href=""
                                        class="flex text-red-500 items-center px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-sign-out-alt mr-3 text-red-500 w-5"></i> <button type="submit">Sign Out</button>
                                    </a>
                                  </form>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dark Mode Toggle -->
                    <button id="themeToggle"
                        class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-dark-border transition-colors">
                        <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
                        <i class="fas fa-moon text-blue-300 hidden dark:block"></i>
                    </button>

                    <!-- Hamburger Menu Button for Mobile -->
                    <button id="hamburgerBtn"
                        class="md:hidden p-2 rounded-full hover:bg-gray-200 dark:hover:bg-dark-border transition-colors">
                        <div class="w-6 flex flex-col space-y-1">
                            <span class="hamburger-line w-full h-0.5 bg-gray-700 dark:bg-gray-300 line1"></span>
                            <span class="hamburger-line w-full h-0.5 bg-gray-700 dark:bg-gray-300 line2"></span>
                            <span class="hamburger-line w-full h-0.5 bg-gray-700 dark:bg-gray-300 line3"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!--Delete account allert ALLERT -->


    <div id="searchOverlay"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-start justify-center pt-28 px-4 hidden">
        <div class="bg-white dark:bg-dark-card w-full max-w-3xl rounded-lg shadow-xl p-6 transform transition-all scale-90 opacity-0"
            id="searchContent">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Find Doctors & Services</h3>
                <button id="closeSearchBtn"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="relative">
                <input type="text" placeholder="Search for doctors, specialties, or services..."
                    class="w-full px-4 py-3 border border-gray-300 dark:border-dark-border rounded-lg bg-white dark:bg-dark-bg text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                <button
                    class="absolute right-3 top-3 text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-secondary">
                    <i class="fas fa-search text-lg"></i>
                </button>
            </div>
            <div class="mt-5">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Popular Searches</h4>
                <div class="flex flex-wrap gap-2">
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Cardiology</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Pediatrics</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Mental
                        Health</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Dermatology</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Urgent
                        Care</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Mobile Menu Sidebar -->
    <div id="mobileMenu"
        class="mobile-menu fixed top-0 left-0 h-full w-72 bg-white dark:bg-dark-card shadow-lg z-50 p-6">
        <div class="flex justify-between items-center mb-8">
            <span class="text-xl font-bold text-primary">
                <i class="fas fa-heartbeat mr-2"></i>DocZone
            </span>
            <button id="closeMenuBtn"
                class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-dark-border transition-colors">
                <i class="fas fa-times text-gray-700 dark:text-gray-300 text-lg"></i>
            </button>
        </div>
        <nav class="flex flex-col space-y-4">
            <a href="#featured"
                class="py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">Doctors</a>
            <a href="#categories"
                class="py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">Services</a>
            <a href="#how-it-works"
                class="py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">How It
                Works</a>
            <a href="#testimonials"
                class="py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">Testimonials</a>
            <a href="#blog"
                class="py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">Doctor
                Blogs</a>
            <a href="#faq"
                class="py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">FAQ</a>
        </nav>
        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-dark-border">
            <a href="#"
                class="flex items-center py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">
                <i class="fas fa-user mr-3 text-primary"></i> My Account
            </a>
            <a href="#"
                class="flex items-center py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">
                <i class="fas fa-calendar-check mr-3 text-primary"></i> My Appointments
            </a>
            <a href="#"
                class="flex items-center py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">
                <i class="fas fa-file-medical mr-3 text-primary"></i> Medical Records
            </a>
            <a href="#"
                class="flex items-center py-2 px-4 rounded hover:bg-gray-100 dark:hover:bg-dark-border transition-colors">
                <i class="fas fa-question-circle mr-3 text-primary"></i> Help & Support
            </a>
        </div>
    </div>

    <!-- Search Overlay -->
    <div id="searchOverlay"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-start justify-center pt-28 px-4 hidden">
        <div class="bg-white dark:bg-dark-card w-full max-w-3xl rounded-lg shadow-xl p-6 transform transition-all scale-90 opacity-0"
            id="searchContent">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Find Doctors & Services</h3>
                <button id="closeSearchBtn"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="relative">
                <input type="text" placeholder="Search for doctors, specialties, or services..."
                    class="w-full px-4 py-3 border border-gray-300 dark:border-dark-border rounded-lg bg-white dark:bg-dark-bg text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                <button
                    class="absolute right-3 top-3 text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-secondary">
                    <i class="fas fa-search text-lg"></i>
                </button>
            </div>
            <div class="mt-5">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Popular Searches</h4>
                <div class="flex flex-wrap gap-2">
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Cardiology</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Pediatrics</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Mental
                        Health</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Dermatology</span>
                    <span
                        class="px-3 py-1 bg-gray-100 dark:bg-dark-border rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer transition-colors">Urgent
                        Care</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Chat Panel - WhatsApp Styled -->
    <div id="chatPanel"
        class="fixed top-0 right-0 w-full h-full bg-white dark:bg-dark-card z-50 flex flex-col md:flex-row transition-all duration-300 ease-in-out">

        <!-- Chat List Section -->
        <div
            class="w-full md:w-1/3 lg:w-1/4 bg-white dark:bg-gray-900 border-r border-gray-300 dark:border-gray-700 flex flex-col transition-all duration-300">
            <!-- Header -->
            <div class="p-4 bg-primary text-white flex justify-between items-center shadow">
                <h2 class="text-lg font-semibold">Messages</h2>
                <button id="closeChatBtn" class="hover:text-gray-200 transition duration-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Search Bar -->
            <div class="p-3 border-b border-gray-300 dark:border-gray-700">
                <div class="relative">
                    <input type="text" placeholder="Search doctors..."
                        class="w-full px-4 py-2 pl-10 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                </div>
            </div>

            <!-- Tabs -->
            <div class="flex text-sm border-b border-gray-300 dark:border-gray-700">
                <button class="chat-tab w-1/2 py-2 font-medium border-b-2 border-primary text-primary">Recent</button>
                <button class="chat-tab w-1/2 py-2 font-medium text-gray-600 dark:text-gray-400">All Doctors</button>
            </div>

            <!-- Chat List -->
            <div class="overflow-y-auto flex-grow">
                <div class="chat-list divide-y divide-gray-200 dark:divide-gray-800">
                    <!-- Recent Chat Item -->
                    <div class="chat-item flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer transition duration-200"
                        data-doctor-id="1">
                        <div class="relative">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Doctor"
                                class="w-12 h-12 rounded-full object-cover">
                            <span
                                class="absolute bottom-0 right-0 bg-green-500 h-3 w-3 rounded-full border-2 border-white dark:border-gray-800"></span>
                        </div>
                        <div class="ml-3 w-full">
                            <div class="flex justify-between">
                                <h4 class="font-medium text-gray-900 dark:text-white">Dr. Marcus Johnson</h4>
                                <span class="text-xs text-gray-500">9:41 AM</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-600 dark:text-gray-300 truncate w-40">I'll send your
                                    prescription...</p>
                                <span
                                    class="bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">2</span>
                            </div>
                        </div>
                    </div>

                    <!-- All Doctors List -->
                    <div class="all-doctors-list hidden">
                        <!-- Doctor Item -->
                        <div class="doctor-item flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer transition duration-200"
                            data-doctor-id="2">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Doctor"
                                class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-3">
                                <h4 class="font-medium text-gray-900 dark:text-white">Dr. Sarah Williams</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Dermatology</p>
                            </div>
                        </div>
                        <!-- Add more doctor items here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Individual Chat Section -->
        <div id="individualChat"
            class="flex-grow flex flex-col bg-gray-100 dark:bg-gray-900 transition-all duration-300 ease-in-out md:block hidden md:flex md:w-2/3 lg:w-3/4">
            <!-- Empty State -->
            <div id="emptyChatState" class="flex-grow flex flex-col items-center justify-center p-6 text-center">
                <div class="w-24 h-24 bg-gray-200 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-comments text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No Chat Selected</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Select a doctor from the list to start a conversation
                </p>
                <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition-colors">
                    Browse Doctors
                </button>
            </div>

            <!-- Active Chat (Hidden by default) -->
            <div id="activeChat" class="hidden flex-grow flex flex-col">
                <!-- Header -->
                <div class="p-4 bg-primary text-white flex items-center shadow">
                    <button id="backToChatList" class="mr-3 block md:hidden">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <div class="flex items-center flex-grow">
                        <img src="..." alt="Doctor" id="chatDoctorImage"
                            class="w-10 h-10 rounded-full object-cover">
                        <div class="ml-3">
                            <h3 id="chatDoctorName" class="font-semibold">Dr. Marcus Johnson</h3>
                            <div class="flex items-center text-xs">
                                <span class="bg-green-500 h-2 w-2 rounded-full mr-1"></span>
                                <span>Online now</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="hover:text-gray-200 transition-colors">
                            <i class="fas fa-video"></i>
                        </button>
                        <button class="hover:text-gray-200 transition-colors">
                            <i class="fas fa-phone"></i>
                        </button>
                        <button class="hover:text-gray-200 transition-colors">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div id="chatMessages" class="p-4 flex-grow overflow-y-auto space-y-3">
                    <!-- Messages will be injected here -->
                </div>

                <!-- Chat Input -->
                <div class="p-3 bg-white dark:bg-dark-card border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-gray-500 hover:text-primary transition duration-200">
                            <i class="fas fa-paperclip"></i>
                        </button>
                        <input type="text" id="messageInput" placeholder="Type a message..."
                            class="flex-grow px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary">
                        <button id="sendMessageBtn"
                            class="p-2 bg-primary text-white rounded-full hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- User Profile Modal -->
    <div id="profileModal" class="modal fixed h-full inset-0 z-50 flex items-center justify-center hidden">
        <div
            class="modal-content bg-white dark:bg-dark-card w-full xl:w-full  h-full lg:w-full rounded-lg shadow-xl p-6 ">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">My Profile</h3>
                <button class="close-modal text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- User Dashboard Summary -->
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- User Info -->
                    <div class="flex items-center">
                        <div class="relative">
                            <img src="{{ asset('storage/' . Auth::user()?->profile_picture) }}" alt="Michael Rodriguez"
                                class="w-16 h-16 rounded-full border-4 border-white dark:border-gray-700 shadow-md">
                            <span
                                class="absolute bottom-0 right-0 bg-green-500 h-4 w-4 rounded-full border-2 border-white dark:border-gray-800"></span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900 dark:text-white">Michael Rodriguez</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Member since 2022</p>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary bg-opacity-10 text-primary mt-1">
                                Premium Plan
                            </span>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4 col-span-2">
                        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Upcoming Appointments</p>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white"><span
                                            class="stat-number">2</span></h3>
                                </div>
                                <div
                                    class="h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-400">
                                    <i class="fas fa-calendar-check text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Past Consultations</p>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white"><span
                                            class="stat-number">8</span></h3>
                                </div>
                                <div
                                    class="h-12 w-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-600 dark:text-green-400">
                                    <i class="fas fa-stethoscope text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Unread Messages</p>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white"><span
                                            class="stat-number">3</span></h3>
                                </div>
                                <div
                                    class="h-12 w-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center text-red-600 dark:text-red-400">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Subscription Ends</p>
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Aug 15, 2023</h3>
                                </div>
                                <div
                                    class="h-12 w-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center text-purple-600 dark:text-purple-400">
                                    <i class="fas fa-crown text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Tabs -->
            <div class="border-b border-gray-200 dark:border-gray-700 mb-6">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <button class="profile-tab active inline-block py-2 px-4 font-medium border-b-2 border-primary"
                            data-tab="personal">Personal Information</button>
                    </li>
                    <li class="mr-2">
                        <button
                            class="profile-tab inline-block py-2 px-4 font-medium text-gray-500 dark:text-gray-400 border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                            data-tab="medical">Medical History</button>
                    </li>
                    <li class="mr-2">
                        <button
                            class="profile-tab inline-block py-2 px-4 font-medium text-gray-500 dark:text-gray-400 border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                            data-tab="subscription">Subscription</button>
                    </li>
                    <li>
                        <button
                            class="profile-tab inline-block py-2 px-4 font-medium text-gray-500 dark:text-gray-400 border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600"
                            data-tab="settings">Settings</button>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="personalInfo">
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full
                            Name</label>
                        <input type="text" value="Michael Rodriguez"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                            Address</label>
                        <input type="email" value="michael.rodriguez@example.com"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone
                            Number</label>
                        <input type="tel" value="(555) 123-4567"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date of
                            Birth</label>
                        <input type="date" value="1985-06-15"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                        <input type="text" value="123 Main Street"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">City, State,
                            ZIP</label>
                        <input type="text" value="Chicago, IL 60601"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-base focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Profile
                            Photo</label>
                        <div class="flex items-center mt-2">
                            <img src="{{ asset('storage/' . Auth::user()?->profile_picture) }}" alt="Current Profile Photo"
                                class="w-16 h-16 rounded-full object-cover">
                            <div class="ml-4">
                                <button type="button"
                                    class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 text-sm">Change
                                    Photo</button>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">JPG, GIF or PNG. Max size of
                                    800K</p>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="flex justify-end mt-6">
                    <button type="button"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 mr-3">Cancel</button>
                    <button type="button" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-opacity-90">Save
                        Changes</button>
                </div>
            </div>

            <div class="tab-content hidden" id="medicalInfo">
                <div class="space-y-6">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Medical History</h4>
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Seasonal Allergies</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Diagnosed: March 2018</p>
                                    </div>
                                    <span
                                        class="px-2 py-1 bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 text-xs rounded-full">Ongoing</span>
                                </div>
                                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">Pollen and dust allergies
                                    causing seasonal rhinitis. Treated with antihistamines as needed.</p>
                            </div>
                            <div>
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Hypertension</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Diagnosed: January 2021</p>
                                    </div>
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 text-xs rounded-full">Controlled</span>
                                </div>
                                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">Mild hypertension being
                                    managed with lifestyle modifications and low-dose medication.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Current Medications</h4>
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <ul class="space-y-3">
                                <li class="flex justify-between items-center">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Lisinopril</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">10mg, once daily</p>
                                    </div>
                                    <button class="text-primary hover:text-primary-dark text-sm">Refill</button>
                                </li>
                                <li
                                    class="flex justify-between items-center pt-3 border-t border-gray-200 dark:border-gray-700">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Cetirizine</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">10mg, as needed for
                                            allergies</p>
                                    </div>
                                    <button class="text-primary hover:text-primary-dark text-sm">Refill</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Primary Care Provider</h4>
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <div class="flex items-center">
                                <img src="{{ asset('storage/' . Auth::user()?->profile_picture) }}"
                                    alt="Dr. Marcus Johnson" class="w-12 h-12 rounded-full object-cover">
                                <div class="ml-3">
                                    <h5 class="font-medium text-gray-900 dark:text-white">Dr. Marcus Johnson</h5>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Cardiology</p>
                                </div>
                                <button
                                    class="ml-auto bg-primary text-white px-3 py-1 rounded-md text-sm hover:bg-opacity-90">Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content hidden" id="subscriptionInfo">
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white">Premium Plan</h4>
                            <p class="text-gray-600 dark:text-gray-400">Billed annually</p>
                        </div>
                        <span
                            class="px-3 py-1 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded-full text-sm font-medium">Active</span>
                    </div>

                    <div class="flex items-baseline mb-6">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$29</span>
                        <span class="text-gray-600 dark:text-gray-400 ml-1">/month</span>
                        <span
                            class="ml-2 text-sm bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 px-2 py-0.5 rounded">Save
                            $60</span>
                    </div>

                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-700 dark:text-gray-300">Next billing date</span>
                            <span class="text-gray-900 dark:text-white font-medium">August 15, 2023</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700 dark:text-gray-300">Payment method</span>
                            <div class="flex items-center">
                                <i class="fab fa-cc-visa text-blue-600 mr-2"></i>
                                <span class="text-gray-900 dark:text-white font-medium">Visa ending in 4589</span>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mb-6">
                        <h5 class="font-semibold text-gray-900 dark:text-white mb-3">Your Premium Benefits</h5>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span class="text-gray-700 dark:text-gray-300">Unlimited primary care
                                    consultations</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span class="text-gray-700 dark:text-gray-300">50% discount on specialist
                                    consultations</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span class="text-gray-700 dark:text-gray-300">Priority scheduling (same day
                                    appointments)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span class="text-gray-700 dark:text-gray-300">Free prescription delivery</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span class="text-gray-700 dark:text-gray-300">24/7 messaging with your care
                                    team</span>
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button
                            class="px-4 py-2 border border-primary text-primary hover:bg-primary hover:bg-opacity-10 rounded-md transition-colors">Change
                            Plan</button>
                        <button
                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">Update
                            Payment Method</button>
                    </div>
                </div>
            </div>

            <div class="tab-content hidden" id="settingsInfo">
                <div class="space-y-6">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Notification Settings</h4>
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <ul class="space-y-4">
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Appointment Reminders
                                        </h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Receive notifications about
                                            upcoming appointments</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary">
                                        </div>
                                    </label>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">New Messages</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Get notified when you
                                            receive new messages</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary">
                                        </div>
                                    </label>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Prescription Updates</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Get alerts about
                                            prescription refills and updates</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary">
                                        </div>
                                    </label>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Marketing & Promotions
                                        </h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Receive updates about new
                                            services and special offers</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary">
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Privacy Settings</h4>
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <ul class="space-y-4">
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Two-Factor Authentication
                                        </h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Add an extra layer of
                                            security to your account</p>
                                    </div>
                                    <button class="px-3 py-1 bg-primary text-white rounded-md text-sm">Enable</button>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Data Sharing</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Allow sharing anonymized
                                            health data for research</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary">
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Account Actions</h4>
                        <div
                            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-4">
                            <ul class="space-y-4">
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-gray-900 dark:text-white">Change Password</h5>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Update your account
                                            password</p>
                                    </div>
                                    <button
                                        class="px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md text-sm">Change</button>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-red-600 dark:text-red-400"><button
                                                onclick="confirmDelete()">Delete Account</button></h5>

                                        <p class="text-sm text-gray-500 dark:text-gray-400">Permanently remove your
                                            account and all data</p>
                                    </div>
                                    <button
                                        class="px-3 py-1 bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300 rounded-md text-sm">Delete</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Doctor Modal -->
    <div id="doctorModal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="modal-content bg-white dark:bg-dark-card w-full max-w-4xl rounded-lg shadow-xl p-6 mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white" id="modalTitle">Doctor Profile</h3>
                <button class="close-modal text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="bg-gray-100 dark:bg-dark-bg rounded-lg overflow-hidden h-80">
                        <img src="https://images.unsplash.com/photo-1622902046580-2b47f47f5471?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Doctor Image" class="w-full h-full object-cover" id="modalImage">
                    </div>
                    <div class="flex mt-4 gap-2">
                        <div
                            class="w-24 h-24 bg-gray-100 dark:bg-dark-bg rounded-md overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
                            <img src="https://images.unsplash.com/photo-1622902046580-2b47f47f5471?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                alt="Thumbnail" class="w-full h-full object-cover">
                        </div>
                        <div
                            class="w-24 h-24 bg-gray-100 dark:bg-dark-bg rounded-md overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
                            <img src="https://images.unsplash.com/photo-1651008376811-b90baee60c1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                alt="Thumbnail" class="w-full h-full object-cover">
                        </div>
                        <div
                            class="w-24 h-24 bg-gray-100 dark:bg-dark-bg rounded-md overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
                            <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                alt="Thumbnail" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2" id="modalDoctorName">Dr. Marcus
                        Johnson</h2>
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="ml-2 text-gray-600 dark:text-gray-400">4.9 (127 reviews)</span>
                    </div>
                    <div class="flex items-center mb-6">
                        <span
                            class="bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium">Cardiology</span>
                        <span
                            class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-3 py-1 rounded-full text-sm font-medium ml-2">Available
                            Today</span>
                    </div>
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">About</h3>
                        <p class="text-gray-700 dark:text-gray-300" id="modalDescription">Dr. Marcus Johnson is a
                            board-certified cardiologist with over 15 years of experience in diagnosing and treating
                            heart conditions. He specializes in preventive cardiology, heart failure management, and
                            cardiac rehabilitation. Dr. Johnson is passionate about patient education and empowering
                            individuals to take control of their heart health.</p>
                    </div>
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Qualifications</h3>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                            <li class="flex items-center">
                                <i class="fas fa-graduation-cap text-primary mr-2"></i>
                                <span>MD, Howard University College of Medicine</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-certificate text-primary mr-2"></i>
                                <span>Board Certified in Cardiovascular Disease</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-hospital text-primary mr-2"></i>
                                <span>Fellow, American College of Cardiology</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-clock text-primary mr-2"></i>
                                <span>15+ Years Experience</span>
                            </li>
                        </ul>
                    </div>
                    <div class="flex gap-4">
                        <button
                            class="btn-scale flex-1 py-3 bg-primary hover:bg-opacity-90 text-white font-bold rounded-lg transition-colors">
                            Schedule Appointment
                        </button>
                        <button
                            class="btn-scale px-4 py-3 border border-primary text-primary hover:bg-primary hover:bg-opacity-10 font-bold rounded-lg transition-colors">
                            <i class="fas fa-video"></i> Video Call
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointments Modal -->
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

    <!-- Hero Section with Stats -->
    <section
        class="relative py-12 md:py-20 bg-gradient-to-br from-indigo-50 to-blue-100 dark:from-indigo-900 dark:from-10% dark:to-gray-900 overflow-hidden">
        <div class="absolute right-0 top-0 w-full h-full opacity-30 pointer-events-none">
            <svg width="100%" height="100%" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="pattern" patternUnits="userSpaceOnUse" width="50" height="50"
                        patternTransform="scale(2) rotate(0)">
                        <path id="path" d="M25,0 L25,50 M0,25 L50,25" stroke="currentColor" stroke-width="1">
                        </path>
                    </pattern>
                </defs>
                <rect width="800" height="800" fill="url(#pattern)" class="text-primary opacity-20"></rect>
            </svg>
        </div>
        <div class="container mx-auto px-4 relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="fade-in">
                    <span
                        class="inline-block bg-secondary bg-opacity-20 dark:bg-opacity-30 text-secondary px-4 py-2 rounded-full text-sm font-semibold mb-4">Take
                        Charge Of Your Well-being</span>
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                        Premium <span class="text-primary">health </span>services at low Prices
                    </h1>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 max-w-lg">
                        Access quality healthcare from anywhere with 24/7 online consultations, live chat, and video
                        calls with licensed doctors--quick, convenient, and affordable.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#featured"
                            class="btn-scale px-8 py-4 bg-primary hover:bg-opacity-90 text-white font-bold rounded-lg transition-colors">
                            Get to a doctor
                        </a>
                        <a href="#how-it-works"
                            class="btn-scale px-8 py-4 border-2 border-primary text-primary hover:bg-primary hover:bg-opacity-10 font-bold rounded-lg transition-colors">
                            How It Works
                        </a>
                    </div>
                    <div class="mt-8 flex flex-wrap items-center gap-6">
                        <div class="flex">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Patient"
                                class="w-10 h-10 rounded-full border-2 border-white dark:border-dark-bg shadow-sm">
                            <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Patient"
                                class="w-10 h-10 rounded-full border-2 border-white dark:border-dark-bg shadow-sm -ml-2">
                            <img src="https://randomuser.me/api/portraits/women/67.jpg" alt="Patient"
                                class="w-10 h-10 rounded-full border-2 border-white dark:border-dark-bg shadow-sm -ml-2">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Patient"
                                class="w-10 h-10 rounded-full border-2 border-white dark:border-dark-bg shadow-sm -ml-2">
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-sm">
                            <span class="font-semibold">1,500+ patients</span> trust us with their health
                        </p>
                    </div>
                </div>
                <div class="relative slide-in-right">
                    <div class="relative bg-white dark:bg-dark-card p-4 rounded-2xl shadow-xl transform -rotate-2">
                        <img src="images/young-woman-having-video-call-with-doctor-her-friend_23-2148944830.jpg"
                            alt="Doctor consultation" class="w-full h-auto rounded-lg shadow-sm">
                        <div
                            class="absolute -right-6 -bottom-6 bg-secondary text-white rounded-full w-24 h-24 flex flex-col items-center justify-center font-bold shadow-lg transform rotate-12">
                            <span class="text-sm">Save</span>
                            <span class="text-xl">70%</span>
                        </div>
                    </div>
                    <div
                        class="absolute -top-4 -left-4 bg-white dark:bg-dark-card p-4 rounded-lg shadow-md flex items-center bg-opacity-85 dark:bg-opacity-85">
                        <i class="fas fa-user-md text-primary text-xl mr-3"></i>
                        <span class="font-medium"><span id="doctorCount">32</span>+ verified doctors</span>
                    </div>
                    <div
                        class="absolute -bottom-8 -right-2 bg-white dark:bg-dark-card p-4 rounded-lg shadow-md flex items-center">
                        <i class="fas fa-th-large text-primary text-xl mr-3"></i>
                        <span class="font-medium"><span id="categoryCount">8</span> medical specialties</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="container mx-auto px-4 mt-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                    <div class="flex flex-col items-center text-center">
                        <div class="text-primary text-3xl mb-2">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white">32+</h3>
                        <p class="text-gray-600 dark:text-gray-400">Expert Doctors</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                    <div class="flex flex-col items-center text-center">
                        <div class="text-primary text-3xl mb-2">
                            <i class="fas fa-hospital-user"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white">1,500+</h3>
                        <p class="text-gray-600 dark:text-gray-400">Happy Patients</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                    <div class="flex flex-col items-center text-center">
                        <div class="text-primary text-3xl mb-2">
                            <i class="fas fa-th-large"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white">8</h3>
                        <p class="text-gray-600 dark:text-gray-400">Medical Specialties</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                    <div class="flex flex-col items-center text-center">
                        <div class="text-primary text-3xl mb-2">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 dark:text-white">4.8</h3>
                        <p class="text-gray-600 dark:text-gray-400">Patient Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Doctors Section -->
    <section id="featured" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-900 dark:text-white mb-4">Our Top
                    Medical Specialists</h2>
                <p class="text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                    Carefully selected top medical specialists offering expert, compassionate care across a range of
                    critical health fields to ensure the best outcomes for our patients.
                </p>
            </div>

            <!-- Search Bar -->
            <div class="mb-8 max-w-3xl mx-auto">
                <div class="relative">
                    <input type="text" id="doctor-search"
                        placeholder="Search for doctors or medical specialties..."
                        class="w-full px-5 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-primary text-base">
                    <button id="search-button"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-search mr-2"></i> Search
                    </button>
                </div>
            </div>

            <!-- Filters -->
            <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                <div class="flex flex-wrap gap-2" id="specialty-filters">
                    <button data-specialty="all"
                        class="filter-btn px-4 py-2 bg-primary text-white rounded-full text-sm font-medium hover:bg-opacity-90 transition-colors active">All
                        Specialties</button>
                    <button data-specialty="cardiology"
                        class="filter-btn px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">Cardiology</button>
                    <button data-specialty="pediatrics"
                        class="filter-btn px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">Pediatrics</button>
                    <button data-specialty="neurology"
                        class="filter-btn px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">Neurology</button>
                    <button data-specialty="dermatology"
                        class="filter-btn px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">Dermatology</button>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-gray-700 dark:text-gray-300 text-sm">Sort by:</span>
                    <select id="doctor-sort"
                        class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-700 dark:text-gray-300 text-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="rating">Highest Rating</option>
                        <option value="experience">Most Experience</option>
                        <option value="availability">Earliest Availability</option>
                        <option value="name">Name (A-Z)</option>
                    </select>
                </div>
            </div>

            <!-- Doctor Cards Grid -->
            <div id="doctor-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Doctor cards will be inserted here by JavaScript -->
            </div>

            <div class="text-center mt-8">
                <a href="#"
                    class="inline-block px-8 py-3 bg-primary hover:bg-opacity-90 text-white font-bold rounded-lg transition-colors">
                    View All Doctors
                </a>
            </div>
        </div>
    </section>

    <!-- Healthcare Services Section -->
    <section id="categories" class="py-16 bg-white dark:bg-dark-card">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-900 dark:text-white mb-4">Our
                    Healthcare Services</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                    Access a wide range of medical specialties and services through our virtual healthcare platform
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="group relative rounded-xl overflow-hidden h-64 slide-in-bottom">
                    <img src="images/Telehealth Services Cancun - Telemed Mexico.jpeg" alt="General Medicine"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Primary Care</h3>
                        <p class="text-gray-300 mb-4">
                            Common illnesses, preventive care, chronic conditions management
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-white font-semibold group-hover:text-secondary transition-colors">
                            Find a Doctor <i
                                class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="group relative rounded-xl overflow-hidden h-64 slide-in-bottom delay-200">
                    <img src="images/Telemedicina_ Transformando o Futuro dos Cuidados de Saúde, Saiba Como Esse Futuro Pode Transform___.jpeg"
                        alt="Pediatrics"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Pediatrics</h3>
                        <p class="text-gray-300 mb-4">
                            Child wellness visits, development monitoring, teen health
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-white font-semibold group-hover:text-secondary transition-colors">
                            Find a Pediatrician <i
                                class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="group relative rounded-xl overflow-hidden h-64 slide-in-bottom delay-400">
                    <img src="images/Healthy Brain illustration and mental heath design _ Premium AI-generated image.jpeg"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Mental Health</h3>
                        <p class="text-gray-300 mb-4">
                            Therapy, counseling, psychiatric care, medication management
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-white font-semibold group-hover:text-secondary transition-colors">
                            Speak with a Therapist <i
                                class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Service Card 4 -->
                <div class="group relative rounded-xl overflow-hidden h-64 slide-in-bottom">
                    <img src="images/CeraVe Launches Fund For Howard University's___.jpeg"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Dermatology</h3>
                        <p class="text-gray-300 mb-4">
                            Skin conditions, rashes, acne, eczema, virtual skin checks
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-white font-semibold group-hover:text-secondary transition-colors">
                            See a Dermatologist <i
                                class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Service Card 5 -->
                <div class="group relative rounded-xl overflow-hidden h-64 slide-in-bottom delay-200">
                    <img src="images/Breakthrough analysis highlights Imperial's power in cardiovascular science _ Imperial Inform___.jpeg"
                        alt="Cardiology"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Cardiology</h3>
                        <p class="text-gray-300 mb-4">
                            Heart health, blood pressure, cholesterol management
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-white font-semibold group-hover:text-secondary transition-colors">
                            Heart Health Consult <i
                                class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Service Card 6 -->
                <div class="group relative rounded-xl overflow-hidden h-64 slide-in-bottom delay-400">
                    <img src="images/Focus on digital health leads to emergence of new roles in healthtech.jpeg"
                        alt="Specialist Referrals"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Specialist Referrals</h3>
                        <p class="text-gray-300 mb-4">
                            Connect with specialists for complex medical conditions
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-white font-semibold group-hover:text-secondary transition-colors">
                            Request Referral <i
                                class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-900 dark:text-white mb-4">How It Works
                </h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                    Experience healthcare from the comfort of your home with our easy-to-use online consultation
                    platform
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mx-auto ">
                <!-- Step 1 -->
                <div class="text-center  shadow-md slide-in-bottom rounded-lg p-4">
                    <div
                        class="w-20 h-20 mx-auto mb-6 rounded-full bg-primary bg-opacity-10 dark:bg-opacity-20 flex items-center justify-center">
                        <i class="fas fa-search text-4xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">1. Choose Your Doctor</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Browse our network of board-certified physicians. Filter by specialty, availability, language,
                        or rating to find the perfect match for your healthcare needs.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center shadow-md slide-in-bottom rounded-lg delay-200 p-4">
                    <div
                        class="w-20 h-20 mx-auto mb-6 rounded-full bg-primary bg-opacity-10 dark:bg-opacity-20 flex items-center justify-center">
                        <i class="fas fa-calendar-check text-4xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">2. Schedule & Connect</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Book an appointment at your convenience or connect with available doctors immediately.
                        Consultations take place through secure video, audio, or chat.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center shadow-md slide-in-bottom rounded-lg delay-400 p-4">
                    <div
                        class="w-20 h-20 mx-auto mb-6 rounded-full bg-primary bg-opacity-10 dark:bg-opacity-20 flex items-center justify-center">
                        <i class="fas fa-clipboard-check text-4xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">3. Receive Care</h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        Get diagnosis, treatment plans, prescriptions, lab orders, specialist referrals, and follow-up
                        care. All medical records are securely stored in your account.
                    </p>
                </div>
            </div>

            <div class="mt-16 bg-white dark:bg-dark-bg rounded-2xl p-8 shadow-sm slide-in-bottom">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Healthcare Membership Plans
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-6">
                            Save on healthcare costs with our affordable membership plans. Our plans include:
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                <span class="text-gray-700 dark:text-gray-300">Unlimited primary care
                                    consultations</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                <span class="text-gray-700 dark:text-gray-300">Discounted specialist visits and mental
                                    health services</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                <span class="text-gray-700 dark:text-gray-300">Prescription discounts and medication
                                    management</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                <span class="text-gray-700 dark:text-gray-300">24/7 access to healthcare
                                    professionals</span>
                            </li>
                        </ul>
                        <a href="#"
                            class="btn-scale inline-block mt-6 px-6 py-3 bg-primary hover:bg-opacity-90 text-white font-bold rounded-lg transition-colors">
                            View Membership Plans
                        </a>
                    </div>
                    <div class="relative">
                        <img src="images/Beneficence.jpeg" alt="Healthcare Membership"
                            class="w-full rounded-xl shadow-md">
                        <div class="absolute -bottom-5 -right-5 bg-white dark:bg-dark-card p-4 rounded-lg shadow-lg">
                            <div class="flex items-center">
                                <div class="mr-3 text-primary text-3xl">
                                    <i class="fas fa-heartbeat"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 dark:text-white">Starting at</p>
                                    <p class="text-2xl font-bold text-secondary">$29/month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section with Slider -->
    <section id="testimonials" class="py-16 bg-white dark:bg-dark-card">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-900 dark:text-white mb-4">Patient
                    Success Stories</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                    Hear from our patients who received exceptional care through our online consultation platform
                </p>
            </div>

            <!-- Testimonial Slider -->
            <div class="testimonial-slider relative max-w-4xl mx-auto overflow-hidden">
                <div class="testimonial-track flex transition-transform duration-500" id="testimonialTrack">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-slide min-w-full">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl shadow-md p-6">
                            <div class="text-yellow-400 mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                "I was feeling terrible with flu symptoms but couldn't leave home. The online
                                consultation with Dr. Johnson was so convenient! He diagnosed me quickly, sent my
                                prescription to my local pharmacy, and I was feeling better in no time."
                            </p>
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Patient"
                                    class="w-12 h-12 rounded-full mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">Michael Rodriguez</h4>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Patient since 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="testimonial-slide min-w-full">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl shadow-md p-6">
                            <div class="text-yellow-400 mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                "As a busy mom of three, finding time to see a doctor was always a challenge. DocZone
                                has been a lifesaver! Dr. Williams has been monitoring my ongoing skin condition with
                                regular virtual check-ups, saving me countless hours in waiting rooms."
                            </p>
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Patient"
                                    class="w-12 h-12 rounded-full mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">Sarah Johnson</h4>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Patient since 2021</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="testimonial-slide min-w-full">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl shadow-md p-6">
                            <div class="text-yellow-400 mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                "I live in a rural area with limited access to specialists. Through DocZone, I was able
                                to consult with a top neurologist who helped manage my migraines. The video consultation
                                was clear, and the doctor was extremely thorough."
                            </p>
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/68.jpg" alt="Patient"
                                    class="w-12 h-12 rounded-full mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">David Thompson</h4>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Patient since 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="testimonial-slide min-w-full">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl shadow-md p-6">
                            <div class="text-yellow-400 mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                "The mental health services on DocZone have been transformative for me. My therapist and
                                I connect weekly without the stress of commuting to appointments. The platform is secure
                                and easy to use, making therapy much more accessible."
                            </p>
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/52.jpg" alt="Patient"
                                    class="w-12 h-12 rounded-full mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-900 dark:text-white">Tanisha Williams</h4>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Patient since 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Navigation -->
                <div class="testimonial-slider-nav flex justify-center mt-6 gap-2">
                    <button
                        class="testimonial-prev p-2 rounded-full border border-gray-300 dark:border-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="testimonial-dot w-3 h-3 rounded-full bg-primary" data-index="0"></button>
                    <button class="testimonial-dot w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-700"
                        data-index="1"></button>
                    <button class="testimonial-dot w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-700"
                        data-index="2"></button>
                    <button class="testimonial-dot w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-700"
                        data-index="3"></button>
                    <button
                        class="testimonial-next p-2 rounded-full border border-gray-300 dark:border-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctor Blog Section -->
    <section id="blog" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-900 dark:text-white mb-4">Doctor
                    Insights & Health Tips</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                    Expert medical advice and health information from our network of healthcare professionals
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <div
                    class="bg-white dark:bg-dark-card rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl slide-in-bottom">
                    <div class="h-56 overflow-hidden">
                        <img src="images/The+Correlation+Between+Exercise+and+Heart+Health.jpeg" alt="Heart Health"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Dr. Marcus Johnson"
                                class="w-10 h-10 rounded-full mr-3 border-2 border-primary">
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Dr. Marcus Johnson</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Cardiology</p>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">5 Simple Ways to Improve
                            Heart Health Today</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Discover five actionable steps you can take right now to strengthen your heart and prevent
                            cardiovascular disease, regardless of your age.
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500 dark:text-gray-400">April 15, 2023</span>
                            <a href="#" class="text-primary font-semibold hover:underline">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div
                    class="bg-white dark:bg-dark-card rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl slide-in-bottom delay-200">
                    <div class="h-56 overflow-hidden">
                        <img src="{{ asset('Images/Home - Los Alamitos Pediatrics _ CHOC Primary Care.jpeg') }}"
                            alt="Child Fever"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Dr. Olivia Williams"
                                class="w-10 h-10 rounded-full mr-3 border-2 border-primary">
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Dr. Olivia Williams</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Pediatrics</p>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">When to Worry About Your
                            Child's Fever</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Learn the important signs that differentiate a normal fever from one requiring medical
                            attention, and get practical advice for keeping kids comfortable.
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500 dark:text-gray-400">May 2, 2023</span>
                            <a href="#" class="text-primary font-semibold hover:underline">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div
                    class="bg-white dark:bg-dark-card rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl slide-in-bottom delay-400">
                    <div class="h-56 overflow-hidden">
                        <img src="images/Ringing in your ears_ About 750 million people have this perplexing condition, study says.jpeg"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                alt="Dr. Jasmine Carter"
                                class="w-10 h-10 rounded-full mr-3 border-2 border-primary">
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Dr. Jasmine Carter</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Psychiatry</p>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Breaking the Stigma: Mental
                            Health in the Black Community</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Addressing cultural barriers to mental healthcare and highlighting the importance of seeking
                            support for psychological well-being.
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500 dark:text-gray-400">May 10, 2023</span>
                            <a href="#" class="text-primary font-semibold hover:underline">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="btn-scale px-6 py-3 bg-primary hover:bg-opacity-90 text-white font-bold rounded-lg transition-colors">
                    View All Articles
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 bg-white dark:bg-dark-card">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold font-display text-gray-900 dark:text-white mb-4">Frequently
                    Asked Questions</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                    Everything you need to know about DocZone's online medical consultations
                </p>
            </div>

            <div class="max-w-3xl mx-auto slide-in-bottom">
                <!-- FAQ Item 1 -->
                <div class="mb-6">
                    <button
                        class="faq-toggle flex justify-between items-center w-full text-left bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">How do online consultations
                            work?</span>
                        <i class="fas fa-chevron-down text-gray-600 dark:text-gray-400 transition-transform"></i>
                    </button>
                    <div class="faq-content mt-2 bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hidden">
                        <p class="text-gray-700 dark:text-gray-300">
                            Online consultations on DocZone are simple and convenient. First, select a doctor based on
                            your medical needs or choose "Urgent Care" for immediate assistance. You can schedule an
                            appointment or, in many cases, see a doctor right away. The consultation takes place through
                            our secure video platform. The doctor will discuss your symptoms, provide diagnosis,
                            recommend treatment options, and can even send prescriptions directly to your preferred
                            pharmacy if needed.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="mb-6">
                    <button
                        class="faq-toggle flex justify-between items-center w-full text-left bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">What medical conditions can
                            be treated through DocZone?</span>
                        <i class="fas fa-chevron-down text-gray-600 dark:text-gray-400 transition-transform"></i>
                    </button>
                    <div class="faq-content mt-2 bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hidden">
                        <p class="text-gray-700 dark:text-gray-300">
                            DocZone is suitable for many non-emergency medical conditions, including cold and flu
                            symptoms, allergies, skin conditions, minor infections, chronic disease management, mental
                            health concerns, and general health questions. Our specialists also provide follow-up care
                            and second opinions. However, online consultations are not appropriate for medical
                            emergencies such as chest pain, severe bleeding, or difficulty breathing. In those cases,
                            please call emergency services (911) immediately.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="mb-6">
                    <button
                        class="faq-toggle flex justify-between items-center w-full text-left bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">Are the doctors on DocZone
                            licensed and verified?</span>
                        <i class="fas fa-chevron-down text-gray-600 dark:text-gray-400 transition-transform"></i>
                    </button>
                    <div class="faq-content mt-2 bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hidden">
                        <p class="text-gray-700 dark:text-gray-300">
                            Yes, all healthcare providers on DocZone are fully licensed, board-certified medical
                            professionals. We have a rigorous verification process that includes credential
                            authentication, background checks, and ongoing performance monitoring. You can view each
                            doctor's qualifications, education, specialties, and patient ratings on their profile page.
                            We only partner with qualified healthcare professionals who meet our high standards for
                            quality care.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="mb-6">
                    <button
                        class="faq-toggle flex justify-between items-center w-full text-left bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">How much does a consultation
                            cost?</span>
                        <i class="fas fa-chevron-down text-gray-600 dark:text-gray-400 transition-transform"></i>
                    </button>
                    <div class="faq-content mt-2 bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hidden">
                        <p class="text-gray-700 dark:text-gray-300">
                            Consultation costs vary depending on the type of service and specialist. General
                            practitioner visits typically range from $40-75, while specialist consultations may cost
                            between $75-150. Many insurance plans cover DocZone consultations - we accept most major
                            insurance providers and will show you your estimated cost before your appointment. We also
                            offer affordable self-pay options and subscription plans for frequent users, starting at
                            $29.99/month for unlimited primary care consultations.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="mb-6">
                    <button
                        class="faq-toggle flex justify-between items-center w-full text-left bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">Is my medical information
                            secure and private?</span>
                        <i class="fas fa-chevron-down text-gray-600 dark:text-gray-400 transition-transform"></i>
                    </button>
                    <div class="faq-content mt-2 bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hidden">
                        <p class="text-gray-700 dark:text-gray-300">
                            Your privacy is our top priority. DocZone is fully HIPAA-compliant and uses bank-level
                            encryption to protect your personal information. All video consultations are conducted
                            through our secure platform and are never recorded. Only your authorized healthcare
                            providers have access to your medical information. We maintain strict privacy protocols and
                            never sell your data to third parties. You can review our complete privacy policy for
                            detailed information on how we handle your data.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="mb-6">
                    <button
                        class="faq-toggle flex justify-between items-center w-full text-left bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">How do I get prescriptions
                            through DocZone?</span>
                        <i class="fas fa-chevron-down text-gray-600 dark:text-gray-400 transition-transform"></i>
                    </button>
                    <div class="faq-content mt-2 bg-gray-50 dark:bg-gray-700 p-5 rounded-lg hidden">
                        <p class="text-gray-700 dark:text-gray-300">
                            DocZone doctors can prescribe medications when medically necessary and send them
                            electronically to your preferred pharmacy for pickup. Simply add your pharmacy information
                            to your account or provide it during your consultation. Most prescriptions are processed
                            within minutes after your appointment. Please note that controlled substances (like opioids
                            and certain anxiety medications) cannot be prescribed through telehealth due to federal
                            regulations. Our doctors will discuss alternative treatments if these limitations affect
                            your care.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <p class="text-gray-700 dark:text-gray-300 mb-4">Still have questions? We're here to help!</p>
                <a href="#"
                    class="btn-scale inline-block px-6 py-3 bg-primary hover:bg-opacity-90 text-white font-bold rounded-lg transition-colors">
                    Contact Support
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-gradient-to-r from-primary to-indigo-700 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center fade-in">
                <h2 class="text-3xl md:text-4xl font-bold font-display mb-4">Stay Informed About Health</h2>
                <p class="text-lg opacity-90 mb-8">
                    Subscribe to our newsletter for health tips, wellness updates, and exclusive DocZone offers
                </p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <input type="email" placeholder="Your email address"
                        class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-secondary text-base">
                    <button type="submit"
                        class="btn-scale px-6 py-3 bg-secondary hover:bg-opacity-90 text-white font-bold rounded-lg transition-colors whitespace-nowrap">
                        Subscribe Now
                    </button>
                </form>
                <p class="text-sm opacity-80 mt-4">
                    We respect your privacy. Unsubscribe at any time.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Company Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">
                        <i class="fas fa-heartbeat mr-2"></i>DocZone
                    </h3>
                    <p class="text-gray-400 mb-4">
                        Your trusted source for premium online healthcare services and virtual consultations.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Find a
                                Doctor</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Healthcare
                                Plans</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">For
                                Doctors</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Billing
                                Information</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a>
                        </li>
                    </ul>
                </div>

                <!-- Help & Support -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Help & Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact
                                Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Patient
                                Resources</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of
                                Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy
                                Policy</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary"></i>
                            <span class="text-gray-400">123 Health Avenue, Suite 500<br>Healthcare City, CA
                                90210</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-primary"></i>
                            <span class="text-gray-400">1-800-DOCZONE</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-primary"></i>
                            <span class="text-gray-400">support@doczone.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-primary"></i>
                            <span class="text-gray-400">24/7 Support Available</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-gray-800 mb-6">

            <div class="flex justify-center items-center">
                <p class="text-gray-500 text-sm mb-4 md:mb-0">
                    © 2025 DocZone all rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        // Chat functionality
        document.addEventListener('DOMContentLoaded', function() {
            const chatList = document.querySelector('.chat-list');
            const individualChat = document.getElementById('individualChat');
            const emptyChatState = document.getElementById('emptyChatState');
            const activeChat = document.getElementById('activeChat');
            const chatMessages = document.getElementById('chatMessages');
            const messageInput = document.getElementById('messageInput');
            const sendMessageBtn = document.getElementById('sendMessageBtn');
            const chatTabs = document.querySelectorAll('.chat-tab');
            const recentChats = document.querySelector('.chat-list');
            const allDoctorsList = document.querySelector('.all-doctors-list');

            // Tab switching
            chatTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    chatTabs.forEach(t => t.classList.remove('border-primary', 'text-primary'));
                    tab.classList.add('border-primary', 'text-primary');

                    if (tab.textContent === 'Recent') {
                        recentChats.classList.remove('hidden');
                        allDoctorsList.classList.add('hidden');
                    } else {
                        recentChats.classList.add('hidden');
                        allDoctorsList.classList.remove('hidden');
                    }
                });
            });

            // Chat selection
            document.querySelectorAll('.chat-item, .doctor-item').forEach(item => {
                item.addEventListener('click', () => {
                    // Remove active state from all items
                    document.querySelectorAll('.chat-item, .doctor-item').forEach(i => {
                        i.classList.remove('bg-gray-100', 'dark:bg-gray-800');
                    });

                    // Add active state to selected item
                    item.classList.add('bg-gray-100', 'dark:bg-gray-800');

                    // Show chat interface
                    emptyChatState.classList.add('hidden');
                    activeChat.classList.remove('hidden');

                    // Update header with doctor info
                    const doctorName = item.querySelector('h4').textContent;
                    const doctorImage = item.querySelector('img').src;
                    document.querySelector('#activeChat .doctor-name').textContent = doctorName;
                    document.querySelector('#activeChat .doctor-image').src = doctorImage;

                    // Clear previous messages
                    chatMessages.innerHTML = '';

                    // Add welcome message
                    addMessage('Hello! How can I help you today?', 'received');
                });
            });

            // Send message
            function sendMessage() {
                const message = messageInput.value.trim();
                if (message) {
                    addMessage(message, 'sent');
                    messageInput.value = '';

                    // Simulate typing indicator
                    showTypingIndicator();

                    // Simulate response after 1-2 seconds
                    setTimeout(() => {
                        removeTypingIndicator();
                        addMessage('Thank you for your message. I will get back to you shortly.',
                            'received');
                    }, Math.random() * 1000 + 1000);
                }
            }

            // Add message to chat
            function addMessage(text, type) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `message ${type}`;

                const now = new Date();
                const time = now.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                messageDiv.innerHTML = `
                <div class="message-content">${text}</div>
                <div class="message-time">
                    ${time}
                    ${type === 'sent' ? '<span class="message-status"><i class="fas fa-check-double"></i></span>' : ''}
                </div>
            `;

                chatMessages.appendChild(messageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            // Show typing indicator
            function showTypingIndicator() {
                const indicator = document.createElement('div');
                indicator.className = 'typing-indicator';
                indicator.innerHTML = '<span></span><span></span><span></span>';
                chatMessages.appendChild(indicator);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            // Remove typing indicator
            function removeTypingIndicator() {
                const indicator = chatMessages.querySelector('.typing-indicator');
                if (indicator) {
                    indicator.remove();
                }
            }

            // Event listeners
            sendMessageBtn.addEventListener('click', sendMessage);
            messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
        });
    </script>
</body>

</html>
