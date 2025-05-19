<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocZone Landing</title>
    <link href="../output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class=" bg-[#5D5CDE] tracking-wider  ">

    <header id="navbar" class="bg-white fixed w-full  top-0 left-0 z-50">

        <nav class="container flex  items-center justify-around h-16 sm:h-20">
            <div class="font-lobster font-bold sm:text-3xl">
                <span class="flex flex-col">
                    <p class="xl:text-3xl font-lobster"> DocZone</p>
                    <p class="bg-[#5D5CDE] h-5  text-[#5D5CDE]  text-xs w-20"></p>
                </span>
            </div>


            <div id="nav-menu"
                class="absolute text-lg  top-0 left-[-100%] min-h-[80-vh] w-full  bg-blur-sm
          backdrop-blur-sm flex items-center justify-center duration-300 overflow-hidden lg:static lg:min-h-fit lg:bg-transparent lg:w-auto">
                <ul class="flex flex-col font-bold items-center gap-8 lg:flex-row mb-3">
                    <li>
                        <a href="#home" class="nav-link ">Home</a>
                    </li>
                    <li>
                        <a href="#Contact" class="nav-link">Contact</a>
                    </li>
                    <li>
                        <a href="#Services" class="nav-link">Services</a>
                    </li>
                    <li>
                        <a href="#About Us" class="nav-link">About Us</a>
                    </li>
                    <li>
                        <a href="#Doctor" class="nav-link">Doctor</a>
                    </li>
                    <li>
                        <a href="#faq" class="nav-link">FAQ</a>
                    </li>
                    <li>
                        <button onclick="toggleModal('registerModal')"
                            class="text-white bg-[#5D5CDE] rounded-md text-center w-40 py-1">Register</button>
                    </li>
                    <li>
                        <button onclick="toggleModal('loginModal')"
                            class="text-white bg-[#5D5CDE] rounded-md text-center w-40 py-1">Login</button>
                    </li>
                </ul>

            </div>
            <div class="text-xl sm:text-4xl  cursor-pointer z-50 lg:hidden">
                <i class="ri-menu-line" id="hamburger"></i>
            </div>
        </nav>
    </header>


    <!-- Register Modal -->
    <div id="registerModal" style="display: none;"
        class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
        <div
            class="bg-white z-50 text-white rounded-2xl p-10 w-[500px] h-[100vh] relative flex flex-col justify-center overflow-auto">
            <button onclick="toggleModal('registerModal')"
                class="absolute top-4 right-6 text-black text-2xl font-bold">&times;</button>
            <h2 class="text-2xl mb-6 font-bold text-center text-[#5D5CDE]">Register</h2>
    <form action="{{ route('register') }}" method="POST" class="space-y-5">
        @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name"  class="mt-1 w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" :value="{{old('name')}}" />
              @error('name')
                  <span class="text-red-600">{{$message}}</span>
              @enderror
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email"  class="mt-1 w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
              @error('email')
                  <span class="text-red-600">{{$message}}</span>
              @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="mt-1 w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
              @error('phone')
                  <span class="text-red-600">{{$message}}</span>
              @enderror
            </div>
            
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Registering As</label>
                <select id="role" name="role"  class="mt-1 w-full px-4 py-1 border border-gray-300 text-black rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Select Role --</option>
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
                </select>
              @error('role')
                  <span class="text-red-600">{{$message}}</span>
              @enderror
            </div>
            
            <div id="specializationField" class="hidden">
                <label for="specialization" class="block text-sm font-medium text-gray-700">Specialization</label>
                <input type="text" id="specialization" name="specialization" class="mt-1 text-black w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
              @error('specialization')
                  <span class="text-red-600">{{$message}}</span>
              @enderror
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"  class="mt-1 w-full px-4 py-1 border text-black border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
              @error('password')
                  <span class="text-red-600">{{$message}}</span>
              @enderror
            </div>
            
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirm_password" name="password_confirmation"  class="mt-1 w-full px-4 py-1 border text-black border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>
            
            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox"  class="h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                <label for="terms" class="ml-2 block text-sm text-gray-600">
                I agree to the <a href="#" class="text-indigo-600 hover:underline">Terms & Conditions</a>
                </label>
              @error('terms')
                  <span class="text-red-600">{{$message}}</span>
              @enderror
            </div>
            
            <button type="submit" class="w-full bg-indigo-600 text-white py-1 rounded-md hover:bg-indigo-700 transition duration-200">
                Register
            </button>
    </form>
        </div>
    </div>


    <!-- Login Modal -->
    <div id="loginModal" style="display: none;"
        class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
        <div
            class="bg-white text-white rounded-2xl p-10 w-[500px] h-[70vh] relative flex flex-col justify-center overflow-auto">
            <button onclick="toggleModal('loginModal')"
                class="absolute top-4 right-6 text-black text-3xl font-bold">&times;</button>
            <h2 class="text-3xl mb-6 font-bold text-center text-[#5D5CDE]">Login</h2>
            <form class="space-y-6">
           
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required class="mt-1 w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="name" name="password" required class="mt-1 w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-1 rounded-md hover:bg-indigo-700 transition duration-200">
                Login
            </button>
            <div>
                <p class="text-center text-black">Already have an Account? <a href="#" class=" text-[#5D5CDE]">Register</a></p>
            </div>
            </form>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home"
        class=" mt-28 mx-10 lg:mx-20 md:mx-16 bg-[#5D5CDE]  justify-center items-center p-6 md:flex md:items-center md:justify-between">

        <div class=" space-y-3 max-w-xl">
            <p class="text-white text-2xl   lg:text-6xl md:text-4xl" id="text">|</p>


            <p class="mt-2 text-2xl  text-white font-bold ">Making Health Care Accessible To All</p>
            <p class="mt-2 text-xl text-gray-200 ">
                Consult with verified doctors online from the comfort of your home.
                Access quality healthcare services without the need for hospital visits.
                Enjoy convenient and flexible scheduling to fit your busy lifestyle.
            </p>
            <div class="mt-4 flex gap-4">
                <button class="bg-white text-gray-800 px-4 py-3 hover:bg-yellow-500 ">Make Appointment</button>
                <button class="bg-[#5D5CDE] text-gray-200 px-4 py-3 border border-white hover:bg-yellow-500">View
                    Departments</button>
            </div>
        </div>
        <div class="mt-6 md:mt-0 ">
            <img src="{{ asset('Images/Doctor with Stethoscope Smiling Isolated on White Background _ Premium AI-generated image.jpeg') }}"
                class="review__top-img h-full w-fit" alt="Doctor" />
        </div>
    </section>

    <!-- Info Cards -->
    <div id="Contact" class="coming-soon bg-blue-100 shadow-md mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
        <div id="Contactt" class="info__section bg-blue-50 p-4 rounded-md text-center">
            <div class=" flex flex-row space-x-2 justify-center">
                <p class="bg-[#5D5CDE] rounded-full w-5 h-5 text-center text-white text-lg  ">.</p>
                <p class="font-semibold">Contact Us <br></p>

            </div>
            <p>+237 650 598 930</p>
            <p class="">anybody@gmail.com</p>
        </div>
        <div class="info__section bg-blue-50 p-4 rounded-md text-center">
            <div class="flex flex-row space-x-2 justify-center">
                <p class="bg-[#5D5CDE] rounded-full w-5 h-5 text-center text-white text-lg  ">.</p>
                <p class="font-semibold">Open Hours</p>
            </div>
            <p>Mon-Fri: 8am - 8pm <br>
                Our doctors are open everyday to receive you.
            </p>
        </div>
        <div class="info__section bg-blue-50 p-4 rounded-md text-center">
            <div class="flex flex-row space-x-2 justify-center">
                <p class="bg-[#5D5CDE] rounded-full w-5 h-5 text-center text-white text-lg  ">.</p>
                <p>Services</p>
            </div>
            <p>Consultation <br> Emergency Services</p>
        </div>
    </div>

    <!-- Mission Statement -->
    <section id="Services" class="coming bg-white text-center py-10">
        <h2 class="text-4xl font-bold  text-gray-800">Our mission is to make healthcare more accessible</h2>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 px-6">
            <div class="bg-blue-50 p-6 rounded-md shadow">
                <h3 class="font-bold text-2xl mb-3">Primary Care</h3>
                <p class="font-semibold text-sm">Find answers to your general <br> health questions with our <br>
                    expert team</p>
                <button
                    class="font-bold text-white mt-4 bg-[#5D5CDE] border border-white rounded-md px-20 py-2 duration-300 btn-outline">
                    <span class="font bold"></span>
                    <p>Get Service</p>
                </button>
            </div>
            <div class="bg-blue-50 p-6 rounded-md shadow">
                <h3 class="font-semibold text-2xl mb-3">Emergency Service</h3>
                <p class="font-semibold text-sm">Get immediate attention in <br> case of a medical emergency - <br>
                    call us now.</p>
                <button
                    class="font-bold text-white mt-4 bg-[#5D5CDE] border border-white rounded-md px-20 py-2 duration-300 btn-outline">
                    <span class="font bold"></span>
                    <p>Call now</p>
                </button>
            </div>
            <div class="bg-blue-50 p-6 rounded-md shadow">
                <h3 class="font-semibold text-2xl mb-3">Consult a doctor</h3>
                <p class="font-semibold text-sm">Discuss your symptoms <br> with a verified doctor <br> and book an
                    appointment now.</p>
                <button
                    class="font-bold text-white mt-4 bg-[#5D5CDE] border border-white rounded-md px-20 py-2 duration-300 btn-outline">
                    <span class="font bold"></span>
                    <p>Consult</p>
                </button>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section id="About Us" class="bg-[#5D5CDE] py-10">
        <h2 class="health_care text-center text-3xl font-bold text-white mb-6">Our Healthcare Services</h2>
        <div class="info__section  grid grid-cols-1 md:grid-cols-3 gap-6 px-6">
            <div class="flex flex-row shadow p-4 bg-blue-100 mt-8 rounded-md  items-center">
                <div class="text-purple-800 bg-[#5D5CDE] h-16 w-16 rounded-full">
                    <img src="{{ asset('Images/esther.png') }}" alt="#" class="h-fit w-fit">
                </div>
                <div class=" p-3   rounded-md text-center flex flex-col">
                    <p class="font-bold text-black">Pregnancy Department</p>
                    <p class="text-gray-800">Come for a good experience and <br> delivery of your beautiful<br> and
                        fell secured.</p>
                </div>
            </div>
            <div class="flex flex-row shadow p-4 bg-blue-100 mt-8 rounded-md  items-center">
                <div class="text-purple-800 bg-[#5D5CDE] h-16 w-16 rounded-full">
                    <img src="{{ asset('Images/review1.png') }}" alt="#" class="h-fit w-fit">
                </div>
                <div class=" p-3   rounded-md text-center flex flex-col">
                    <p class="font-bold text-black">Pediatric Department</p>
                    <p class="text-gray-800">Experience expert care and a safe, welcoming <br>environment for your
                        little ones. Your child's health is <br> our priority.</p>
                </div>
            </div>
            <div class="flex flex-row shadow p-4 bg-blue-100 mt-8 rounded-md  items-center">
                <div class="text-purple-800 bg-[#5D5CDE] h-16 w-16 rounded-full">
                    <img src="{{ asset('Images/mark.png') }}" alt="#" class="h-fit w-fit">
                </div>
                <div class=" p-3   rounded-md text-center flex flex-col">
                    <p class="font-bold text-black">Dental Department</p>
                    <p class="text-gray-800">Experience top-quality dental care in a <br> comfortable and safe
                        environment. <br>Your smile is our priority.</p>
                </div>
            </div>
            <div class="flex flex-row shadow p-4 bg-blue-100 mt-8 rounded-md  items-center">
                <div class="text-purple-800 bg-[#5D5CDE] h-16 w-16 rounded-full">
                    <img src="{{ asset('Images/j.png') }}" alt="#" class="h-fit w-fit">
                </div>
                <div class=" p-3   rounded-md text-center flex flex-col">
                    <p class="font-bold text-black">Nursing Department</p>
                    <p class="text-gray-800">Providing compassionate and expert care <br> to ensure comfort, safety,
                        and <br>well-being for every patient.</p>
                </div>
            </div>
            <div class="flex flex-row shadow p-4 bg-blue-100 mt-8 rounded-md  items-center">
                <div class="text-purple-800 bg-[#5D5CDE] h-16 w-16 rounded-full">
                    <img src="{{ asset('Images/img 1.png') }}" alt="#" class="h-fit w-fit">
                </div>
                <div class=" p-3   rounded-md text-center flex flex-col">
                    <p class="font-bold text-black">Cardiology Department</p>
                    <p class="text-gray-800">Providing expert heart care with advanced <br> treatments and a
                        patient-centered approach. <br>Your heart health is our priority.</p>
                </div>
            </div>
            <div class="flex flex-row shadow p-4 bg-blue-100 mt-8 rounded-md  items-center">
                <div class="text-purple-800 bg-[#5D5CDE] h-16 w-16 rounded-full">
                    <img src="{{ asset('Images/img22.png') }}" alt="#" class="h-fit w-fit">
                </div>
                <div class=" p-3   rounded-md text-center flex flex-col">
                    <p class="font-bold text-black">Neurology Department</p>
                    <p class="text-gray-800">Providing expert neurological care with <br>advanced diagnostics and
                        treatments. Your <br> brain health is our priority.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="Doctor" class="py-5 md:py-5 relative">
        <div class="flex flex-col mb-20 mx-auto items-center gap-5 lg:flex-row bg-blue-100  p-5 rounded-lg">
            <!-- image -->
            <div class="w-full mt-10 relative lg:w-1/3 md:mt-6 sm:mt-14">
                <img src="../Médico negro verificando a pressão de medição na mão do paciente _ Foto Premium.jpeg"
                    alt="home_image" class="health_man h-full w-fit">
            </div>
            <!-- content -->
            <div class="container home__data w-full mb-10 space-y-5 lg:w-1/2">
                <h1 class="mt-20 mb-5 text-3xl md:text-4xl xl:text-5xl font-bold">
                    Our caring doctors <br> are here for you
                </h1>
                <p class="text-slate-900 ">Our caring doctors are dedicated to providing you with personalized
                    and professional healthcare. Book an appointment or learn more about our doctors. 🌿🌱
                </p>

                <div class="flex gap-2 sm:flex-row md:gap-4 lg:pt-5 xl:pt-10">
                    <button
                        class="border border-purple-500 bg-[#5D5CDE] rounded-md px-4 py-2 duration-300 btn-outline">
                        <span class="font bold"></span>
                        <i class="ri-leaf-line">Make an Appointment</i>
                    </button>

                    <button class="border border-purple-800 rounded-md px-4 py-2 duration-300 btn-outline">
                        <span class="font bold"></span>
                        <i>View our Doctors</i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->

    <section id="faq" class="py-16 bg-[#5D5CDE] dark:bg-dark-card text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold font-display mb-4">Frequently Asked Questions</h2>
                <p class="text-lg max-w-2xl mx-auto">
                    Everything you need to know about DocZone's online medical consultations
                </p>
            </div>

            <div class="max-w-3xl mx-auto space-y-4">
                <!-- Template for FAQ Items -->
                <div class="faq-item bg-white text-black rounded-lg">
                    <button
                        class="faq-toggle flex justify-between items-center w-full p-5 rounded-lg hover:bg-gray-100 transition">
                        <span class="text-lg font-semibold">How do online consultations work?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 border-t border-gray-200">
                        <p>
                            Online consultations on DocZone are simple and convenient...
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white text-black rounded-lg">
                    <button
                        class="faq-toggle flex justify-between items-center w-full p-5 rounded-lg hover:bg-gray-100 transition">
                        <span class="text-lg font-semibold">What medical conditions can be treated through
                            DocZone?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 border-t border-gray-200">
                        <p>
                            DocZone is suitable for many non-emergency medical conditions...
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white text-black rounded-lg">
                    <button
                        class="faq-toggle flex justify-between items-center w-full p-5 rounded-lg hover:bg-gray-100 transition">
                        <span class="text-lg font-semibold">Are the doctors on DocZone licensed and verified?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 border-t border-gray-200">
                        <p>
                            Yes, all healthcare providers on DocZone are fully licensed...
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white text-black rounded-lg">
                    <button
                        class="faq-toggle flex justify-between items-center w-full p-5 rounded-lg hover:bg-gray-100 transition">
                        <span class="text-lg font-semibold">How much does a consultation cost?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 border-t border-gray-200">
                        <p>
                            Consultation costs vary depending on the type of service...
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white text-black rounded-lg">
                    <button
                        class="faq-toggle flex justify-between items-center w-full p-5 rounded-lg hover:bg-gray-100 transition">
                        <span class="text-lg font-semibold">Is my medical information secure and private?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 border-t border-gray-200">
                        <p>
                            Your privacy is our top priority. DocZone is fully HIPAA-compliant...
                        </p>
                    </div>
                </div>

                <div class="faq-item bg-white text-black rounded-lg">
                    <button
                        class="faq-toggle flex justify-between items-center w-full p-5 rounded-lg hover:bg-gray-100 transition">
                        <span class="text-lg font-semibold">How do I get prescriptions through DocZone?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 border-t border-gray-200">
                        <p>
                            DocZone doctors can prescribe medications when medically necessary...
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <p class="mb-4 text-white font-medium">Still have questions? We're here to help!</p>
                <a href="#Contactt"
                    class="inline-block px-6 py-3 bg-white text-[#5D5CDE] font-bold rounded-lg hover:bg-gray-100">
                    Contact Support
                </a>
            </div>
        </div>
    </section>


    <!------ Footer ------>
    <footer class="bg-[#5D5CDE]  pt-28 mx-20 mt-20  pb-10 md:pb-28 relative">
        <!------- News letter ------>
        <div class=" container absolute top-0  right-0 left-0 -translate-y-1/2">
            <div class=" bg-blue-100 px-10 pt-5 pb-10 space-y-10 rounded-md">
                <h3 class=" font-bold text-xl text-[#5D5CDE]">
                    <span class="  pt-20 pb-10 md:pb-28 relative">
                        Subscribe
                    </span> to my newsletter
                </h3>

                <div class=" flex flex-col md:flex-row  gap-1">
                    <input type="email" placeholder="Enter email"
                        class="w-full px-5 py-3  rounded-md outline-none">
                    <button
                        class="flex  items-center justify-center gap-1 px-5 py-3 bg-[#5D5CDE] rounded-md hover:opacity-80 duration-300">
                        <span class="text-white">
                            Subscribe
                        </span>
                        <i class="ri-send-plane-2-line text-white"></i>
                    </button>
                </div>
            </div>
        </div>

        <!----- social icon ----->
        <div class="footer__icon container mt-16 mb-10">
            <div class="border-b border-white relative">
                <div class="absolute top-0 transform -translate-y-1/2 left-0 right-0 max-w-36 mx-auto">
                    <div class="bg-blue-200 text-xl flex items-center space-x-2">
                        <i class="ri-instagram-line hover:text-[#5D5CDE] duration-300 cursor-pointer ml-5 "></i>
                        <i class="ri-facebook-line hover:text-[#5D5CDE] duration-300 cursor-pointer"></i>
                        <i class="ri-twitter-x-line hover:text-[#5D5CDE] duration-300 cursor-pointer text-base"></i>
                        <i class="ri-linkedin-line hover:text-[#5D5CDE] duration-300 cursor-pointer"></i>
                    </div>
                </div>
            </div>
        </div>


        <!----- content ------>
        <div
            class="footer__content container text-white  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 text-center md:text-start ">
            <!-- item 1 -->
            <div>
                <div class="text-9xl text-white text-center inline-block ">
                    <img class="w-48 " src="{{ asset('Images/teacher-png-28479.png') }}" alt="#logo">
                    <p class="font-lobster text-xl sm:text-2xl">DocZone</p>
                </div>
            </div>


            <!-- item 2 -->
            <div>
                <p class="mb-5 font-bold text-xl">Quick Link</p>

                <div class="flex flex-col gap-1">
                    <a href="#">Health Care</a>
                    <a href="#">Good living</a>
                    <a href="#">Nursing</a>
                    <a href="#">Cleanliness</a>
                    <a href="#">Shipping</a>
                </div>
            </div>


            <!-- item 3 -->
            <div>
                <p class="mb-5 font-bold text-xl">Popular Services</p>

                <div class="flex flex-col gap-1">
                    <a href="#">HND Program</a>
                    <a href="#">Midwifery</a>
                    <a href="#">Lab Technician</a>
                    <a href="#">Consultation</a>
                </div>
            </div>

            <!-- item 4 -->
            <div>
                <p class="mb-5 font-bold text-xl">Contact Me</p>

                <div class="flex flex-col gap-1">
                    <a href="tel:+237650598930"> +237 650 598 930</a>
                    <a href="mailto:Anybody@gmail">Anybody@gmail.com</a>
                    <br>
                    <p>1234 Bambili city, Bamenda-Cameroon, Cameroon-Douala, BBC</p>
                </div>
            </div>
        </div>

        <!-- copyright -->
        <div class="copy__right container">
            <p class="text-center mt-8 font-bold"> Copyright &copy; 2025 All Rights Reserved.</p>
        </div>

    </footer>

    <!-- Scroll up -->
    <a href="#"
        class="fixed right-4 -bottom-1/2 bg-white shadow-sm inline-block px-3 py-1 md:px-4 md:py-2 rounded-md text-lg z-50 hover:-translate-y-1 duration-300"
        id="scroll-up">
        <i class="ri-arrow-up-s-line"></i>
    </a>

    <script src='{{ asset('js/index.js') }}'></script>


    <!-- ScrollReveal -->
    <script src="../js/scrollreveal.min.js"></script>

    <!----FAQ link---->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <script>
        window.onload = function() {
            class AutoTyping {
                constructor(selector, textArray, {
                    typeSpeed = 150,
                    deleteSpeed = 150,
                    waitBeforeDelete = 1000,
                    waitBetweenWords = 1000
                } = {}) {
                    this.selector = selector;
                    this.textArray = textArray;
                    this.typeSpeed = typeSpeed;
                    this.deleteSpeed = deleteSpeed;
                    this.waitBeforeDelete = waitBeforeDelete;
                    this.waitBetweenWords = waitBetweenWords;
                    this.el = document.querySelector(selector);
                }

                async start() {
                    while (true) {
                        for (let text of this.textArray) {
                            await this.writeText(text);
                        }
                    }
                }

                writeText(text) {
                    return new Promise(resolve => {
                        const element = this.el;
                        let chars = text.split("");
                        let typingInterval = setInterval(() => {
                            if (chars.length > 0) {
                                element.innerText = element.innerText.slice(0, -1) + chars.shift() +
                                    "|";
                            } else {
                                clearInterval(typingInterval);
                                setTimeout(() => this.deleteText(resolve), this.waitBeforeDelete);
                            }
                        }, this.typeSpeed);
                    });
                }

                deleteText(resolve) {
                    const element = this.el;
                    let deletingInterval = setInterval(() => {
                        if (element.innerText.length > 1) {
                            element.innerText = element.innerText.slice(0, -2) + "|";
                        } else {
                            clearInterval(deletingInterval);
                            setTimeout(() => resolve(), this.waitBetweenWords);
                        }
                    }, this.deleteSpeed);
                }
            }

            const exampleText = ['Trusted Healthcare,', 'Expert Doctors,', '24/7 Support,', 'Easy Booking...'];
            const exampleTyping = new AutoTyping('#text', exampleText, {
                typeSpeed: 60,
                deleteSpeed: 100,
                waitBeforeDelete: 500,
                waitBetweenWords: 500,
            });

            exampleTyping.start();
        };
        //  Login?registration button
        function toggleModal(id) {
            const modal = document.getElementById(id);
            if (modal.style.display === 'none' || modal.style.display === '') {
                modal.style.display = 'flex';
            } else {
                modal.style.display = 'none';
            }
        }


        /*----------------------   SCROLL SECTIONS ACTIVE LINK ----------------------*/

        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll(".nav-link");
            const currentPath = window.location.pathname;

            navLinks.forEach(link => {
                if (link.getAttribute("href") === currentPath) {
                    link.classList.add("active");
                }
            });
        });



        // FAQ toggles
        document.querySelectorAll('.faq-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                const icon = btn.querySelector('i');

                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });





        /*----------------------  ANIMATION SCROLLING SECTIONS ------------*/
        const sr = ScrollReveal({
            origin: "top",
            distance: "60px",
            duration: 2000,
            delay: 200,
            reset: true
        })

        sr.reveal('.home__data, .info__section,  .footer__icon, .footer__content, .copy__right')
        sr.reveal('.info__section, .coming-soon,', {
            delay: 500,
            scale: 0.5
        })

        sr.reveal('.coming', {
            interval: 100
        })

        sr.reveal('.review__top-img', {
            delay: 1000,
            origin: "right"
        })
        sr.reveal('.health_care', {
            delay: 1000,
            origin: "right"
        })
        sr.reveal('.health_man', {
            delay: 1000,
            origin: "left"
        })


        document.getElementById('role').addEventListener('change', function () {
    const specializationField = document.getElementById('specializationField');
    specializationField.classList.toggle('hidden', this.value !== 'doctor');
  });
    </script>

</body>

</html>
