        let closeNotBtn = document.getElementById('closeNotBtn');
        let notificationModal = document.getElementById('notificationDropdown')
        function closenot(){
            notificationModal.classList.add('hidden')
        }
        function opennot(){
            notificationModal.classList.remove('hidden')
        }
         
         
        

        document.addEventListener('DOMContentLoaded', function() {
            // Check user preference for dark mode
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            }
            
            // Listen for changes in color scheme preference
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
                if (event.matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            });
            
            // Theme toggle button
            const themeToggle = document.getElementById('themeToggle');
            themeToggle.addEventListener('click', function() {
                document.documentElement.classList.toggle('dark');
            });
            
            // Mobile menu functionality
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const closeMenuBtn = document.getElementById('closeMenuBtn');
            
            hamburgerBtn.addEventListener('click', function() {
                mobileMenu.classList.add('active');
                hamburgerBtn.classList.add('menu-open');
            });
            
            closeMenuBtn.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                hamburgerBtn.classList.remove('menu-open');
            });
            
            // Search overlay functionality
            const searchBtn = document.getElementById('searchBtn');
            const searchOverlay = document.getElementById('searchOverlay');
            const closeSearchBtn = document.getElementById('closeSearchBtn');
            const searchContent = document.getElementById('searchContent');
            
            searchBtn.addEventListener('click', function() {
                searchOverlay.classList.remove('hidden');
                setTimeout(() => {
                    searchContent.classList.remove('scale-90', 'opacity-0');
                    searchContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            });
            
            closeSearchBtn.addEventListener('click', function() {
                searchContent.classList.remove('scale-100', 'opacity-100');
                searchContent.classList.add('scale-90', 'opacity-0');
                setTimeout(() => {
                    searchOverlay.classList.add('hidden');
                }, 300);
            });
            
            // Chat panel functionality
            const chatBtn = document.getElementById('chatBtn');
            const chatPanel = document.getElementById('chatPanel');
            const closeChatBtn = document.getElementById('closeChatBtn');
            const chatItems = document.querySelectorAll('.chat-item');
            const individualChat = document.getElementById('individualChat');
            const backToChatList = document.getElementById('backToChatList');
            const chatDoctorName = document.getElementById('chatDoctorName');
            const chatDoctorImage = document.getElementById('chatDoctorImage');
            const chatMessages = document.getElementById('chatMessages');
            const messageInput = document.getElementById('messageInput');
            const sendMessageBtn = document.getElementById('sendMessageBtn');
            
            // Sample chat data
            const chatData = {
                1: { // Dr. Marcus Johnson
                    name: "Dr. Marcus Johnson",
                    image: "https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                    status: "online",
                    messages: [
                        { sender: "doctor", content: "Hello Michael, how can I help you today?", time: "9:30 AM" },
                        { sender: "user", content: "Hi Dr. Johnson, I've been experiencing some chest pain after exercising.", time: "9:32 AM" },
                        { sender: "doctor", content: "I'm sorry to hear that. Can you describe the pain? Is it sharp, dull, or pressure-like?", time: "9:33 AM" },
                        { sender: "user", content: "It's more like a pressure that lasts for about 5-10 minutes after I stop exercising.", time: "9:35 AM" },
                        { sender: "doctor", content: "Thank you for that description. Does it radiate to your arm, jaw, or back?", time: "9:36 AM" },
                        { sender: "user", content: "No, it stays in my chest area.", time: "9:37 AM" },
                        { sender: "doctor", content: "I'll send your prescription to your local pharmacy. You should be able to pick it up within an hour.", time: "9:39 AM", unread: true },
                        { sender: "doctor", content: "Also, please make sure to schedule a follow-up appointment for next week so we can check your progress.", time: "9:41 AM", unread: true }
                    ]
                },
                2: { // Dr. Olivia Williams
                    name: "Dr. Olivia Williams",
                    image: "https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                    status: "offline",
                    messages: [
                        { sender: "doctor", content: "Hi Michael, based on our last appointment, I'd like to schedule a follow-up to check how your child is responding to the new medication.", time: "Yesterday", unread: true }
                    ]
                },
                4: { // Dr. Jasmine Carter
                    name: "Dr. Jasmine Carter",
                    image: "https://images.unsplash.com/photo-1607746882042-944635dfe10e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80",
                    status: "online",
                    messages: [
                        { sender: "doctor", content: "Hello Michael! I've reviewed your lab results from last week.", time: "Tuesday" },
                        { sender: "doctor", content: "Your blood work looks good, but there's a slight elevation in your vitamin D levels that we should discuss during your next visit.", time: "Tuesday" },
                        { sender: "user", content: "Thanks Dr. Carter! When would be a good time to schedule that appointment?", time: "Tuesday" },
                        { sender: "doctor", content: "I have openings next Monday or Wednesday afternoon. Would either of those work for you?", time: "Tuesday" }
                    ]
                }
            };
            
            // Open chat panel
            chatBtn.addEventListener('click', function() {
                chatPanel.classList.add('active');
            });
            
            // Close chat panel
            closeChatBtn.addEventListener('click', function() {
                chatPanel.classList.remove('active');
            });
            
            // Open individual chat
            chatItems.forEach(item => {
                item.addEventListener('click', function() {
                    const doctorId = this.dataset.doctorId;
                    const doctor = chatData[doctorId];
                    
                    if (doctor) {
                        chatDoctorName.textContent = doctor.name;
                        chatDoctorImage.src = doctor.image;
                        
                        // Clear existing messages
                        chatMessages.innerHTML = '';
                        
                        // Add messages to chat
                        doctor.messages.forEach(msg => {
                            const messageEl = document.createElement('div');
                            messageEl.className = `chat-message ${msg.sender === 'user' ? 'sent' : 'received'} p-3 rounded-lg ${msg.unread ? 'font-semibold' : ''}`;
                            
                            messageEl.innerHTML = `
                                <p>${msg.content}</p>
                                <p class="text-xs text-right mt-1 ${msg.sender === 'user' ? 'text-white text-opacity-70' : 'text-gray-500 dark:text-gray-400'}">${msg.time}</p>
                            `;
                            
                            chatMessages.appendChild(messageEl);
                        });
                        
                        // Add typing indicator if first doctor (for demo purposes)
                        if (doctorId === '1') {
                            const typingIndicator = document.createElement('div');
                            typingIndicator.className = 'chat-message received p-3 rounded-lg';
                            typingIndicator.innerHTML = `
                                <div class="typing-indicator">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            `;
                            chatMessages.appendChild(typingIndicator);
                        }
                        
                        // Scroll to bottom of chat
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                        
                        // Show individual chat
                        individualChat.classList.remove('hidden');
                    }
                });
            });
            
            // Back to chat list
            backToChatList.addEventListener('click', function() {
                individualChat.classList.add('hidden');
            });
            
            // Send message
            sendMessageBtn.addEventListener('click', function() {
                sendMessage();
            });
            
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
            
            function sendMessage() {
                const messageText = messageInput.value.trim();
                if (messageText) {
                    // Create new message element
                    const messageEl = document.createElement('div');
                    messageEl.className = 'chat-message sent p-3 rounded-lg';
                    
                    const currentTime = new Date();
                    const timeString = currentTime.getHours() + ':' + (currentTime.getMinutes() < 10 ? '0' : '') + currentTime.getMinutes();
                    
                    messageEl.innerHTML = `
                        <p>${messageText}</p>
                        <p class="text-xs text-right mt-1 text-white text-opacity-70">${timeString}</p>
                    `;
                    
                    chatMessages.appendChild(messageEl);
                    
                    // Clear input
                    messageInput.value = '';
                    
                    // Scroll to bottom of chat
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                    
                    // Simulate doctor response after a delay (for demo)
                    setTimeout(() => {
                        const typingIndicator = document.createElement('div');
                        typingIndicator.className = 'chat-message received p-3 rounded-lg';
                        typingIndicator.innerHTML = `
                            <div class="typing-indicator">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        `;
                        chatMessages.appendChild(typingIndicator);
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                        
                        // Replace typing indicator with response after a delay
                        setTimeout(() => {
                            typingIndicator.innerHTML = `
                                <p>Thanks for your message. I'll review this and get back to you shortly.</p>
                                <p class="text-xs text-right mt-1 text-gray-500 dark:text-gray-400">${timeString}</p>
                            `;
                        }, 2000);
                    }, 1000);
                }
            }
            
            // User profile dropdown
            const accountBtn = document.getElementById('accountBtn');
            const profileDropdown = document.getElementById('profileDropdown');
            
            accountBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking elsewhere
            document.addEventListener('click', function(e) {
                if (!profileDropdown.contains(e.target) && e.target !== accountBtn) {
                    profileDropdown.classList.add('hidden');
                }
            });
            
            // Open profile modal
            const viewProfileBtn = document.getElementById('viewProfileBtn');
            const profileModal = document.getElementById('profileModal');
            
            if (viewProfileBtn) {
                viewProfileBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    profileDropdown.classList.add('hidden');
                    profileModal.classList.remove('hidden');
                });
            }
            
            // Profile tabs
            const profileTabs = document.querySelectorAll('.profile-tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            profileTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    profileTabs.forEach(t => t.classList.remove('active', 'text-primary', 'border-primary'));
                    profileTabs.forEach(t => t.classList.add('text-gray-500', 'dark:text-gray-400', 'border-transparent'));
                    
                    // Add active class to clicked tab
                    this.classList.add('active', 'text-primary', 'border-primary');
                    this.classList.remove('text-gray-500', 'dark:text-gray-400', 'border-transparent');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.add('hidden'));
                    
                    // Show selected tab content
                    const tabId = this.dataset.tab + 'Info';
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });
            
            // Appointments modal
            const viewAppointmentsBtn = document.getElementById('viewAppointmentsBtn');
            const appointmentsModal = document.getElementById('appointmentsModal');
            
            if (viewAppointmentsBtn) {
                viewAppointmentsBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    profileDropdown.classList.add('hidden');
                    appointmentsModal.classList.remove('hidden');
                });
            }
            
            // Appointment tabs
            const appointmentTabs = document.querySelectorAll('.appointment-tab');
            const appointmentContents = document.querySelectorAll('.appointment-content');
            
            appointmentTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    appointmentTabs.forEach(t => t.classList.remove('active', 'text-primary', 'border-primary'));
                    appointmentTabs.forEach(t => t.classList.add('text-gray-500', 'dark:text-gray-400', 'border-transparent'));
                    
                    // Add active class to clicked tab
                    this.classList.add('active', 'text-primary', 'border-primary');
                    this.classList.remove('text-gray-500', 'dark:text-gray-400', 'border-transparent');
                    
                    // Hide all tab contents
                    appointmentContents.forEach(content => content.classList.add('hidden'));
                    
                    // Show selected tab content
                    const tabId = this.dataset.tab + 'Appointments';
                    document.getElementById(tabId).classList.remove('hidden');
                });
            });
            
            // Close modals
            const closeModalBtns = document.querySelectorAll('.close-modal');
            
            closeModalBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    modal.classList.add('hidden');
                });
            });
            
            // Close modals when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('modal')) {
                    event.target.classList.add('hidden');
                }
            });
            
            // Open messages from profile
            const viewMessagesBtn = document.getElementById('viewMessagesBtn');
            
            if (viewMessagesBtn) {
                viewMessagesBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    profileDropdown.classList.add('hidden');
                    chatPanel.classList.add('active');
                });
            }
            
            // FAQ toggles
            const faqToggles = document.querySelectorAll('.faq-toggle');
            
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');
                    
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        icon.style.transform = 'rotate(180deg)';
                    } else {
                        content.classList.add('hidden');
                        icon.style.transform = 'rotate(0)';
                    }
                });
            });
            
            // Testimonial slider
            const testimonialTrack = document.getElementById('testimonialTrack');
            const testimonialSlides = document.querySelectorAll('.testimonial-slide');
            const testimonialDots = document.querySelectorAll('.testimonial-dot');
            const prevBtn = document.querySelector('.testimonial-prev');
            const nextBtn = document.querySelector('.testimonial-next');
            
            let currentIndex = 0;
            
            function updateSlider() {
                const translateValue = -currentIndex * 100 + '%';
                testimonialTrack.style.transform = 'translateX(' + translateValue + ')';
                
                // Update dots
                testimonialDots.forEach((dot, index) => {
                    if (index === currentIndex) {
                        dot.classList.add('bg-primary');
                        dot.classList.remove('bg-gray-300', 'dark:bg-gray-700');
                    } else {
                        dot.classList.remove('bg-primary');
                        dot.classList.add('bg-gray-300', 'dark:bg-gray-700');
                    }
                });
            }
            
            // Initialize dots
            updateSlider();
            
            // Next/Prev buttons
            nextBtn.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % testimonialSlides.length;
                updateSlider();
            });
            
            prevBtn.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + testimonialSlides.length) % testimonialSlides.length;
                updateSlider();
            });
            
            // Dots navigation
            testimonialDots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    currentIndex = index;
                    updateSlider();
                });
            });
            
            // Auto-advance the slider
            setInterval(() => {
                currentIndex = (currentIndex + 1) % testimonialSlides.length;
                updateSlider();
            }, 15000);
            
            // Scroll animations
            function checkScroll() {
                document.querySelectorAll('.fade-in, .slide-in-bottom, .slide-in-left, .slide-in-right').forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementPosition < windowHeight * 0.9) {
                        element.style.animationPlayState = 'running';
                    }
                });
            }
            
            // Initial check on page load
            checkScroll();
            
            // Check on scroll
            window.addEventListener('scroll', checkScroll);

            // Sample doctor data with Black doctors and verification status
            const doctorsData = [
                {
                    id: 1,
                    name: "Dr. Marcus Johnson",
                    specialty: "cardiology",
                    specialtyDisplay: "Cardiology",
                    description: "Specialized in cardiovascular health with over 15 years of experience in diagnosing and treating heart conditions.",
                    image: "https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                    badge: "TOP RATED",
                    badgeColor: "bg-primary",
                    rating: 4.9,
                    reviews: 127,
                    availability: "Available today",
                    experience: "15 years experience",
                    specialtyColor: "blue",
                    verified: true, // Verified doctor in cardiology
                    userRating: false, // Tracks if current user has rated
                    ratings: [] // Will store individual user ratings
                },
                {
                    id: 2,
                    name: "Dr. Olivia Williams",
                    specialty: "pediatrics",
                    specialtyDisplay: "Pediatrics",
                    description: "Dedicated pediatrician with a focus on newborn care, childhood development, and adolescent health issues.",
                    image: "images/A woman in a white lab coat is standing in a room with a bottle of liquid _ Premium AI-generated image.jpeg",
                    badge: "CHILD SPECIALIST",
                    badgeColor: "bg-green-500",
                    rating: 4.7,
                    reviews: 98,
                    availability: "Available tomorrow",
                    experience: "12 years experience",
                    specialtyColor: "green",
                    verified: true, // Verified doctor in pediatrics
                    userRating: false,
                    ratings: []
                },
                {
                    id: 3,
                    name: "Dr. Michael Davis",
                    specialty: "neurology",
                    specialtyDisplay: "Neurology",
                    description: "Expert neurologist specializing in brain disorders, spinal cord injuries, and neurodegenerative diseases.",
                    image: "images/Doctor with Stethoscope Smiling Isolated on White Background _ Premium AI-generated image.jpeg",
                    badge: "BRAIN SPECIALIST",
                    badgeColor: "bg-purple-500",
                    rating: 4.8,
                    reviews: 84,
                    availability: "Available in 2 days",
                    experience: "18 years experience",
                    specialtyColor: "purple",
                    verified: true, // Verified doctor in neurology
                    userRating: false,
                    ratings: []
                },
                {
                    id: 4,
                    name: "Dr. Jasmine Carter",
                    specialty: "dermatology",
                    specialtyDisplay: "Dermatology",
                    description: "Experienced dermatologist treating skin conditions, cosmetic concerns, and performing specialized dermatological procedures.",
                    image: "images/download.jpeg",
                    badge: "SKIN EXPERT",
                    badgeColor: "bg-red-500",
                    rating: 4.6,
                    reviews: 112,
                    availability: "Available today",
                    experience: "5 years experience",
                    specialtyColor: "red",
                    verified: true, // Verified doctor in dermatology
                    userRating: false,
                    ratings: []
                },
                {
                    id: 5,
                    name: "Dr. James Peterson",
                    specialty: "cardiology",
                    specialtyDisplay: "Cardiology",
                    description: "Cardiology specialist focused on preventive cardiology, heart failure management, and cardiac rehabilitation.",
                    image: "images/In betwern services break_.jpeg",
                    badge: "HEART EXPERT",
                    badgeColor: "bg-primary",
                    rating: 4.5,
                    reviews: 75,
                    availability: "Available tomorrow",
                    experience: "14 years experience",
                    specialtyColor: "blue",
                    verified: false,
                    userRating: false,
                    ratings: []
                },
                {
                    id: 6,
                    name: "Dr. Amara Thompson",
                    specialty: "dermatology",
                    specialtyDisplay: "Dermatology",
                    description: "Board-certified dermatologist with expertise in medical, surgical, and cosmetic dermatology procedures.",
                    image: "images/Enfermagem - Ensaio fotográfico - Estúdio - Inspo - Poses.jpg",
                    badge: "CERTIFIED",
                    badgeColor: "bg-red-500",
                    rating: 4.7,
                    reviews: 92,
                    availability: "Available in 3 days",
                    experience: "9 years experience",
                    specialtyColor: "red",
                    verified: false,
                    userRating: false,
                    ratings: []
                },
                {
                    id: 7,
                    name: "Dr. Anchie Rosine",
                    specialty: "neurology",
                    specialtyDisplay: "Neurology",
                    description: "Fellowship-trained neurologist specializing in movement disorders, epilepsy, and headache management.",
                    image: "images/download (2).jpeg",
                    badge: "SPECIALIZED",
                    badgeColor: "bg-purple-500",
                    rating: 4.9,
                    reviews: 104,
                    availability: "Available today",
                    experience: "20 years experience",
                    specialtyColor: "purple",
                    verified: false,
                    userRating: false,
                    ratings: []
                },
                {
                    id: 8,
                    name: "Dr. Lisa Banks",
                    specialty: "pediatrics",
                    specialtyDisplay: "Pediatrics",
                    description: "Compassionate pediatrician focusing on childhood wellness, behavioral health, and developmental disorders.",
                    image: "images/download (3).jpeg",
                    badge: "CHILD FRIENDLY",
                    badgeColor: "bg-green-500",
                    rating: 4.8,
                    reviews: 88,
                    availability: "Available tomorrow",
                    experience: "11 years experience",
                    specialtyColor: "green",
                    verified: false,
                    userRating: false,
                    ratings: []
                }
            ];
        
            // Function to generate star rating HTML
            function generateStarRating(rating) {
                let starsHTML = '';
                
                // Generate stars with data-rating attributes
                for (let i = 1; i <= 5; i++) {
                    if (i <= Math.floor(rating)) {
                        // Full star
                        starsHTML += `<i class="fas fa-star star-icon" data-rating="${i}"></i>`;
                    } else if (i === Math.ceil(rating) && !Number.isInteger(rating)) {
                        // Half star
                        starsHTML += `<i class="fas fa-star-half-alt star-icon" data-rating="${i-0.5}"></i>`;
                    } else {
                        // Empty star
                        starsHTML += `<i class="far fa-star star-icon" data-rating="${i}"></i>`;
                    }
                }
                
                return starsHTML;
            }
            
            // Function to create a doctor card
            function createDoctorCard(doctor) {
                const doctorCard = document.createElement('div');
                doctorCard.className = 'doctor-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl';
                doctorCard.dataset.id = doctor.id;
                doctorCard.dataset.rating = doctor.rating;
                doctorCard.dataset.reviews = doctor.reviews;
                
                doctorCard.innerHTML = `
                    <div class="relative">
                        <img src="${doctor.image}" alt="${doctor.name}" class="doctor-image w-full h-48 object-cover">
                        <span class="doctor-badge absolute top-4 right-4 px-2 py-1 ${doctor.badgeColor} text-white text-xs font-semibold rounded">${doctor.badge}</span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="doctor-name text-lg font-bold text-gray-900 dark:text-white">
                                ${doctor.name}
                                ${doctor.verified ? '<i class="fas fa-check-circle verified-badge ml-1 text-primary " title="Verified Provider"></i>' : ''}
                            </h3>
                            <button class="favorite-btn text-gray-400 hover:text-red-500">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        <span class="doctor-specialty inline-block px-3 py-1 bg-${doctor.specialtyColor}-100 dark:bg-${doctor.specialtyColor}-900 text-${doctor.specialtyColor}-800 dark:text-${doctor.specialtyColor}-200 rounded-full text-xs font-medium mb-3">${doctor.specialtyDisplay}</span>
                        <div class="flex items-center mb-3">
                            <div class="stars-container flex text-yellow-400 mr-1">
                                ${generateStarRating(doctor.rating)}
                            </div>
                            <span class="text-sm">
                                <span class="rating-value">${doctor.rating.toFixed(1)}</span>
                                <span class="reviews-count text-gray-500 dark:text-gray-400">(${doctor.reviews})</span>
                            </span>
                        </div>
                        <p class="doctor-desc text-gray-700 dark:text-gray-300 text-sm mb-4 line-clamp-2">
                            ${doctor.description}
                        </p>
                        <div class="flex justify-between items-center text-sm text-gray-600 dark:text-gray-400 mb-4">
                            <span class="doctor-availability">
                                <i class="far fa-clock mr-1"></i> ${doctor.availability}
                            </span>
                            <span class="doctor-experience">
                                <i class="fas fa-user-md mr-1"></i> ${doctor.experience}
                            </span>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <button class="call-doctor-btn w-full py-2 bg-primary hover:bg-opacity-90 text-white font-medium rounded transition-colors">
                                <i class="fas fa-video mr-1"></i> Video Call
                            </button>
                            <button class="chat-doctor-btn w-full py-2 border border-primary text-primary hover:bg-primary hover:bg-opacity-10 font-medium rounded transition-colors">
                                <i class="fas fa-comment-medical mr-1"></i> Chat
                            </button>
                            <button class="doctor-view-btn w-full py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 font-medium rounded transition-colors col-span-1">
                                <i class="fas fa-user-md mr-1"></i> Profile
                            </button>
                            <button class="book-btn w-full py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded transition-colors col-span-1">
                                <i class="fas fa-calendar-check mr-1"></i> Book
                            </button>
                        </div>
                    </div>
                `;
                
                return doctorCard;
            }
            
            // DOM elements
            const doctorGrid = document.getElementById('doctor-grid');
            const searchInput = document.getElementById('doctor-search');
            const searchButton = document.getElementById('search-button');
            const specialtyFilters = document.querySelectorAll('.filter-btn');
            const sortSelect = document.getElementById('doctor-sort');
            
            // Current filter and sort state
            let currentSpecialty = 'all';
            let currentSortMethod = 'rating';
            let searchQuery = '';
            
            // Function to render all doctor cards
            function renderDoctors() {
                // Clear existing content
                if (doctorGrid) {
                    doctorGrid.innerHTML = '';
                    
                    // Filter doctors
                    let filteredDoctors = doctorsData.filter(doctor => {
                        // Apply specialty filter if not 'all'
                        const specialtyMatch = currentSpecialty === 'all' || doctor.specialty === currentSpecialty;
                        
                        // Apply search filter if there's a query
                        const searchMatch = !searchQuery || 
                            doctor.name.toLowerCase().includes(searchQuery.toLowerCase()) || 
                            doctor.specialty.toLowerCase().includes(searchQuery.toLowerCase()) ||
                            doctor.description.toLowerCase().includes(searchQuery.toLowerCase());
                            
                        return specialtyMatch && searchMatch;
                    });
                    
                    // Sort doctors
                    switch (currentSortMethod) {
                        case 'rating':
                            filteredDoctors.sort((a, b) => b.rating - a.rating);
                            break;
                        case 'experience':
                            filteredDoctors.sort((a, b) => {
                                const aYears = parseInt(a.experience);
                                const bYears = parseInt(b.experience);
                                return bYears - aYears;
                            });
                            break;
                        case 'availability':
                            filteredDoctors.sort((a, b) => {
                                if (a.availability.includes('today') && !b.availability.includes('today')) return -1;
                                if (!a.availability.includes('today') && b.availability.includes('today')) return 1;
                                if (a.availability.includes('tomorrow') && !b.availability.includes('tomorrow')) return -1;
                                if (!a.availability.includes('tomorrow') && b.availability.includes('tomorrow')) return 1;
                                return 0;
                            });
                            break;
                        case 'name':
                            filteredDoctors.sort((a, b) => a.name.localeCompare(b.name));
                            break;
                    }
                    
                    // Create and append doctor cards
                    if (filteredDoctors.length > 0) {
                        filteredDoctors.forEach(doctor => {
                            doctorGrid.appendChild(createDoctorCard(doctor));
                        });
                    } else {
                        // Show no results message
                        const noResults = document.createElement('div');
                        noResults.className = 'col-span-full text-center py-12';
                        noResults.innerHTML = `
                            <i class="fas fa-user-md text-gray-400 text-5xl mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">No doctors found</h3>
                            <p class="text-gray-500 dark:text-gray-400 mt-2">Try adjusting your search or filters</p>
                        `;
                        doctorGrid.appendChild(noResults);
                    }
                }
            }
            
            // Initial render
            renderDoctors();
            
            // Update doctor stats
            const doctorCountEl = document.getElementById('doctorCount');
            const categoryCountEl = document.getElementById('categoryCount');
            
            if (doctorCountEl) {
                doctorCountEl.textContent = doctorsData.length;
            }
            
            if (categoryCountEl) {
                const uniqueSpecialties = [...new Set(doctorsData.map(doctor => doctor.specialty))];
                categoryCountEl.textContent = uniqueSpecialties.length;
            }
            
            // Set up search
            if (searchButton) {
                searchButton.addEventListener('click', function() {
                    searchQuery = searchInput.value.trim();
                    renderDoctors();
                });
            }
            
            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    if (e.key === 'Enter') {
                        searchQuery = searchInput.value.trim();
                        renderDoctors();
                    }
                });
            }
            
            // Set up specialty filters
            specialtyFilters.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active class
                    specialtyFilters.forEach(btn => btn.classList.remove('active', 'bg-primary', 'text-white'));
                    specialtyFilters.forEach(btn => {
                        if (btn !== this) {
                            btn.classList.add('bg-gray-100', 'dark:bg-gray-800', 'text-gray-700', 'dark:text-gray-300');
                            btn.classList.remove('bg-primary', 'text-white');
                        }
                    });
                    
                    this.classList.add('active', 'bg-primary', 'text-white');
                    this.classList.remove('bg-gray-100', 'dark:bg-gray-800', 'text-gray-700', 'dark:text-gray-300');
                    
                    // Update filter and re-render
                    currentSpecialty = this.dataset.specialty;
                    renderDoctors();
                });
            });
            
            // Set up sorting
            if (sortSelect) {
                sortSelect.addEventListener('change', function() {
                    currentSortMethod = this.value;
                    renderDoctors();
                });
            }
            
            // Doctor modal and interactions
            const doctorModal = document.getElementById('doctorModal');
            const modalImage = document.getElementById('modalImage');
            const modalDoctorName = document.getElementById('modalDoctorName');
            const modalDescription = document.getElementById('modalDescription');
            
            // Set up event delegation for doctor grid interactions
            if (doctorGrid) {
                doctorGrid.addEventListener('click', function(e) {
                    // View doctor profile
                    const viewBtn = e.target.closest('.doctor-view-btn');
                    if (viewBtn) {
                        const doctorCard = viewBtn.closest('.doctor-card');
                        const doctorId = doctorCard.dataset.id;
                        const doctor = doctorsData.find(d => d.id == doctorId);
                        
                        if (doctor) {
                            modalImage.src = doctor.image;
                            modalDoctorName.textContent = doctor.name;
                            modalDescription.textContent = doctor.description;
                            doctorModal.classList.remove('hidden');
                        }
                    }
                    
                    // Favorite button functionality
                    const favoriteButton = e.target.closest('.favorite-btn');
                    if (favoriteButton) {
                        const icon = favoriteButton.querySelector('i');
                        
                        // Toggle favorite state
                        if (icon.classList.contains('far')) {
                            icon.classList.remove('far');
                            icon.classList.add('fas', 'text-red-500');
                        } else {
                            icon.classList.remove('fas', 'text-red-500');
                            icon.classList.add('far');
                        }
                    }
                    
                    // Chat button functionality
                    const chatBtn = e.target.closest('.chat-doctor-btn');
                    if (chatBtn) {
                        const doctorCard = chatBtn.closest('.doctor-card');
                        const doctorId = doctorCard.dataset.id;
                        const doctor = doctorsData.find(d => d.id == doctorId);
                        
                        if (doctor) {
                            // Open chat panel and start chat with this doctor
                            chatPanel.classList.add('active');
                            
                            // Check if this doctor already has a chat
                            if (chatData[doctorId]) {
                                // Find the chat item for this doctor
                                const chatItem = document.querySelector(`.chat-item[data-doctor-id="${doctorId}"]`);
                                if (chatItem) {
                                    chatItem.click();
                                } else {
                                    // If no existing chat item, create one
                                    chatDoctorName.textContent = doctor.name;
                                    chatDoctorImage.src = doctor.image;
                                    chatMessages.innerHTML = '';
                                    individualChat.classList.remove('hidden');
                                }
                            } else {
                                // Create a new chat with this doctor
                                chatDoctorName.textContent = doctor.name;
                                chatDoctorImage.src = doctor.image;
                                chatMessages.innerHTML = '';
                                
                                // Add initial message
                                const messageEl = document.createElement('div');
                                messageEl.className = 'chat-message received p-3 rounded-lg';
                                messageEl.innerHTML = `
                                    <p>Hello! How can I help you today?</p>
                                    <p class="text-xs text-right mt-1 text-gray-500 dark:text-gray-400">Just now</p>
                                `;
                                chatMessages.appendChild(messageEl);
                                
                                individualChat.classList.remove('hidden');
                            }
                        }
                    }
                    
                    // Call doctor button functionality
                    const callBtn = e.target.closest('.call-doctor-btn');
                    if (callBtn) {
                        const doctorCard = callBtn.closest('.doctor-card');
                        const doctorName = doctorCard.querySelector('.doctor-name').textContent.trim();
                        
                        alert(`Starting video call with ${doctorName}`);
                    }
                    
                    // Book appointment button functionality
                    const bookBtn = e.target.closest('.book-btn');
                    if (bookBtn) {
                        const doctorCard = bookBtn.closest('.doctor-card');
                        const doctorId = doctorCard.dataset.id;
                        const doctor = doctorsData.find(d => d.id == doctorId);
                        
                        if (doctor) {
                            appointmentsModal.classList.remove('hidden');
                        }
                    }
                });
            }
        });
