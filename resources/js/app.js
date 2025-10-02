import "./bootstrap";

// DOM Ready
document.addEventListener("DOMContentLoaded", function () {

    // === Hamburger Mobile Menu ===
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", (event) => {
            if (!mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                mobileMenu.classList.add("hidden");
            }
        });
    }

    // === Mobile Dropdown Toggle ===
    document.querySelectorAll(".mobile-dropdown-btn").forEach((button) => {
        button.addEventListener("click", function () {
            const targetId = this.getAttribute("data-target");
            const dropdown = document.getElementById(targetId);
            const arrow = this.querySelector("svg");

            dropdown.classList.toggle("hidden");
            arrow.classList.toggle("rotate-180");
        });
    });

    // === Program Tabs + Swiper ===
    let programSwipers = [];

    function initSwipers() {
        document.querySelectorAll(".programSwiper").forEach((container) => {
            const swiper = new Swiper(container, {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: container.querySelector(".swiper-button-next"),
                    prevEl: container.querySelector(".swiper-button-prev"),
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
            programSwipers.push(swiper);
        });
    }

    // Tab Button
    document.querySelectorAll(".tab-btn").forEach((button) => {
        button.addEventListener("click", function () {
            // Reset semua button
            document.querySelectorAll(".tab-btn").forEach((btn) => {
                btn.classList.remove("active", "bg-[#73BA7D]", "text-white");
                btn.classList.add("text-[#73BA7D]");
            });

            // Aktifkan button yang diklik
            this.classList.add("active", "bg-[#73BA7D]", "text-white");
            this.classList.remove("text-[#73BA7D]");

            // Sembunyikan semua kategori
            document.querySelectorAll(".program-category").forEach((cat) => cat.classList.add("hidden"));

            // Tampilkan kategori sesuai button
            const categoryId = this.getAttribute("data-category");
            document.getElementById(categoryId).classList.remove("hidden");

            // Update semua swiper
            setTimeout(() => programSwipers.forEach(swiper => swiper.update()), 100);
        });
    });

    initSwipers();

    // === Client Logo Slider ===
    new Swiper(".clientSwiper", {
        slidesPerView: 5,
        spaceBetween: 40,
        loop: true,
        freeMode: true,
        autoplay: { delay: 1, disableOnInteraction: false },
        speed: 4000,
        grabCursor: false,
        allowTouchMove: false,
        breakpoints: {
            320: { slidesPerView: 2, spaceBetween: 20 },
            640: { slidesPerView: 3, spaceBetween: 30 },
            1024: { slidesPerView: 5, spaceBetween: 40 },
        },
    });

    // === Alumni Counter ===
    const counters = document.querySelectorAll(".counter");
    if (counters.length) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute("data-target");
                    let count = 0;
                    const step = Math.ceil(target / 100);

                    const interval = setInterval(() => {
                        count += step;
                        if (count >= target) {
                            count = target;
                            clearInterval(interval);
                            counter.innerText = target >= 1000 ? target + "+" : target;
                        } else {
                            counter.innerText = count;
                        }
                    }, 10);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach((counter) => observer.observe(counter));
    }

    // === Gallery Filter ===
    const galleryButtons = document.querySelectorAll("#galleryFilters button");
    const galleryItems = document.querySelectorAll(".gallery-item");

    if (galleryButtons.length) {
        galleryButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                // reset button style
                galleryButtons.forEach(b => {
                    b.classList.remove("bg-[#73BA7D]", "text-white");
                    b.classList.add("bg-gray-200");
                });

                // aktifkan button
                btn.classList.remove("bg-gray-200");
                btn.classList.add("bg-[#73BA7D]", "text-white");

                // filter gambar
                const category = btn.getAttribute("data-category");
                galleryItems.forEach(item => {
                    item.style.display = (category === "all" || item.dataset.category === category) ? "block" : "none";
                });
            });
        });

        // awal → tampilkan semua
        galleryItems.forEach(item => item.style.display = "block");
    }

    // === Gallery Slider Custom ===
    const images = [
    "/images/galeri/pict1.jpg",
    "/images/galeri/pict2.jpg",
    "/images/galeri/pict3.jpg",
    "/images/galeri/pict4.jpg",
    "/images/galeri/pict5.jpg",
    "/images/galeri/pict6.jpg",
    "/images/galeri/pict7.jpg",
    "/images/galeri/pict8.jpg"
];

    let currentIndex = 0;
    const galleryImage = document.getElementById('galleryImage');
    const indicatorsContainer = document.getElementById('indicators');
    if (galleryImage && indicatorsContainer) {
        const indicatorTemplate = document.getElementById('indicatorTemplate').content;

        // generate indikator
        images.forEach((_, i) => {
            const indicator = indicatorTemplate.cloneNode(true);
            indicator.querySelector('div').addEventListener('click', () => {
                currentIndex = i;
                showImage(currentIndex);
            });
            indicatorsContainer.appendChild(indicator);
        });

        const indicators = indicatorsContainer.querySelectorAll('div');

        function showImage(index) {
            galleryImage.src = images[index];
            indicators.forEach((dot, i) => {
                dot.classList.toggle('bg-gray-800', i === index);
                dot.classList.toggle('bg-gray-400', i !== index);
            });
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        }

        // auto slide
        setInterval(nextImage, 3000);

        // tampilkan pertama kali
        showImage(currentIndex);

        // expose biar bisa dipanggil tombol
        window.prevImage = prevImage;
        window.nextImage = nextImage;
    }

});
