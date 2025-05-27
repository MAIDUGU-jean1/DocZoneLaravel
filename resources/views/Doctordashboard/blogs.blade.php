<x-app>
    <!DOCTYPE html>
    <html lang="en" class="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Blogs</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            function toggleForm() {
                const form = document.getElementById('newBlogForm');
                form.classList.toggle('hidden');
                form.classList.toggle('animate-slideIn');
            }
        </script>
        <style>
            @keyframes slideIn {
                0% {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-slideIn {
                animation: slideIn 0.3s ease-out forwards;
            }
        </style>
    </head>

    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen p-6">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6 mt-6 mx-3">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Doctor Blogs</h1>
                <button onclick="toggleForm()"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                    + New Blog
                </button>
            </div>

            <!-- New Blog Form (Hidden Initially) -->
            <div id="newBlogForm" class="hidden bg-white dark:bg-gray-800 p-6 rounded-xl shadow mb-6 relative">
                <!-- Close Icon -->
                <button onclick="toggleForm()"
                    class="absolute top-4 right-4 text-gray-500 dark:text-gray-300 hover:text-red-500">
                    &times;
                </button>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4 mx-8">Add New Blog</h2>
                <form action="{{ route('blogs') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="block text-gray-700 dark:text-gray-200 mb-1" for="title">Title</label>
                        <input type="text" id="title" name="title"
                            class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-200 mb-1" for="content">Content</label>
                        <textarea id="content" name="content" rows="4"
                            class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-200 mb-1" for="image">Image</label>
                        <input type="file" id="image" name="image"
                            class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <button type="submit"
                        class="bg-blue-600  text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">
                        Post Blog
                    </button>
                </form>
            </div>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-3 animate-fade-in">
                <!-- Blog Card -->
             <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow hover:shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="{{ asset('Images/Beneficence.jpeg')}}" alt="Understanding Diabetes" class="w-full h-48 object-cover rounded-lg mb-4">
                    
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Understanding Diabetes</h2>
                    
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Learn about the causes, symptoms, and treatment of diabetes in this detailed guide.
                    </p>
                    
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 font-medium hover:underline">Read More</a>
                        <p class="text-gray-400 font-medium">4:47pm</p>
                    </div>
            </div>


                <!-- Example Repeat Blog Card -->
               <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow hover:shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="{{ asset('Images/Beneficence.jpeg')}}" alt="Understanding Diabetes" class="w-full h-48 object-cover rounded-lg mb-4">
                    
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Understanding Diabetes</h2>
                    
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Learn about the causes, symptoms, and treatment of diabetes in this detailed guide.
                    </p>
                    
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 font-medium hover:underline">Read More</a>
                        <p class="text-gray-400 font-medium">4:47pm</p>
                    </div>
            </div>
    <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow hover:shadow-lg transform hover:scale-[1.02] transition duration-300">
                    <img src="{{ asset('Images/Beneficence.jpeg')}}" alt="Understanding Diabetes" class="w-full h-48 object-cover rounded-lg mb-4">
                    
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Understanding Diabetes</h2>
                    
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Learn about the causes, symptoms, and treatment of diabetes in this detailed guide.
                    </p>
                    
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 font-medium hover:underline">Read More</a>
                        <p class="text-gray-400 font-medium">4:47pm</p>
                    </div>
            </div>
            </div>
        </div>
    </body>

    </html>


</x-app>
