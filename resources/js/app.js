import './bootstrap';


        // Toggle Mobile Menu
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile Dropdown Toggle
        document.querySelectorAll('.mobile-dropdown-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const dropdown = document.getElementById(targetId);
                const arrow = this.querySelector('svg');

                dropdown.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });
        });

        // Menutup mobile menu ketika mengklik luar bagian mobile menu
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');

            if (!mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Program Tab Functionality
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('active', 'bg-[#73BA7D]', 'text-white');
                    btn.classList.add('text-[#73BA7D]');
                });

                // Add active class to clicked button
                this.classList.add('active', 'bg-[#73BA7D]', 'text-white');
                this.classList.remove('text-[#73BA7D]');

                // Hide all program categories
                document.querySelectorAll('.program-category').forEach(category => {
                    category.classList.add('hidden');
                });

                // Show selected program category
                const categoryId = this.getAttribute('data-category');
                document.getElementById(categoryId).classList.remove('hidden');

                // Reinit swiper for the active category
                setTimeout(() => {
                    if (typeof programSwiper !== 'undefined') {
                        programSwiper.update();
                    }
                }, 100);
            });
        });

        // Initialize Swiper for program sliders
        let programSwipers = [];

        function initSwipers() {
            const swiperContainers = document.querySelectorAll('.programSwiper');

            swiperContainers.forEach(container => {
                const swiper = new Swiper(container, {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    navigation: {
                        nextEl: container.querySelector('.swiper-button-next'),
                        prevEl: container.querySelector('.swiper-button-prev'),
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                    },
                });

                programSwipers.push(swiper);
            });
        }

        // Program Tab Functionality
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('active', 'bg-[#73BA7D]', 'text-white');
                    btn.classList.add('text-[#73BA7F]');
                });

                // Add active class to clicked button
                this.classList.add('active', 'bg-[#73BA7D]', 'text-white');
                this.classList.remove('text-[#73BA7F]');

                // Hide all program categories
                document.querySelectorAll('.program-category').forEach(category => {
                    category.classList.add('hidden');
                });

                // Show selected program category
                const categoryId = this.getAttribute('data-category');
                document.getElementById(categoryId).classList.remove('hidden');

                // Update all swiper instances
                setTimeout(() => {
                    programSwipers.forEach(swiper => {
                        swiper.update();
                    });
                }, 100);
            });
        });

        // Initialize swipers when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initSwipers();
        });