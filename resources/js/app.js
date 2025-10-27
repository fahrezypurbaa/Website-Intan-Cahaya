import "./bootstrap";

// === Utility ===
function slugify(text) {
    return text
        .toString()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9\s-]/g, "")
        .replace(/\s+/g, "-")
        .replace(/-+/g, "-");
}

// === DOM Ready ===
document.addEventListener("DOMContentLoaded", () => {
    /* =============================
       🟢 NAVBAR MOBILE
    ============================== */
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (
                !mobileMenu.contains(e.target) &&
                !mobileMenuBtn.contains(e.target)
            ) {
                mobileMenu.classList.add("hidden");
            }
        });
    }

    // === Dropdown di Mobile Menu ===
    document.querySelectorAll(".mobile-dropdown-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            const target = document.getElementById(this.dataset.target);
            const arrow = this.querySelector("svg");
            target?.classList.toggle("hidden");
            arrow?.classList.toggle("rotate-180");
        });
    });

    /* =============================
       🟢 PROGRAM SECTION + SWIPER
    ============================== */
    const programSwipers = [];

    function initSwipers() {
        document.querySelectorAll(".programSwiper").forEach((el) => {
            const swiper = new Swiper(el, {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: el.querySelector(".swiper-button-next"),
                    prevEl: el.querySelector(".swiper-button-prev"),
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
            programSwipers.push(swiper);
        });
    }

    document.querySelectorAll(".tab-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            document
                .querySelectorAll(".tab-btn")
                .forEach((b) =>
                    b.classList.remove("active", "bg-[#73BA7D]", "text-white")
                );
            this.classList.add("active", "bg-[#73BA7D]", "text-white");

            document
                .querySelectorAll(".program-category")
                .forEach((cat) => cat.classList.add("hidden"));

            const categoryId = this.dataset.category;
            document.getElementById(categoryId)?.classList.remove("hidden");

            setTimeout(() => programSwipers.forEach((s) => s.update()), 100);
        });
    });

    initSwipers();

    /* =============================
       🟢 CLIENT LOGO SWIPER
    ============================== */
    if (document.querySelector(".clientSwiper")) {
        new Swiper(".clientSwiper", {
            slidesPerView: 5,
            spaceBetween: 40,
            loop: true,
            freeMode: true,
            autoplay: { delay: 1, disableOnInteraction: false },
            speed: 4000,
            allowTouchMove: false,
            breakpoints: {
                320: { slidesPerView: 2, spaceBetween: 20 },
                640: { slidesPerView: 3, spaceBetween: 30 },
                1024: { slidesPerView: 5, spaceBetween: 40 },
            },
        });
    }

    /* =============================
       🟢 COUNTER (ANIMASI ANGKA)
    ============================== */
    const counters = document.querySelectorAll(".counter");
    if (counters.length) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = +el.dataset.target;
                        let count = 0;
                        const step = Math.ceil(target / 100);

                        const interval = setInterval(() => {
                            count += step;
                            if (count >= target) {
                                clearInterval(interval);
                                count = target;
                            }
                            el.innerText =
                                target >= 1000 ? `${target}+` : count;
                        }, 10);

                        observer.unobserve(el);
                    }
                });
            },
            { threshold: 0.5 }
        );

        counters.forEach((c) => observer.observe(c));
    }

    /* =============================
       🟢 GALLERY FILTER
    ============================== */
    const galleryButtons = document.querySelectorAll("#galleryFilters button");
    const galleryItems = document.querySelectorAll(".gallery-item");

    if (galleryButtons.length && galleryItems.length) {
        galleryButtons.forEach((btn) => {
            btn.addEventListener("click", () => {
                galleryButtons.forEach((b) => {
                    b.classList.remove("bg-[#73BA7D]", "text-white");
                    b.classList.add("bg-gray-200");
                });
                btn.classList.remove("bg-gray-200");
                btn.classList.add("bg-[#73BA7D]", "text-white");

                const category = btn.dataset.category;
                galleryItems.forEach((item) => {
                    item.style.display =
                        category === "all" || item.dataset.category === category
                            ? "block"
                            : "none";
                });
            });
        });
    }

    /* =============================
       🟢 LEGALITAS & GALLERY PREVIEW
    ============================== */
    const docModal = document.getElementById("docModal");
    const docImg = document.getElementById("docModalImg");
    const closeDoc = document.getElementById("closeDocModal");

    if (docModal && docImg && closeDoc) {
        document.body.addEventListener("click", (e) => {
            const btn = e.target.closest(".lihat-gambar, .doc-preview");
            if (btn) {
                docImg.src = btn.dataset.image;
                docModal.classList.remove("hidden");
                docModal.classList.add("flex");
                document.body.style.overflow = "hidden";
            }
            if (e.target === closeDoc || e.target === docModal) {
                docModal.classList.add("hidden");
                docModal.classList.remove("flex");
                docImg.src = "";
                document.body.style.overflow = "";
            }
        });
    }

    /* =============================
       🟢 FORM REGISTRASI
    ============================== */
    const participantType = document.getElementById("participant_type");
    const companyFields = document.getElementById("company_fields");
    const categorySelect = document.getElementById("category_id");
    const trainingSelect = document.getElementById("training_id");

    if (participantType && companyFields) {
        participantType.addEventListener("change", () => {
            companyFields.classList.toggle(
                "hidden",
                participantType.value !== "company"
            );
        });
    }

    if (categorySelect && trainingSelect) {
        categorySelect.addEventListener("change", () => {
            const selected = categorySelect.value;
            for (const option of trainingSelect.options) {
                if (option.value)
                    option.style.display =
                        option.dataset.category === selected ? "block" : "none";
            }
            trainingSelect.value = "";
        });
    }

    /* =============================
       🟢 SLUG GENERATOR (ARTIKEL)
    ============================== */
    const titleInput = document.getElementById("title");
    const slugInput = document.getElementById("slug");

    if (titleInput && slugInput) {
        titleInput.addEventListener("keyup", function () {
            slugInput.value = slugify(this.value);
        });
    }

    /* =============================
       🟢 PREVIEW THUMBNAIL
    ============================== */
    const fileInput = document.getElementById("thumbnail");
    const previewContainer = document.getElementById("preview-container");
    const previewImage = document.getElementById("preview-thumbnail");

    if (fileInput && previewContainer && previewImage) {
        fileInput.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (!file) return previewContainer.classList.add("hidden");

            const reader = new FileReader();
            reader.onload = (evt) => {
                previewImage.src = evt.target.result;
                previewContainer.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        });
    }
});
// === Form Registrasi Tambahan ===
document.addEventListener("DOMContentLoaded", function () {
    // Inisialisasi TomSelect
    new TomSelect("#personal_city", {
        create: false,
        sortField: { field: "text", direction: "asc" },
        maxOptions: 500,
    });
    new TomSelect("#company_city", {
        create: false,
        sortField: { field: "text", direction: "asc" },
        maxOptions: 500,
    });

    // Toggle personal/company fields
    const participantType = document.getElementById("participant_type");
    const companyFields = document.getElementById("company_fields");
    const companyCityField = document.getElementById("company_city_field");
    const personalCityField = document.getElementById("personal_city_field");

    participantType.addEventListener("change", function () {
        const type = this.value;
        companyFields.classList.toggle("hidden", type !== "company");
        companyCityField.classList.toggle("hidden", type !== "company");
        personalCityField.classList.toggle("hidden", type !== "personal");
    });
});
