<section class="info-area info-bg padding-top-50px padding-bottom-50px text-center"
    style="background-color:#f8f9fa; display: none;">
    <!-- Tutorial section hidden -->
</section>

<style>
.tutorial-img {
    max-width: 300px;
    width: 100%;
    margin: auto;
    display: block;
}

@media (max-width: 576px) {
    .tutorial-img {
        max-width: 180px;
    }
}

.carousel-item {
    background: transparent;
}
</style>

<!-- hot deal tab start -->
<style>
.promo-section {
    padding: 60px 0;
}

.section-header {
    margin-bottom: 40px;
}

.section-title {
    font-size: 32px;
    font-weight: 800;
    color: #0F172A;
    margin-bottom: 8px;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #003094 0%, #0066FF 100%);
    border-radius: 2px;
}

.section-subtitle {
    font-size: 16px;
    color: #64748B;
    margin-top: 15px;
}

.promo-tabs {
    gap: 12px;
    padding: 8px;
    background: white;
    border-radius: 50px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    display: inline-flex;
    margin-bottom: 40px;
}

.promo-tabs .nav-link {
    color: #64748B;
    background: transparent;
    border: none;
    padding: 10px 24px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 50px;
    position: relative;
}

.promo-tabs .nav-link:hover {
    color: #003094;
    background: #F1F5F9;
}

.promo-tabs .nav-link.active {
    color: white;
    background: linear-gradient(135deg, #003094 0%, #0066FF 100%);
    box-shadow: 0 4px 12px rgba(0, 48, 148, 0.3);
}

/* Hot Deal Card Styles */
.hot-deal-card {
    display: flex;
    background: #FFFFFF;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 180px;
    border: 1px solid #E2E8F0;
    position: relative;
}

.hot-deal-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #003094 0%, #0066FF 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.hot-deal-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
}

.hot-deal-card:hover::before {
    opacity: 1;
}

.hot-left-box {
    width: 160px;
    background: linear-gradient(135deg, #002B7F 0%, #003094 100%);
    color: white;
    padding: 24px 18px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
}

.hot-left-box::after {
    content: '';
    position: absolute;
    right: -20px;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #002B7F 0%, #003094 100%);
    border-radius: 50%;
    z-index: -1;
}

.discount-badge {
    font-size: 20px;
    font-weight: 800;
    margin-bottom: 12px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.hot-left-box img {
    width: 50px;
    height: 50px;
    filter: brightness(0) invert(1);
    opacity: 0.9;
}

.hot-right-box {
    padding: 24px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.hot-title {
    font-size: 17px;
    font-weight: 700;
    color: #0F172A;
    line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.hot-subtitle {
    font-size: 13px;
    color: #64748B;
    line-height: 1.5;
}

.card-footer-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-top: 12px;
}

.code-tag {
    background: linear-gradient(135deg, #EEF2FF 0%, #E0E7FF 100%);
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 700;
    color: #003094;
    font-size: 13px;
    border: 1px solid #C7D2FE;
    letter-spacing: 0.5px;
}

.btn-learn {
    background: linear-gradient(135deg, #FFD100 0%, #FFC107 100%);
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 700;
    border: none;
    color: #003094;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(255, 209, 0, 0.3);
    white-space: nowrap;
}

.btn-learn:hover {
    background: linear-gradient(135deg, #FFC107 0%, #FFB300 100%);
    transform: translateX(3px);
    box-shadow: 0 4px 12px rgba(255, 209, 0, 0.4);
}

.btn-learn::before {
    content: '→';
    margin-right: 6px;
    font-weight: bold;
}

.carousel-control-prev,
.carousel-control-next {
    width: 45px;
    height: 45px;
    background: white;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 1;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    transition: all 0.3s ease;
}

.carousel-control-prev {
    left: -22px;
}

.carousel-control-next {
    right: -22px;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    background: #003094;
    box-shadow: 0 6px 20px rgba(0, 48, 148, 0.3);
}

.carousel-control-prev:hover .carousel-control-prev-icon,
.carousel-control-next:hover .carousel-control-next-icon {
    filter: brightness(0) invert(1);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
    background-size: 100%;
    filter: invert(0.2);
    transition: filter 0.3s ease;
}

.carousel-indicators {
    margin-bottom: -40px;
}

.carousel-indicators button {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #CBD5E1;
    border: none;
    transition: all 0.3s ease;
}

.carousel-indicators button.active {
    width: 28px;
    border-radius: 5px;
    background: linear-gradient(90deg, #003094 0%, #0066FF 100%);
}

/* Loading Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.promo-card-wrapper {
    animation: slideIn 0.5s ease forwards;
}

.promo-card-wrapper:nth-child(1) {
    animation-delay: 0.1s;
}

.promo-card-wrapper:nth-child(2) {
    animation-delay: 0.2s;
}

.promo-card-wrapper:nth-child(3) {
    animation-delay: 0.3s;
}

@media (max-width: 768px) {
    .section-title {
        font-size: 26px;
    }

    .promo-tabs {
        flex-wrap: wrap;
        border-radius: 16px;
        width: 100%;
    }

    .promo-tabs .nav-link {
        padding: 8px 18px;
        font-size: 14px;
    }

    .hot-deal-card {
        height: auto;
        flex-direction: column;
    }

    .hot-left-box {
        width: 100%;
        padding: 20px;
        flex-direction: row;
        justify-content: space-between;
        border-radius: 16px 16px 0 0;
    }

    .hot-left-box::after {
        display: none;
    }

    .discount-badge {
        font-size: 18px;
        margin-bottom: 0;
    }

    .hot-left-box img {
        width: 40px;
        height: 40px;
    }

    .card-footer-section {
        flex-direction: column;
        align-items: stretch;
    }

    .btn-learn {
        width: 100%;
        text-align: center;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 38px;
        height: 38px;
    }

    .carousel-control-prev {
        left: -10px;
    }

    .carousel-control-next {
        right: -10px;
    }
}

/* Hide controls when only one slide */
.carousel-control-prev.d-none,
.carousel-control-next.d-none {
    display: none !important;
}

/* Hide indicators when only one slide */
.carousel-indicators.d-none {
    display: none !important;
}
</style>

<section class="promo-section section-bg">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-center flex-wrap mb-4">
            <h2 class="section-title mb-0">Hot Deals</h2>
            <ul class="nav nav-pills promo-tabs mb-0" id="promoTabs">
                <li class="nav-item">
                    <button class="nav-link active" data-category="all">All</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-category="tour">Tour</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-category="flight">Flight</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-category="hotel">Hotel</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-category="others">Others</button>
                </li>
            </ul>
        </div>


        <div id="hotDealsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Indicators will be generated dynamically -->
            <div class="carousel-indicators" id="hotDealsIndicators">
                <!-- Indicators will be inserted here by JavaScript -->
            </div>

            <div class="carousel-inner" id="hotDealsCarouselInner">
                <!-- Carousel slides will be generated dynamically -->
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#hotDealsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hotDealsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Original data - all deals
    const allDeals = [
        // Tour deals
        {
            category: "tour",
            discount: "5% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
            title: "On Selected Saint Martin Cruises for card payment",
            subtitle: "On published rate, for card payment. Till 31 December'25.",
            code: "SMTOURC1125",
            bgColor: "linear-gradient(135deg, #002B7F 0%, #003094 100%)"
        },
        {
            category: "tour",
            discount: "5% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/5968/5968144.png",
            title: "On Selected Saint Martin Cruises for bKash payment",
            subtitle: "On published rate, for bKash payment. Till 31 January'26.",
            code: "SMTOURB1125",
            bgColor: "linear-gradient(135deg, #002B7F 0%, #003094 100%)"
        },

        // Flight deals
        {
            category: "flight",
            discount: "BDT 5K",
            icon: "https://cdn-icons-png.flaticon.com/512/2983/2983709.png",
            title: "Up to BDT 5,000 Discount on Int'l Flight Bookings",
            subtitle: "On total fare, for EBL Visa credit cards. Min. purchase BDT 35,000. Till 20 Dec'25.",
            code: "EINT1125",
            bgColor: "linear-gradient(135deg, #003094 0%, #0066FF 100%)"
        },
        {
            category: "flight",
            discount: "18% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/2983/2983709.png",
            title: "Up to 18% Discount on Int'l Flight Bookings",
            subtitle: "On base fare, for City Bank American Express® cards. Till 31 Dec'25.",
            code: "AMEX0925",
            bgColor: "linear-gradient(135deg, #1E40AF 0%, #3B82F6 100%)"
        },
        {
            category: "flight",
            discount: "SAVE BIG",
            icon: "https://cdn-icons-png.flaticon.com/512/2983/2983709.png",
            title: "On Int'l Flight Bookings",
            subtitle: "On base fare, for BRAC Bank credit cards. Till 10 December 2025.",
            code: "BBLINT1125",
            bgColor: "linear-gradient(135deg, #7C3AED 0%, #A78BFA 100%)"
        },
        {
            category: "flight",
            discount: "14% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/2983/2983709.png",
            title: "Up to 14% Discount on Domestic Flights",
            subtitle: "On base fare, for StanChart credit cards. Till 15 December'25.",
            code: "FLYSC1125",
            bgColor: "linear-gradient(135deg, #DC2626 0%, #EF4444 100%)"
        },
        {
            category: "flight",
            discount: "SPECIAL",
            icon: "https://cdn-icons-png.flaticon.com/512/2983/2983709.png",
            title: "On Domestic Flight Booking",
            subtitle: "On base fare, for bKash payment. Till 31 December'25.",
            code: "DOMB1125",
            bgColor: "linear-gradient(135deg, #8B5CF6 0%, #A78BFA 100%)"
        },
        {
            category: "flight",
            discount: "EXCLUSIVE",
            icon: "https://cdn-icons-png.flaticon.com/512/2983/2983709.png",
            title: "On International Flight Booking",
            subtitle: "On base fare, for bKash payment. Till 31 December'25.",
            code: "BINT1125",
            bgColor: "linear-gradient(135deg, #DB2777 0%, #EC4899 100%)"
        },

        // Hotel deals
        {
            category: "hotel",
            discount: "54% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/3050/3050155.png",
            title: "Up to 54% Off on Extended Stay at Hotel Sea Uttara",
            subtitle: "Cox's Bazar special offer for extended stays. Limited time offer.",
            code: "HOTEL54",
            bgColor: "linear-gradient(135deg, #059669 0%, #10B981 100%)"
        },
        {
            category: "hotel",
            discount: "56% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/3050/3050155.png",
            title: "Up to 56% Off at Hotel Noorjahan Grand, Sylhet",
            subtitle: "Extended stay discount available. Book now for best rates.",
            code: "HOTEL56",
            bgColor: "linear-gradient(135deg, #0891B2 0%, #06B6D4 100%)"
        },
        {
            category: "hotel",
            discount: "30% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/3050/3050155.png",
            title: "Up to 30% Off at Foy's Lake Resort, Chattogram",
            subtitle: "Extended stay discount at premium resort. Limited availability.",
            code: "FOYS30",
            bgColor: "linear-gradient(135deg, #EA580C 0%, #F97316 100%)"
        },

        // Others deals
        {
            category: "others",
            discount: "25% OFF",
            icon: "https://cdn-icons-png.flaticon.com/512/3208/3208799.png",
            title: "Get 25% discount on Chorki Subscription Plans",
            subtitle: "Special discount for GoZayaan customers on entertainment subscriptions.",
            code: "CHORKI25",
            bgColor: "linear-gradient(135deg, #0D9488 0%, #14B8A6 100%)"
        }
    ];

    // DOM elements
    const buttons = document.querySelectorAll(".promo-tabs .nav-link");
    const carouselInner = document.getElementById("hotDealsCarouselInner");
    const indicatorsContainer = document.getElementById("hotDealsIndicators");
    const prevButton = document.querySelector(".carousel-control-prev");
    const nextButton = document.querySelector(".carousel-control-next");
    const carouselElement = document.getElementById("hotDealsCarousel");

    // Function to create a deal card
    function createDealCard(deal) {
        return `
            <div class="col-12 col-md-4 promo-card-wrapper">
                <div class="hot-deal-card" data-category="${deal.category}">
                    <div class="hot-left-box" style="background: ${deal.bgColor};">
                        <div class="discount-badge">${deal.discount}</div>
                        <img src="${deal.icon}" alt="${deal.category}">
                    </div>
                    <div class="hot-right-box">
                        <div>
                            <div class="hot-title">${deal.title}</div>
                            <div class="hot-subtitle">${deal.subtitle}</div>
                        </div>
                        <div class="card-footer-section">
                            <span class="code-tag">${deal.code}</span>
                            <button class="btn-learn">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Function to render carousel with filtered deals
    function renderCarousel(deals) {
        // Clear existing content
        carouselInner.innerHTML = '';
        indicatorsContainer.innerHTML = '';

        // If no deals, show message
        if (deals.length === 0) {
            carouselInner.innerHTML = `
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-12 text-center py-5">
                            <h4 class="text-muted">No deals available</h4>
                            <p class="text-muted mt-2">Check back later for new offers!</p>
                        </div>
                    </div>
                </div>
            `;
            indicatorsContainer.innerHTML =
                '<button type="button" data-bs-target="#hotDealsCarousel" data-bs-slide-to="0" class="active d-none"></button>';
            prevButton.classList.add('d-none');
            nextButton.classList.add('d-none');
            return;
        }

        // Group deals into slides (3 per slide)
        const slides = [];
        for (let i = 0; i < deals.length; i += 3) {
            slides.push(deals.slice(i, i + 3));
        }

        // Generate slides
        slides.forEach((slideDeals, index) => {
            const isActive = index === 0;
            const slideCards = slideDeals.map(createDealCard).join('');

            carouselInner.innerHTML += `
                <div class="carousel-item ${isActive ? 'active' : ''}">
                    <div class="row g-4">
                        ${slideCards}
                    </div>
                </div>
            `;

            // Generate indicator
            indicatorsContainer.innerHTML += `
                <button type="button" data-bs-target="#hotDealsCarousel" 
                        data-bs-slide-to="${index}" 
                        class="${isActive ? 'active' : ''}"></button>
            `;
        });

        // Show/hide controls based on number of slides
        if (slides.length <= 1) {
            prevButton.classList.add('d-none');
            nextButton.classList.add('d-none');
            indicatorsContainer.classList.add('d-none');
        } else {
            prevButton.classList.remove('d-none');
            nextButton.classList.remove('d-none');
            indicatorsContainer.classList.remove('d-none');
        }

        // Reinitialize Bootstrap carousel
        if (window.bootstrap && window.bootstrap.Carousel) {
            // Dispose existing instance
            const oldCarousel = bootstrap.Carousel.getInstance(carouselElement);
            if (oldCarousel) {
                oldCarousel.dispose();
            }

            // Create new instance
            new bootstrap.Carousel(carouselElement, {
                interval: 5000,
                ride: 'carousel'
            });
        }

        // Reattach click events to Learn More buttons
        document.querySelectorAll('.btn-learn').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.hot-deal-card');
                const title = card.querySelector('.hot-title').textContent;
                const code = card.querySelector('.code-tag').textContent;
                alert(`Learn more about:\n\n${title}\n\nPromo Code: ${code}`);
            });
        });
    }

    // Initial render with all deals
    renderCarousel(allDeals);

    // Tab click event
    buttons.forEach(btn => {
        btn.addEventListener("click", function() {
            // Update active tab
            buttons.forEach(b => b.classList.remove("active"));
            this.classList.add("active");

            let category = this.getAttribute("data-category");

            // Filter deals
            let filteredDeals;
            if (category === "all") {
                filteredDeals = allDeals;
            } else {
                filteredDeals = allDeals.filter(deal => deal.category === category);
            }

            // Render filtered deals
            renderCarousel(filteredDeals);
        });
    });

    // Add animation to cards on slide change
    carouselElement.addEventListener('slid.bs.carousel', function() {
        const activeSlide = document.querySelector('.carousel-item.active');
        if (activeSlide) {
            const promoWrappers = activeSlide.querySelectorAll('.promo-card-wrapper');

            promoWrappers.forEach((wrapper, index) => {
                wrapper.style.animation = 'none';
                void wrapper.offsetWidth; // Trigger reflow
                wrapper.style.animation = `slideIn 0.5s ease forwards ${index * 0.1}s`;
            });
        }
    });
});
</script>