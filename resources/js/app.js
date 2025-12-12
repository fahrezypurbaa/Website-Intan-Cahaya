import "./bootstrap";

/* =============================
   Utility: Slugify
============================= */
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

document.addEventListener("DOMContentLoaded", () => {
    /* =============================
       NAVBAR MOBILE
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

    document.querySelectorAll(".mobile-dropdown-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            const target = document.getElementById(this.dataset.target);
            const arrow = this.querySelector("svg");
            target?.classList.toggle("hidden");
            arrow?.classList.toggle("rotate-180");
        });
    });

    /* =============================
       PROGRAM SWIPER
    ============================== */
    const programSwipers = [];

    const initProgramSwipers = () => {
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
    };

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

    initProgramSwipers();

    /* =============================
       CLIENT LOGO SWIPER
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
       COUNTER ANIMATION
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
                                count = target;
                                clearInterval(interval);
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
       GALLERY MODAL PREVIEW
    ============================== */
    const images = document.querySelectorAll(".gallery-item img");
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const closeBtn = document.getElementById("closeModal");

    if (modal && modalImg && images.length) {
        images.forEach((img) => {
            img.addEventListener("click", () => {
                modal.classList.remove("hidden");
                modalImg.src = img.dataset.full;
            });
        });

        closeBtn?.addEventListener("click", () =>
            modal.classList.add("hidden")
        );
        modal.addEventListener("click", (e) => {
            if (e.target === modal) modal.classList.add("hidden");
        });
    }

    /* =============================
       FORM REGISTRASI
    ============================== */
    const participantType = document.getElementById("participant_type");
    const personalFields = document.getElementById("personal_fields");
    const companyFields = document.getElementById("company_fields");

    if (participantType && personalFields && companyFields) {
        const updateFields = () => {
            const type = participantType.value;
            personalFields.classList.toggle("hidden", type !== "personal");
            companyFields.classList.toggle("hidden", type !== "company");
        };

        updateFields();
        participantType.addEventListener("change", updateFields);
    }

    /* =============================
       FILTER TRAINING BERDASARKAN KATEGORI
    ============================== */
    const categorySelect = document.getElementById("category_id");
    const trainingSelect = document.getElementById("training_id");

    if (categorySelect && trainingSelect) {
        categorySelect.addEventListener("change", () => {
            const selected = categorySelect.value;

            for (const option of trainingSelect.options) {
                if (option.value) {
                    option.style.display =
                        option.dataset.category === selected ? "block" : "none";
                }
            }

            trainingSelect.value = "";
        });
    }

    /* =============================
       SLUG GENERATOR
    ============================== */
    const titleInput = document.getElementById("title");
    const slugInput = document.getElementById("slug");

    if (titleInput && slugInput) {
        titleInput.addEventListener("keyup", function () {
            slugInput.value = slugify(this.value);
        });
    }

    /* =============================
       PREVIEW THUMBNAIL
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
