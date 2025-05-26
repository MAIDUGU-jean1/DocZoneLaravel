<!DOCTYPE html>
<html lang="en">

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

<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Doctor Blogs</h1>
            <button onclick="toggleForm()"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                + New Blog
            </button>
        </div>

        <!-- New Blog Form (Hidden Initially) -->
        <div id="newBlogForm" class="hidden bg-white p-6 rounded-xl shadow mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add New Blog</h2>
            <form action="#" method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-1" for="title">Title</label>
                    <input type="text" id="title" name="title"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-1" for="content">Content</label>
                    <textarea id="content" name="content" rows="4"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">
                    Post Blog
                </button>
            </form>
        </div>

        <!-- Blog Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Blog Card -->
            <div
                class="bg-white p-5 rounded-xl shadow hover:shadow-lg transform hover:scale-[1.02] transition duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Understanding Diabetes</h2>
                <p class="text-gray-600 text-sm mb-4">
                    Learn about the causes, symptoms, and treatment of diabetes in this detailed guide.
                </p>
                <a href="#" class="text-blue-600 font-medium hover:underline">Read More</a>
            </div>

            <!-- Example Repeat Blog Card -->
            <div
                class="bg-white p-5 rounded-xl shadow hover:shadow-lg transform hover:scale-[1.02] transition duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Heart Health Tips</h2>
                <p class="text-gray-600 text-sm mb-4">
                    Discover effective tips to maintain a healthy heart and prevent cardiovascular diseases.
                </p>
                <a href="#" class="text-blue-600 font-medium hover:underline">Read More</a>
            </div>
        </div>
    </div>
</body>

</html>
