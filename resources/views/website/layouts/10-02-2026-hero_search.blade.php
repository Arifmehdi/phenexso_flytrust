@push('css')
<style>
          .home-banner {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .home-banner-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .home-banner-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation: smoothZoom 20s ease-in-out infinite alternate;
        }

        @keyframes smoothZoom {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.1);
            }
        }

        .searchbar-wrapper {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            min-height: 100vh;
            padding: 60px 0;
        }

        .searchbar-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }

        #searchbar {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            overflow: visible;
            max-width: 1200px;
            margin: 0 auto;
        }

        .search-type {
            display: flex;
            background: #f8f9fa;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 12px 12px 0 0;
        }

        .search-type-tab {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px 20px;
            cursor: pointer;
            transition: all 0.3s;
            gap: 10px;
            border-bottom: 3px solid transparent;
        }

        .search-type-tab:hover {
            background: #fff;
        }

        .search-type-tab.active {
            background: #fff;
            border-bottom-color: #2563eb;
        }

        .product-icon {
            width: 24px;
            height: 24px;
            fill: #666;
            transition: all 0.3s;
        }

        .search-type-tab.active .product-icon {
            fill: #2563eb;
        }

        .product {
            font-weight: 600;
            color: #666;
            font-size: 15px;
            transition: all 0.3s;
        }

        .search-type-tab.active .product {
            color: #2563eb;
        }

        .flight {
            padding: 25px;
        }

        .flight-type-wrapper {
            display: flex;
            gap: 30px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .radio {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .radio input[type="radio"] {
            display: none;
        }

        .radio-btn {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            position: relative;
            transition: all 0.3s;
        }

        .radio input[type="radio"]:checked + .radio-btn {
            border-color: #2563eb;
        }

        .radio input[type="radio"]:checked + .radio-btn::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: #2563eb;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .flight-type-text {
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
        }

        .flight-search {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .box {
            flex: 1;
            min-width: 180px;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            background: #fff;
            position: relative;
        }

        .box:hover {
            border-color: #2563eb;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
        }

        .box.active {
            border-color: #2563eb;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .box.location {
            position: relative;
        }

        .box.has-swapper {
            position: relative;
        }

        .swapper {
            position: absolute;
            left: -15px;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
        }

        .swapper::before {
            content: '⇄';
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }

        .label {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .value {
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 2px;
        }

        .value span {
            font-size: 14px;
        }

        .sub-value {
            font-size: 12px;
            color: #9ca3af;
            display: block;
        }

        .sub-value.inline-style {
            color: #10b981;
            font-weight: 500;
        }

        .search-btn-container {
            padding: 0 25px 25px;
        }

        .search-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .search-btn:active {
            transform: translateY(0);
        }

        /* Airport Suggestion Dropdown */
        .airport-suggestion {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            background: #fff;
            border: 2px solid #2563eb;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            display: none;
        }

        .airport-suggestion.active {
            display: block;
        }

        .input-wrapper {
            padding: 15px;
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px 40px 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            font-size: 14px;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .close-btn {
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 20px;
            font-weight: bold;
        }

        .close-btn:hover {
            color: #2563eb;
        }

        .airport-list {
            max-height: 250px;
            overflow-y: auto;
            padding: 0 10px 10px;
        }

        .airport-item {
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .airport-item:hover {
            background: #f3f4f6;
        }

        .airport-name {
            font-weight: 600;
            color: #111827;
            font-size: 14px;
        }

        .airport-code {
            color: #6b7280;
            font-size: 12px;
        }

        /* Date Picker */
        .date-picker {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            background: #fff;
            border: 2px solid #2563eb;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            min-width: 300px;
            display: none;
        }

        .date-picker.active {
            display: block;
        }

        .date-picker-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .date-picker-header button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #6b7280;
            padding: 5px 10px;
        }

        .date-picker-header button:hover {
            color: #2563eb;
        }

        .date-picker-month {
            font-weight: 600;
            color: #111827;
        }

        .date-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .date-day-name {
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            padding: 8px;
        }

        .date-day {
            text-align: center;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s;
        }

        .date-day:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .date-day.selected {
            background: #2563eb;
            color: #fff;
        }

        .date-day.disabled {
            color: #d1d5db;
            cursor: not-allowed;
        }

        .date-day.disabled:hover {
            background: transparent;
            color: #d1d5db;
        }

        /* Traveler Modal */
        .traveler-modal {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: #fff;
            border: 2px solid #2563eb;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            min-width: 320px;
            display: none;
        }

        .traveler-modal.active {
            display: block;
        }

        .traveler-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .traveler-row:last-child {
            border-bottom: none;
        }

        .traveler-label {
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        .traveler-sublabel {
            font-size: 12px;
            color: #9ca3af;
        }

        .traveler-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .qty-btn {
            width: 35px;
            height: 35px;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            background: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            font-size: 18px;
            color: #6b7280;
            font-weight: bold;
        }

        .qty-btn:hover {
            border-color: #2563eb;
            color: #2563eb;
            background: #eff6ff;
        }

        .qty-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .qty-value {
            min-width: 30px;
            text-align: center;
            font-weight: 600;
            color: #111827;
            font-size: 16px;
        }

        .class-selector {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        .class-options {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }

        .class-option {
            flex: 1;
            padding: 10px 12px;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s;
            color: #6b7280;
        }

        .class-option:hover {
            border-color: #2563eb;
            color: #2563eb;
        }

        .class-option.active {
            border-color: #2563eb;
            background: #2563eb;
            color: #fff;
        }

        @media (max-width: 768px) {
            .search-type-tab {
                padding: 12px 10px;
                font-size: 13px;
            }

            .product {
                font-size: 13px;
            }

            .product-icon {
                width: 20px;
                height: 20px;
            }

            .flight-search {
                flex-direction: column;
            }

            .box {
                min-width: 100%;
            }

            .flight-type-wrapper {
                flex-wrap: wrap;
                gap: 15px;
            }

            .swapper {
                left: 50%;
                top: -15px;
                transform: translateX(-50%) rotate(90deg);
            }

            .traveler-modal,
            .date-picker {
                right: auto;
                left: 0;
                min-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .search-type {
                flex-wrap: wrap;
            }

            .search-type-tab {
                flex-basis: 50%;
            }

            .searchbar-wrapper {
                padding: 30px 0;
            }
        }

        /* Tab Content Visibility */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

    /* Keep all your existing CSS styles, but add these flight results styles */
    
    /* Flight Results Modal */
    .flight-results-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: none;
        overflow-y: auto;
    }

    .flight-results-modal.active {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding: 40px 20px;
    }

    .flight-results-container {
        background: #fff;
        border-radius: 12px;
        width: 100%;
        max-width: 1200px;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
    }

    .flight-results-header {
        padding: 20px;
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        color: white;
        border-radius: 12px 12px 0 0;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .flight-results-header h2 {
        margin: 0;
        font-size: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .close-results-btn {
        position: absolute;
        right: 20px;
        top: 20px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .close-results-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    .results-summary {
        display: flex;
        gap: 20px;
        margin-top: 15px;
        flex-wrap: wrap;
    }

    .summary-item {
        background: rgba(255, 255, 255, 0.1);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
    }

    .flight-results-body {
        padding: 20px;
    }

    .loading-spinner {
        text-align: center;
        padding: 60px;
        color: #666;
    }

    .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #2563eb;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Flight Card */
    .flight-card {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        margin-bottom: 15px;
        background: #fff;
        overflow: hidden;
        transition: all 0.3s;
    }

    .flight-card:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .flight-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: #f8f9fa;
        border-bottom: 1px solid #e5e7eb;
    }

    .airline-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .airline-logo {
        width: 40px;
        height: 40px;
        background: #2563eb;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    .airline-details h4 {
        margin: 0;
        font-size: 16px;
        color: #111827;
    }

    .flight-numbers {
        font-size: 12px;
        color: #6b7280;
    }

    .flight-price {
        text-align: right;
    }

    .price-amount {
        font-size: 24px;
        font-weight: bold;
        color: #10b981;
        display: block;
    }

    .price-label {
        font-size: 12px;
        color: #6b7280;
    }

    /* Flight Details */
    .flight-details {
        padding: 20px;
    }

    .route-segment {
        display: flex;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .route-segment:last-child {
        border-bottom: none;
    }

    .departure, .arrival {
        flex: 1;
    }

    .airport-code {
        font-size: 20px;
        font-weight: bold;
        color: #111827;
        display: block;
    }

    .airport-time {
        font-size: 16px;
        font-weight: 600;
        color: #374151;
        display: block;
    }

    .airport-date {
        font-size: 12px;
        color: #6b7280;
    }

    .flight-duration {
        flex: 2;
        text-align: center;
        padding: 0 20px;
    }

    .duration-line {
        height: 3px;
        background: #d1d5db;
        position: relative;
        margin: 10px 0;
    }

    .duration-dot {
        width: 8px;
        height: 8px;
        background: #2563eb;
        border-radius: 50%;
        position: absolute;
        top: -3px;
    }

    .duration-dot.start {
        left: 0;
    }

    .duration-dot.end {
        right: 0;
    }

    .duration-text {
        font-size: 12px;
        color: #6b7280;
        margin-top: 5px;
    }

    .stops-info {
        background: #f3f4f6;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 12px;
        color: #4b5563;
        margin-top: 5px;
    }

    .flight-footer {
        padding: 15px 20px;
        background: #f8f9fa;
        border-top: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .flight-amenities {
        display: flex;
        gap: 15px;
        font-size: 12px;
        color: #6b7280;
    }

    .amenity {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .select-flight-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .select-flight-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .select-flight-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    /* Filters */
    .results-filters {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .filter-btn {
        padding: 8px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 20px;
        background: white;
        cursor: pointer;
        font-size: 14px;
        color: #4b5563;
        transition: all 0.3s;
    }

    .filter-btn:hover {
        border-color: #2563eb;
        color: #2563eb;
    }

    .filter-btn.active {
        background: #2563eb;
        color: white;
        border-color: #2563eb;
    }

    /* No Results */
    .no-results {
        text-align: center;
        padding: 60px 20px;
        color: #6b7280;
    }

    .no-results-icon {
        font-size: 48px;
        margin-bottom: 20px;
        color: #d1d5db;
    }

    /* Error Message */
    .error-message {
        background: #fee2e2;
        border: 1px solid #fecaca;
        color: #dc2626;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Flight Type Badge */
    .flight-type-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 10px;
    }

    .one-way-badge { background: #dbeafe; color: #1e40af; }
    .round-way-badge { background: #f0f9ff; color: #0369a1; }

    /* Responsive */
    @media (max-width: 768px) {
        .flight-results-modal.active {
            padding: 20px 10px;
        }

        .flight-results-container {
            max-height: 95vh;
        }

        .flight-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .flight-price {
            text-align: left;
            width: 100%;
        }

        .route-segment {
            flex-direction: column;
            gap: 15px;
        }

        .flight-duration {
            padding: 10px 0;
        }

        .duration-line {
            width: 100%;
        }

        .flight-footer {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .results-filters {
            justify-content: center;
        }
    }
</style>
@endpush

<div class="home-banner">
    <picture class="image-kit home-banner-bg">
        <source media="(max-width: 576px)"
            srcset="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=600&h=650&fit=crop">
        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1920&h=1080&fit=crop"
            alt="home banner" class="image-kit">
    </picture>

    <div class="searchbar-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="searchbar" class="full searchbar-visible">
                        <!-- Search Type Tabs -->
                        <div class="search-type">
                            <span class="search-type-tab active" data-tab="flight">
                                <svg width="25" height="18" viewBox="0 0 24 24" fill="currentColor" class="product-icon">
                                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                                </svg>
                                <span class="product">Flight</span>
                            </span>
                            <span class="search-type-tab" data-tab="hotel">
                                <svg width="25" height="18" viewBox="0 0 24 24" fill="currentColor" class="product-icon">
                                    <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/>
                                </svg>
                                <span class="product">Hotel</span>
                            </span>
                            <span class="search-type-tab" data-tab="tour">
                                <svg width="25" height="18" viewBox="0 0 24 24" fill="currentColor" class="product-icon">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                                <span class="product">Tour</span>
                            </span>
                            <span class="search-type-tab" data-tab="visa">
                                <svg width="25" height="18" viewBox="0 0 24 24" fill="currentColor" class="product-icon">
                                    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                                </svg>
                                <span class="product">Visa</span>
                            </span>
                        </div>

                        <!-- Flight Tab Content -->
                        <div class="tab-content active" id="flight-content">
                            <div class="flight">
                                <div class="flight-type-wrapper">
                                    <label class="radio">
                                        <input type="radio" name="flight-type" value="ONE_WAY" checked>
                                        <span class="radio-btn"></span>
                                        <span class="flight-type-text">One Way</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="flight-type" value="ROUND_WAY">
                                        <span class="radio-btn"></span>
                                        <span class="flight-type-text">Round Way</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="flight-type" value="MULTI_CITY">
                                        <span class="radio-btn"></span>
                                        <span class="flight-type-text">Multi City</span>
                                    </label>
                                </div>

                                <div class="flight-search bar">
                                    <div class="box location from" id="from-box">
                                        <span class="label">From</span>
                                        <div class="value" id="from-value">Dhaka</div>
                                        <span class="sub-value" id="from-subvalue">DAC, Hazrat Shahjalal International Airport</span>
                                        
                                        <div class="airport-suggestion" id="from-dropdown">
                                            <div class="input-wrapper">
                                                <input type="text" placeholder="Type to search airport" id="from-search">
                                                <span class="close-btn" onclick="closeDropdown('from')">×</span>
                                            </div>
                                            <div class="airport-list" id="from-airport-list">
                                                <!-- Will be populated by API -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box location to has-swapper" id="to-box">
                                        <span class="swapper" onclick="swapLocations()"></span>
                                        <span class="label">To</span>
                                        <div class="value" id="to-value">Cox's Bazar</div>
                                        <span class="sub-value" id="to-subvalue">CXB, Cox's Bazar Airport</span>
                                        
                                        <div class="airport-suggestion" id="to-dropdown">
                                            <div class="input-wrapper">
                                                <input type="text" placeholder="Type to search airport" id="to-search">
                                                <span class="close-btn" onclick="closeDropdown('to')">×</span>
                                            </div>
                                            <div class="airport-list" id="to-airport-list">
                                                <!-- Will be populated by API -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box date depart" id="depart-box">
                                        <span class="label">Departure Date</span>
                                        <div class="value"><span id="depart-day">16</span> <span id="depart-month">Dec'25</span></div>
                                        <span class="sub-value" id="depart-weekday">Tuesday</span>
                                        
                                        <div class="date-picker" id="depart-picker">
                                            <div class="date-picker-header">
                                                <button type="button" onclick="changeMonth('depart', -1)">◀</button>
                                                <span class="date-picker-month" id="depart-month-display">December 2025</span>
                                                <button type="button" onclick="changeMonth('depart', 1)">▶</button>
                                            </div>
                                            <div class="date-grid" id="depart-grid"></div>
                                        </div>
                                    </div>

                                    <div class="box date return" id="return-box">
                                        <span class="label">Return Date</span>
                                        <span class="sub-value inline-style">Save more on return flight</span>
                                        
                                        <div class="date-picker" id="return-picker">
                                            <div class="date-picker-header">
                                                <button type="button" onclick="changeMonth('return', -1)">◀</button>
                                                <span class="date-picker-month" id="return-month-display">December 2025</span>
                                                <button type="button" onclick="changeMonth('return', 1)">▶</button>
                                            </div>
                                            <div class="date-grid" id="return-grid"></div>
                                        </div>
                                    </div>

                                    <div class="box traveler" id="traveler-box">
                                        <span class="label">Traveler, Class</span>
                                        <div class="value"><span id="traveler-count">1</span> Traveler</div>
                                        <span class="sub-value" id="class-display">Economy</span>

                                        <div class="traveler-modal" id="traveler-modal">
                                            <div class="traveler-row">
                                                <div>
                                                    <div class="traveler-label">Adults</div>
                                                    <div class="traveler-sublabel">12+ years</div>
                                                </div>
                                                <div class="traveler-controls">
                                                    <button type="button" class="qty-btn" onclick="changeQty('adults', -1)">−</button>
                                                    <span class="qty-value" id="adults-count">1</span>
                                                    <button type="button" class="qty-btn" onclick="changeQty('adults', 1)">+</button>
                                                </div>
                                            </div>
                                            <div class="traveler-row">
                                                <div>
                                                    <div class="traveler-label">Children</div>
                                                    <div class="traveler-sublabel">2-11 years</div>
                                                </div>
                                                <div class="traveler-controls">
                                                    <button type="button" class="qty-btn" onclick="changeQty('children', -1)">−</button>
                                                    <span class="qty-value" id="children-count">0</span>
                                                    <button type="button" class="qty-btn" onclick="changeQty('children', 1)">+</button>
                                                </div>
                                            </div>
                                            <div class="traveler-row">
                                                <div>
                                                    <div class="traveler-label">Infants</div>
                                                    <div class="traveler-sublabel">Under 2 years</div>
                                                </div>
                                                <div class="traveler-controls">
                                                    <button type="button" class="qty-btn" onclick="changeQty('infants', -1)">−</button>
                                                    <span class="qty-value" id="infants-count">0</span>
                                                    <button type="button" class="qty-btn" onclick="changeQty('infants', 1)">+</button>
                                                </div>
                                            </div>
                                            <div class="class-selector">
                                                <div class="traveler-label">Class</div>
                                                <div class="class-options">
                                                    <div class="class-option active" onclick="selectClass('ECONOMY', this)">Economy</div>
                                                    <div class="class-option" onclick="selectClass('PREMIUM_ECONOMY', this)">Premium Economy</div>
                                                    <div class="class-option" onclick="selectClass('BUSINESS', this)">Business</div>
                                                    <div class="class-option" onclick="selectClass('FIRST', this)">First</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="search-btn-container">
                                <button type="button" class="search-btn" id="search-flights-btn">Search Flights</button>
                            </div>
                        </div>

                        <!-- Hotel Tab Content -->
                        <div class="tab-content" id="hotel-content">
                            <div class="flight">
                                <div class="flight-search bar">
                                    <div class="box location" id="hotel-destination-box">
                                        <span class="label">Destination</span>
                                        <div class="value" id="hotel-destination-value">Enter city or property</div>
                                        <span class="sub-value" id="hotel-destination-sub"></span>
                                        
                                        <div class="airport-suggestion" id="hotel-destination-dropdown">
                                            <div class="input-wrapper">
                                                <input type="text" placeholder="Type city or hotel name" id="hotel-destination-search">
                                                <span class="close-btn" onclick="closeDropdown('hotel-destination')">×</span>
                                            </div>
                                            <div class="airport-list">
                                                <div class="airport-item" onclick="selectHotelDestination('Dhaka', 'Bangladesh')">
                                                    <div class="airport-name">Dhaka</div>
                                                    <div class="airport-code">Bangladesh</div>
                                                </div>
                                                <div class="airport-item" onclick="selectHotelDestination('Cox\'s Bazar', 'Bangladesh')">
                                                    <div class="airport-name">Cox's Bazar</div>
                                                    <div class="airport-code">Bangladesh</div>
                                                </div>
                                                <div class="airport-item" onclick="selectHotelDestination('Chittagong', 'Bangladesh')">
                                                    <div class="airport-name">Chittagong</div>
                                                    <div class="airport-code">Bangladesh</div>
                                                </div>
                                                <div class="airport-item" onclick="selectHotelDestination('Sylhet', 'Bangladesh')">
                                                    <div class="airport-name">Sylhet</div>
                                                    <div class="airport-code">Bangladesh</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box date" id="hotel-checkin-box">
                                        <span class="label">Check-in</span>
                                        <div class="value"><span id="hotel-checkin-day">16</span> <span id="hotel-checkin-month">Dec'25</span></div>
                                        <span class="sub-value" id="hotel-checkin-weekday">Tuesday</span>
                                        
                                        <div class="date-picker" id="hotel-checkin-picker">
                                            <div class="date-picker-header">
                                                <button type="button" onclick="changeMonth('hotel-checkin', -1)">◀</button>
                                                <span class="date-picker-month" id="hotel-checkin-month-display">December 2025</span>
                                                <button type="button" onclick="changeMonth('hotel-checkin', 1)">▶</button>
                                            </div>
                                            <div class="date-grid" id="hotel-checkin-grid"></div>
                                        </div>
                                    </div>

                                    <div class="box date" id="hotel-checkout-box">
                                        <span class="label">Check-out</span>
                                        <div class="value"><span id="hotel-checkout-day">18</span> <span id="hotel-checkout-month">Dec'25</span></div>
                                        <span class="sub-value" id="hotel-checkout-weekday">Thursday</span>
                                        
                                        <div class="date-picker" id="hotel-checkout-picker">
                                            <div class="date-picker-header">
                                                <button type="button" onclick="changeMonth('hotel-checkout', -1)">◀</button>
                                                <span class="date-picker-month" id="hotel-checkout-month-display">December 2025</span>
                                                <button type="button" onclick="changeMonth('hotel-checkout', 1)">▶</button>
                                            </div>
                                            <div class="date-grid" id="hotel-checkout-grid"></div>
                                        </div>
                                    </div>

                                    <div class="box traveler" id="hotel-guests-box">
                                        <span class="label">Guests & Rooms</span>
                                        <div class="value"><span id="hotel-guests-count">2</span> Guests, <span id="hotel-rooms-count">1</span> Room</div>
                                        <span class="sub-value">2 Adults</span>

                                        <div class="traveler-modal" id="hotel-guests-modal">
                                            <div class="traveler-row">
                                                <div>
                                                    <div class="traveler-label">Rooms</div>
                                                </div>
                                                <div class="traveler-controls">
                                                    <button type="button" class="qty-btn" onclick="changeHotelQty('rooms', -1)">−</button>
                                                    <span class="qty-value" id="hotel-rooms">1</span>
                                                    <button type="button" class="qty-btn" onclick="changeHotelQty('rooms', 1)">+</button>
                                                </div>
                                            </div>
                                            <div class="traveler-row">
                                                <div>
                                                    <div class="traveler-label">Adults</div>
                                                    <div class="traveler-sublabel">12+ years</div>
                                                </div>
                                                <div class="traveler-controls">
                                                    <button type="button" class="qty-btn" onclick="changeHotelQty('adults', -1)">−</button>
                                                    <span class="qty-value" id="hotel-adults">2</span>
                                                    <button type="button" class="qty-btn" onclick="changeHotelQty('adults', 1)">+</button>
                                                </div>
                                            </div>
                                            <div class="traveler-row">
                                                <div>
                                                    <div class="traveler-label">Children</div>
                                                    <div class="traveler-sublabel">0-11 years</div>
                                                </div>
                                                <div class="traveler-controls">
                                                    <button type="button" class="qty-btn" onclick="changeHotelQty('children', -1)">−</button>
                                                    <span class="qty-value" id="hotel-children">0</span>
                                                    <button type="button" class="qty-btn" onclick="changeHotelQty('children', 1)">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-btn-container">
                                <button type="button" class="search-btn">Search Hotels</button>
                            </div>
                        </div>

                        <!-- Tour Tab Content -->
                        <div class="tab-content" id="tour-content">
                            <div class="flight">
                                <div class="flight-search bar">
                                    <div class="box location" id="tour-destination-box">
                                        <span class="label">Destination</span>
                                        <div class="value" id="tour-destination-value">Where to go?</div>
                                        <span class="sub-value" id="tour-destination-sub"></span>
                                        
                                        <div class="airport-suggestion" id="tour-destination-dropdown">
                                            <div class="input-wrapper">
                                                <input type="text" placeholder="Type destination" id="tour-destination-search">
                                                <span class="close-btn" onclick="closeDropdown('tour-destination')">×</span>
                                            </div>
                                            <div class="airport-list">
                                                <div class="airport-item" onclick="selectTourDestination('Sundarbans', 'Mangrove Forest Tour')">
                                                    <div class="airport-name">Sundarbans</div>
                                                    <div class="airport-code">Mangrove Forest Tour</div>
                                                </div>
                                                <div class="airport-item" onclick="selectTourDestination('Cox\'s Bazar', 'Beach & Sea Tour')">
                                                    <div class="airport-name">Cox's Bazar</div>
                                                    <div class="airport-code">Beach & Sea Tour</div>
                                                </div>
                                                <div class="airport-item" onclick="selectTourDestination('Sajek Valley', 'Hill Track Adventure')">
                                                    <div class="airport-name">Sajek Valley</div>
                                                    <div class="airport-code">Hill Track Adventure</div>
                                                </div>
                                                <div class="airport-item" onclick="selectTourDestination('Saint Martin', 'Island Exploration')">
                                                    <div class="airport-name">Saint Martin</div>
                                                    <div class="airport-code">Island Exploration</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-btn-container">
                                <button type="button" class="search-btn">Search Tours</button>
                            </div>
                        </div>

                        <!-- Visa Tab Content -->
                        <div class="tab-content" id="visa-content">
                            <div class="flight">
                                <div class="flight-search bar">
                                    <div class="box location" id="visa-country-box">
                                        <span class="label">Destination Country</span>
                                        <div class="value" id="visa-country-value">Select country</div>
                                        <span class="sub-value" id="visa-country-sub"></span>
                                        
                                        <div class="airport-suggestion" id="visa-country-dropdown">
                                            <div class="input-wrapper">
                                                <input type="text" placeholder="Type country name" id="visa-country-search">
                                                <span class="close-btn" onclick="closeDropdown('visa-country')">×</span>
                                            </div>
                                            <div class="airport-list">
                                                <div class="airport-item" onclick="selectVisaCountry('United States', 'USA')">
                                                    <div class="airport-name">United States</div>
                                                    <div class="airport-code">USA</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaCountry('United Kingdom', 'UK')">
                                                    <div class="airport-name">United Kingdom</div>
                                                    <div class="airport-code">UK</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaCountry('Canada', 'CAN')">
                                                    <div class="airport-name">Canada</div>
                                                    <div class="airport-code">CAN</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaCountry('Australia', 'AUS')">
                                                    <div class="airport-name">Australia</div>
                                                    <div class="airport-code">AUS</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaCountry('Dubai', 'UAE')">
                                                    <div class="airport-name">Dubai</div>
                                                    <div class="airport-code">UAE</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaCountry('Malaysia', 'MYS')">
                                                    <div class="airport-name">Malaysia</div>
                                                    <div class="airport-code">MYS</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box location" id="visa-type-box">
                                        <span class="label">Visa Type</span>
                                        <div class="value" id="visa-type-value">Tourist Visa</div>
                                        <span class="sub-value" id="visa-type-sub">Short term visit</span>
                                        
                                        <div class="airport-suggestion" id="visa-type-dropdown">
                                            <div class="input-wrapper">
                                                <input type="text" placeholder="Select visa type" id="visa-type-search">
                                                <span class="close-btn" onclick="closeDropdown('visa-type')">×</span>
                                            </div>
                                            <div class="airport-list">
                                                <div class="airport-item" onclick="selectVisaType('Tourist Visa', 'Short term visit')">
                                                    <div class="airport-name">Tourist Visa</div>
                                                    <div class="airport-code">Short term visit</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaType('Business Visa', 'Business purpose')">
                                                    <div class="airport-name">Business Visa</div>
                                                    <div class="airport-code">Business purpose</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaType('Student Visa', 'Study abroad')">
                                                    <div class="airport-name">Student Visa</div>
                                                    <div class="airport-code">Study abroad</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaType('Work Visa', 'Employment')">
                                                    <div class="airport-name">Work Visa</div>
                                                    <div class="airport-code">Employment</div>
                                                </div>
                                                <div class="airport-item" onclick="selectVisaType('Transit Visa', 'Airport transit')">
                                                    <div class="airport-name">Transit Visa</div>
                                                    <div class="airport-code">Airport transit</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-btn-container">
                                <button type="button" class="search-btn">Check Visa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Flight Results Modal -->
<div class="flight-results-modal" id="flight-results-modal">
    <div class="flight-results-container">
        <div class="flight-results-header">
            <h2>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="vertical-align: middle;">
                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                </svg>
                Flight Search Results
            </h2>
            <button type="button" class="close-results-btn" onclick="closeFlightResults()">×</button>
            
            <div class="results-summary">
                <div class="summary-item" id="results-route">DAC → CXB</div>
                <div class="summary-item" id="results-date">Dec 16, 2025</div>
                <div class="summary-item" id="results-travelers">1 Traveler, Economy</div>
                <div class="summary-item" id="results-type">One Way</div>
                <div class="summary-item" id="results-count">0 flights found</div>
            </div>
        </div>
        
        <div class="flight-results-body">
            <div class="results-filters" id="results-filters">
                <button type="button" class="filter-btn active" onclick="sortFlights('price')">Cheapest</button>
                <button type="button" class="filter-btn" onclick="sortFlights('duration')">Shortest</button>
                <button type="button" class="filter-btn" onclick="sortFlights('departure')">Earliest</button>
                <button type="button" class="filter-btn" onclick="sortFlights('airline')">Airline</button>
            </div>
            
            <div id="loading-spinner" class="loading-spinner" style="display: none;">
                <div class="spinner"></div>
                <p>Searching for flights...</p>
            </div>
            
            <div id="flight-results-list">
                <!-- Flight results will be loaded here -->
            </div>
            
            <div id="no-results" class="no-results" style="display: none;">
                <div class="no-results-icon">✈️</div>
                <h3>No flights found</h3>
                <p>Try adjusting your search criteria or dates.</p>
                <button type="button" class="select-flight-btn" onclick="closeFlightResults()" style="margin-top: 20px;">Search Again</button>
            </div>
            
            <div id="error-message" class="error-message" style="display: none;"></div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    // CSRF Token for Laravel
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    // Airport search from Amadeus API
    async function searchAirports(query, type) {
        if (query.length < 2) return;
        
        try {
            const response = await fetch(`/api/flights/airport-suggestions?query=${encodeURIComponent(query)}`);
            const data = await response.json();
            
            if (data.success && data.data.length > 0) {
                const airportList = document.getElementById(`${type}-airport-list`);
                airportList.innerHTML = data.data.map(airport => `
                    <div class="airport-item" onclick="selectAirportFromAPI('${type}', '${airport.iataCode}', '${airport.name}', '${airport.city}, ${airport.country}')">
                        <div class="airport-name">${airport.name}</div>
                        <div class="airport-code">${airport.iataCode} • ${airport.city}, ${airport.country}</div>
                    </div>
                `).join('');
            }
        } catch (error) {
            console.error('Airport search error:', error);
        }
    }

    // Select airport from API results
    function selectAirportFromAPI(type, iataCode, name, location) {
        document.getElementById(`${type}-value`).textContent = name;
        document.getElementById(`${type}-subvalue`).textContent = iataCode + ', ' + location;
        closeDropdown(type);
    }

    // Update original selectAirport function
    function selectAirport(type, city, code) {
        document.getElementById(type + '-value').textContent = city;
        document.getElementById(type + '-subvalue').textContent = code;
        closeDropdown(type);
    }

    // Format date for API
    function formatDateForAPI(day, monthYear) {
        const month = monthYear.substring(0, 3);
        const year = '20' + monthYear.substring(4, 6);
        
        const monthMap = {
            'Jan': '01', 'Feb': '02', 'Mar': '03', 'Apr': '04',
            'May': '05', 'Jun': '06', 'Jul': '07', 'Aug': '08',
            'Sep': '09', 'Oct': '10', 'Nov': '11', 'Dec': '12'
        };
        
        return `${year}-${monthMap[month]}-${day.padStart(2, '0')}`;
    }

    // Get travel class mapping
    function getTravelClass() {
        const classDisplay = document.getElementById('class-display').textContent;
        const classMap = {
            'Economy': 'ECONOMY',
            'Premium Economy': 'PREMIUM_ECONOMY',
            'Business': 'BUSINESS',
            'First': 'FIRST'
        };
        return classMap[classDisplay] || 'ECONOMY';
    }

    // Search flights function

    async function searchFlights() {
        const searchBtn = document.getElementById('search-flights-btn');
        
        // Get IATA codes from the subvalue (should be first 3 characters)
        const fromSub = document.getElementById('from-subvalue').textContent;
        const toSub = document.getElementById('to-subvalue').textContent;
        
        // Extract IATA codes - they should be the first 3 characters before comma
        const origin = fromSub.split(',')[0].trim();
        const destination = toSub.split(',')[0].trim();
        
        // Validate IATA codes
        if (!origin || origin.length !== 3) {
            alert('Please select a valid origin airport. Click on the "From" field and select an airport from the list.');
            return;
        }
        
        if (!destination || destination.length !== 3) {
            alert('Please select a valid destination airport. Click on the "To" field and select an airport from the list.');
            return;
        }
        
        const departureDate = formatDateForAPI(
            document.getElementById('depart-day').textContent,
            document.getElementById('depart-month').textContent
        );
        
        // Get flight type
        const flightType = document.querySelector('input[name="flight-type"]:checked').value;
        let returnDate = null;
        
        if (flightType === 'ROUND_WAY') {
            const returnBox = document.getElementById('return-box');
            const returnDay = returnBox.querySelector('.value span');
            if (returnDay && returnDay.textContent) {
                returnDate = formatDateForAPI(
                    returnDay.textContent,
                    returnBox.querySelector('.value span:nth-child(2)').textContent
                );
            }
        }
        
        const adults = parseInt(document.getElementById('adults-count').textContent);
        const children = parseInt(document.getElementById('children-count').textContent);
        const infants = parseInt(document.getElementById('infants-count').textContent);
        const travelClass = getTravelClass();
        
        // Show loading and disable button
        const originalText = searchBtn.innerHTML;
        searchBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Searching...';
        searchBtn.disabled = true;
        
        // Prepare search data - FIXED: non_stop should be boolean, not 0/1
        const searchData = {
            origin: origin,
            destination: destination,
            departure_date: departureDate,
            adults: adults,
            travel_class: travelClass,
            non_stop: false, // Boolean, not integer
            max: 20 // Reduced for testing
        };
        
        // Only add these if > 0
        if (children > 0) searchData.children = children;
        if (infants > 0) searchData.infants = infants;
        
        if (returnDate) {
            searchData.return_date = returnDate;
        }
        
        console.log('Search Data:', searchData); // For debugging
        
        try {
            // Show results modal
            showFlightResultsModal();
            
            // Update summary
            updateResultsSummary(searchData);
            
            // Make API call
            const response = await fetch('/api/flights/search', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(searchData)
            });
            
            const data = await response.json();
            
            if (data.success) {
                displayFlightResults(data.data);
            } else {
                showError(data.error || 'Failed to search flights');
            }
        } catch (error) {
            console.error('Search error:', error);
            showError('Network error. Please try again.');
        } finally {
            // Reset button
            searchBtn.innerHTML = originalText;
            searchBtn.disabled = false;
        }
    }

    // Show flight results modal
    function showFlightResultsModal() {
        const modal = document.getElementById('flight-results-modal');
        const loading = document.getElementById('loading-spinner');
        const results = document.getElementById('flight-results-list');
        const noResults = document.getElementById('no-results');
        const error = document.getElementById('error-message');
        
        modal.classList.add('active');
        loading.style.display = 'block';
        results.innerHTML = '';
        noResults.style.display = 'none';
        error.style.display = 'none';
    }

    // Close flight results modal
    function closeFlightResults() {
        document.getElementById('flight-results-modal').classList.remove('active');
    }

    // Update results summary
    function updateResultsSummary(searchData) {
        const origin = searchData.origin;
        const destination = searchData.destination;
        const departureDate = new Date(searchData.departure_date);
        const flightType = searchData.return_date ? 'Round Trip' : 'One Way';
        const travelers = searchData.adults + (searchData.children || 0) + (searchData.infants || 0);
        const travelClass = searchData.travel_class;
        
        document.getElementById('results-route').textContent = `${origin} → ${destination}`;
        document.getElementById('results-date').textContent = departureDate.toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        });
        document.getElementById('results-travelers').textContent = `${travelers} Traveler${travelers > 1 ? 's' : ''}, ${travelClass}`;
        document.getElementById('results-type').textContent = flightType;
    }

    // Display flight results
    function displayFlightResults(flights) {
        const loading = document.getElementById('loading-spinner');
        const results = document.getElementById('flight-results-list');
        const noResults = document.getElementById('no-results');
        const error = document.getElementById('error-message');
        const countElement = document.getElementById('results-count');
        
        loading.style.display = 'none';
        error.style.display = 'none';
        
        if (!flights || flights.length === 0) {
            noResults.style.display = 'block';
            countElement.textContent = '0 flights found';
            return;
        }
        
        countElement.textContent = `${flights.length} flight${flights.length > 1 ? 's' : ''} found`;
        
        // Store flights for sorting
        window.flightResults = flights;
        
        // Display flights
        results.innerHTML = flights.map((flight, index) => {
            const firstSegment = flight.itineraries[0].segments[0];
            const lastSegment = flight.itineraries[0].segments[flight.itineraries[0].segments.length - 1];
            const airlineCode = firstSegment.carrierCode;
            const flightNumber = firstSegment.number;
            const price = flight.price.total;
            const currency = flight.price.currency;
            const duration = flight.itineraries[0].duration;
            const stops = flight.itineraries[0].segments.length - 1;
            
            return `
                <div class="flight-card" data-index="${index}">
                    <div class="flight-header">
                        <div class="airline-info">
                            <div class="airline-logo">${airlineCode}</div>
                            <div class="airline-details">
                                <h4>${airlineCode} Airlines</h4>
                                <div class="flight-numbers">Flight ${flightNumber}</div>
                            </div>
                        </div>
                        <div class="flight-price">
                            <span class="price-amount">${currency} ${price}</span>
                            <span class="price-label">Total per person</span>
                        </div>
                    </div>
                    
                    <div class="flight-details">
                        ${flight.itineraries.map((itinerary, i) => `
                            <div class="route-segment">
                                <div class="departure">
                                    <span class="airport-code">${itinerary.segments[0].departure.iataCode}</span>
                                    <span class="airport-time">${formatTime(itinerary.segments[0].departure.at)}</span>
                                    <span class="airport-date">${formatDate(itinerary.segments[0].departure.at)}</span>
                                </div>
                                
                                <div class="flight-duration">
                                    <div class="duration-line">
                                        <div class="duration-dot start"></div>
                                        <div class="duration-dot end"></div>
                                    </div>
                                    <div class="duration-text">${formatDuration(itinerary.duration)}</div>
                                    ${stops > 0 ? `<div class="stops-info">${stops} stop${stops > 1 ? 's' : ''}</div>` : ''}
                                </div>
                                
                                <div class="arrival">
                                    <span class="airport-code">${itinerary.segments[itinerary.segments.length - 1].arrival.iataCode}</span>
                                    <span class="airport-time">${formatTime(itinerary.segments[itinerary.segments.length - 1].arrival.at)}</span>
                                    <span class="airport-date">${formatDate(itinerary.segments[itinerary.segments.length - 1].arrival.at)}</span>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                    
                    <div class="flight-footer">
                        <div class="flight-amenities">
                            <div class="amenity">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17 6H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h10c2.76 0 5-2.24 5-5s-2.24-5-5-5zm0 8H7c-1.66 0-3-1.34-3-3s1.34-3 3-3h10c1.66 0 3 1.34 3 3s-1.34 3-3 3z"/>
                                </svg>
                                <span>Baggage included</span>
                            </div>
                            <div class="amenity">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>Seat selection</span>
                            </div>
                        </div>
                        <button type="button" class="select-flight-btn" onclick="selectFlight(${index})">
                            Select Flight
                        </button>
                    </div>
                </div>
            `;
        }).join('');
    }

    // Format time
    function formatTime(dateTime) {
        const date = new Date(dateTime);
        return date.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        });
    }

    // Format date
    function formatDate(dateTime) {
        const date = new Date(dateTime);
        return date.toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric'
        });
    }

    // Format duration
    function formatDuration(duration) {
        return duration.replace('PT', '').replace('H', 'h ').replace('M', 'm').trim();
    }

    // Show error message
    function showError(message) {
        const loading = document.getElementById('loading-spinner');
        const error = document.getElementById('error-message');
        
        loading.style.display = 'none';
        error.textContent = message;
        error.style.display = 'block';
    }

    // Sort flights
    function sortFlights(criteria) {
        // Update active filter button
        document.querySelectorAll('#results-filters .filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');
        
        if (!window.flightResults) return;
        
        const sortedFlights = [...window.flightResults];
        
        switch(criteria) {
            case 'price':
                sortedFlights.sort((a, b) => parseFloat(a.price.total) - parseFloat(b.price.total));
                break;
            case 'duration':
                sortedFlights.sort((a, b) => {
                    const durationA = parseDuration(a.itineraries[0].duration);
                    const durationB = parseDuration(b.itineraries[0].duration);
                    return durationA - durationB;
                });
                break;
            case 'departure':
                sortedFlights.sort((a, b) => {
                    const timeA = new Date(a.itineraries[0].segments[0].departure.at);
                    const timeB = new Date(b.itineraries[0].segments[0].departure.at);
                    return timeA - timeB;
                });
                break;
            case 'airline':
                sortedFlights.sort((a, b) => {
                    const airlineA = a.itineraries[0].segments[0].carrierCode;
                    const airlineB = b.itineraries[0].segments[0].carrierCode;
                    return airlineA.localeCompare(airlineB);
                });
                break;
        }
        
        displayFlightResults(sortedFlights);
    }

    // Parse duration to minutes
    function parseDuration(duration) {
        const match = duration.match(/PT(?:(\d+)H)?(?:(\d+)M)?/);
        const hours = parseInt(match[1] || 0);
        const minutes = parseInt(match[2] || 0);
        return hours * 60 + minutes;
    }

    // Select flight
    function selectFlight(index) {
        const flight = window.flightResults[index];
        alert(`Selected flight: ${flight.itineraries[0].segments[0].carrierCode} ${flight.itineraries[0].segments[0].number}\nPrice: ${flight.price.currency} ${flight.price.total}\n\nIn a real application, this would proceed to booking.`);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to search button
        document.getElementById('search-flights-btn').addEventListener('click', searchFlights);
        
        // Add airport search functionality
        document.getElementById('from-search').addEventListener('input', function(e) {
            searchAirports(e.target.value, 'from');
        });
        
        document.getElementById('to-search').addEventListener('input', function(e) {
            searchAirports(e.target.value, 'to');
        });
        
        // Initialize calendars
        generateCalendar('depart');
        generateCalendar('return');
        generateCalendar('hotel-checkin');
        generateCalendar('hotel-checkout');
        generateCalendar('tour-start');
        generateCalendar('tour-end');
        generateCalendar('visa-travel');
        
        // Set default dates to tomorrow
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        setDefaultDate('depart', tomorrow);
        
        // Set return date to 3 days after departure
        const returnDate = new Date(tomorrow);
        returnDate.setDate(returnDate.getDate() + 3);
        setDefaultDate('return', returnDate);
    });

    // Set default date
    function setDefaultDate(type, date) {
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        
        const day = date.getDate();
        const month = monthNames[date.getMonth()];
        const year = date.getFullYear().toString().slice(-2);
        const weekday = dayNames[date.getDay()];
        
        document.getElementById(type + '-day').textContent = day;
        document.getElementById(type + '-month').textContent = month + "'" + year;
        if (document.getElementById(type + '-weekday')) {
            document.getElementById(type + '-weekday').textContent = weekday;
        }
    }

    // Keep all your existing JavaScript functions (toggleDropdown, closeDropdown, swapLocations, etc.)
    // Make sure they're included below...
    
    // Tab switching
    document.querySelectorAll('.search-type-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.search-type-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            
            this.classList.add('active');
            const tabName = this.getAttribute('data-tab');
            document.getElementById(tabName + '-content').classList.add('active');
        });
    });

    // Airport dropdown
    document.getElementById('from-box').addEventListener('click', function(e) {
        if (!e.target.closest('.airport-suggestion')) {
            toggleDropdown('from');
        }
    });

    document.getElementById('to-box').addEventListener('click', function(e) {
        if (!e.target.closest('.airport-suggestion')) {
            toggleDropdown('to');
        }
    });

    function toggleDropdown(type) {
        const dropdown = document.getElementById(type + '-dropdown');
        const box = document.getElementById(type + '-box');
        
        closeAllDropdowns();
        
        dropdown.classList.add('active');
        box.classList.add('active');
    }

    function closeDropdown(type) {
        const dropdown = document.getElementById(type + '-dropdown');
        const box = document.getElementById(type + '-box');
        dropdown.classList.remove('active');
        box.classList.remove('active');
    }

    // Swap locations
    function swapLocations() {
        const fromValue = document.getElementById('from-value').textContent;
        const fromSub = document.getElementById('from-subvalue').textContent;
        const toValue = document.getElementById('to-value').textContent;
        const toSub = document.getElementById('to-subvalue').textContent;
        
        document.getElementById('from-value').textContent = toValue;
        document.getElementById('from-subvalue').textContent = toSub;
        document.getElementById('to-value').textContent = fromValue;
        document.getElementById('to-subvalue').textContent = fromSub;
    }

    // Date picker
    let currentMonth = { 
        depart: new Date(), 
        return: new Date(),
        'hotel-checkin': new Date(),
        'hotel-checkout': new Date(),
        'tour-start': new Date(),
        'tour-end': new Date(),
        'visa-travel': new Date()
    };

    // Initialize current month to current date
    Object.keys(currentMonth).forEach(key => {
        currentMonth[key] = new Date();
    });

    document.getElementById('depart-box').addEventListener('click', function(e) {
        if (!e.target.closest('.date-picker')) {
            toggleDatePicker('depart');
        }
    });

    document.getElementById('return-box').addEventListener('click', function(e) {
        if (!e.target.closest('.date-picker')) {
            toggleDatePicker('return');
        }
    });

    function toggleDatePicker(type) {
        const picker = document.getElementById(type + '-picker');
        const box = document.getElementById(type + '-box');
        
        closeAllDropdowns();
        
        picker.classList.add('active');
        box.classList.add('active');
        generateCalendar(type);
    }

    function generateCalendar(type) {
        const grid = document.getElementById(type + '-grid');
        const monthDisplay = document.getElementById(type + '-month-display');
        const date = currentMonth[type];
        
        const month = date.getMonth();
        const year = date.getFullYear();
        
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'];
        
        monthDisplay.textContent = monthNames[month] + ' ' + year;
        
        grid.innerHTML = '';
        
        // Day names
        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        dayNames.forEach(day => {
            const dayEl = document.createElement('div');
            dayEl.className = 'date-day-name';
            dayEl.textContent = day;
            grid.appendChild(dayEl);
        });
        
        // First day of month
        const firstDay = new Date(year, month, 1).getDay();
        
        // Empty cells
        for (let i = 0; i < firstDay; i++) {
            const empty = document.createElement('div');
            grid.appendChild(empty);
        }
        
        // Days
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        for (let day = 1; day <= daysInMonth; day++) {
            const dayEl = document.createElement('div');
            const currentDate = new Date(year, month, day);
            
            dayEl.className = 'date-day';
            dayEl.textContent = day;
            
            // Disable past dates
            if (currentDate < today) {
                dayEl.classList.add('disabled');
            } else {
                dayEl.onclick = () => selectDate(type, day, month, year);
            }
            
            grid.appendChild(dayEl);
        }
    }

    function changeMonth(type, delta) {
        currentMonth[type].setMonth(currentMonth[type].getMonth() + delta);
        generateCalendar(type);
    }

    function selectDate(type, day, month, year) {
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        
        const date = new Date(year, month, day);
        const weekday = dayNames[date.getDay()];
        
        document.getElementById(type + '-day').textContent = day;
        document.getElementById(type + '-month').textContent = monthNames[month] + "'" + year.toString().slice(-2);
        if (document.getElementById(type + '-weekday')) {
            document.getElementById(type + '-weekday').textContent = weekday;
        }
        
        closeDatePicker(type);
    }

    function closeDatePicker(type) {
        const picker = document.getElementById(type + '-picker');
        const box = document.getElementById(type + '-box');
        picker.classList.remove('active');
        box.classList.remove('active');
    }

    // Traveler modal
    document.getElementById('traveler-box').addEventListener('click', function(e) {
        if (!e.target.closest('.traveler-modal')) {
            toggleTravelerModal();
        }
    });

    function toggleTravelerModal() {
        const modal = document.getElementById('traveler-modal');
        const box = document.getElementById('traveler-box');
        
        closeAllDropdowns();
        
        modal.classList.toggle('active');
        box.classList.toggle('active');
    }

    // Change quantity
    function changeQty(type, change) {
        const countEl = document.getElementById(type + '-count');
        let value = parseInt(countEl.textContent);
        value = Math.max(0, value + change);
        
        if (type === 'adults') {
            value = Math.max(1, value);
        }
        
        countEl.textContent = value;
        updateTravelerDisplay();
    }

    function updateTravelerDisplay() {
        const adults = parseInt(document.getElementById('adults-count').textContent);
        const children = parseInt(document.getElementById('children-count').textContent);
        const infants = parseInt(document.getElementById('infants-count').textContent);
        const total = adults + children + infants;
        
        document.getElementById('traveler-count').textContent = total;
    }

    // Select class
    function selectClass(className, element) {
        document.querySelectorAll('.class-option').forEach(opt => opt.classList.remove('active'));
        element.classList.add('active');
        document.getElementById('class-display').textContent = className;
    }

    // Close all dropdowns
    function closeAllDropdowns() {
        document.querySelectorAll('.airport-suggestion, .date-picker, .traveler-modal').forEach(el => {
            el.classList.remove('active');
        });
        document.querySelectorAll('.box').forEach(box => {
            box.classList.remove('active');
        });
    }

    // Click outside to close
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.box')) {
            closeAllDropdowns();
        }
    });

    // Hotel Tab Functions
    document.getElementById('hotel-destination-box')?.addEventListener('click', function(e) {
        if (!e.target.closest('.airport-suggestion')) {
            toggleDropdown('hotel-destination');
        }
    });

    document.getElementById('hotel-checkin-box')?.addEventListener('click', function(e) {
        if (!e.target.closest('.date-picker')) {
            toggleDatePicker('hotel-checkin');
        }
    });

    document.getElementById('hotel-checkout-box')?.addEventListener('click', function(e) {
        if (!e.target.closest('.date-picker')) {
            toggleDatePicker('hotel-checkout');
        }
    });

    document.getElementById('hotel-guests-box')?.addEventListener('click', function(e) {
        if (!e.target.closest('.traveler-modal')) {
            const modal = document.getElementById('hotel-guests-modal');
            const box = document.getElementById('hotel-guests-box');
            closeAllDropdowns();
            modal.classList.toggle('active');
            box.classList.toggle('active');
        }
    });

    function selectHotelDestination(city, country) {
        document.getElementById('hotel-destination-value').textContent = city;
        document.getElementById('hotel-destination-sub').textContent = country;
        closeDropdown('hotel-destination');
    }

    function changeHotelQty(type, change) {
        const countEl = document.getElementById('hotel-' + type);
        let value = parseInt(countEl.textContent);
        value = Math.max(type === 'adults' ? 1 : 0, value + change);
        if (type === 'rooms') value = Math.max(1, value);
        
        countEl.textContent = value;
        
        const adults = parseInt(document.getElementById('hotel-adults').textContent);
        const children = parseInt(document.getElementById('hotel-children').textContent);
        const rooms = parseInt(document.getElementById('hotel-rooms').textContent);
        const total = adults + children;
        
        document.getElementById('hotel-guests-count').textContent = total;
        document.getElementById('hotel-rooms-count').textContent = rooms;
    }

    // Tour Tab Functions
    document.getElementById('tour-destination-box')?.addEventListener('click', function(e) {
        if (!e.target.closest('.airport-suggestion')) {
            toggleDropdown('tour-destination');
        }
    });

    function selectTourDestination(place, type) {
        document.getElementById('tour-destination-value').textContent = place;
        document.getElementById('tour-destination-sub').textContent = type;
        closeDropdown('tour-destination');
    }

    // Visa Tab Functions
    document.getElementById('visa-country-box')?.addEventListener('click', function(e) {
        if (!e.target.closest('.airport-suggestion')) {
            toggleDropdown('visa-country');
        }
    });

    document.getElementById('visa-type-box')?.addEventListener('click', function(e) {
        if (!e.target.closest('.airport-suggestion')) {
            toggleDropdown('visa-type');
        }
    });

    function selectVisaCountry(country, code) {
        document.getElementById('visa-country-value').textContent = country;
        document.getElementById('visa-country-sub').textContent = code;
        closeDropdown('visa-country');
    }

    function selectVisaType(type, desc) {
        document.getElementById('visa-type-value').textContent = type;
        document.getElementById('visa-type-sub').textContent = desc;
        closeDropdown('visa-type');
    }
</script>