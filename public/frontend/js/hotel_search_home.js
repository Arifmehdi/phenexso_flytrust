    // CLICK OUTSIDE TO CLOSE
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.box')) {
            closeAllDropdowns();
        }
    });

    // HOTEL TAB FUNCTIONS
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

    function searchHotels() {
        // Get destination
        const destination = document.getElementById('hotel-destination-value').textContent;
        if (destination === 'Enter city or property') {
            alert('Please select a destination');
            return;
        }
        
        // Get dates from UI
        const checkInDay = document.getElementById('hotel-checkin-day').textContent.trim();
        const checkInMonthFull = document.getElementById('hotel-checkin-month').textContent.trim();
        const checkOutDay = document.getElementById('hotel-checkout-day').textContent.trim();
        const checkOutMonthFull = document.getElementById('hotel-checkout-month').textContent.trim();
        
        // Helper to format UI date components to DD/MM/YYYY
        const formatToUIDate = (day, monthYear) => {
            const monthStr = monthYear.substring(0, 3);
            const year = monthYear.includes("'") ? 
                '20' + monthYear.substring(monthYear.indexOf("'") + 1, monthYear.indexOf("'") + 3) : 
                new Date().getFullYear();
            
            const monthMap = {
                'Jan': '01', 'Feb': '02', 'Mar': '03', 'Apr': '04',
                'May': '05', 'Jun': '06', 'Jul': '07', 'Aug': '08',
                'Sep': '09', 'Oct': '10', 'Nov': '11', 'Dec': '12'
            };
            
            const dayFormatted = day.padStart(2, '0');
            const monthFormatted = monthMap[monthStr] || '01';
            
            return `${dayFormatted}/${monthFormatted}/${year}`;
        };

        const checkInStr = formatToUIDate(checkInDay, checkInMonthFull);
        const checkOutStr = formatToUIDate(checkOutDay, checkOutMonthFull);
        const daterange = `${checkInStr} - ${checkOutStr}`;
        
        // Get guests and rooms
        const adults = document.getElementById('hotel-adults').textContent;
        const rooms = document.getElementById('hotel-rooms').textContent;
        
        // Build URL
        const url = new URL('/hotel', window.location.origin);
        url.searchParams.append('destination', destination);
        url.searchParams.append('daterange', daterange);
        url.searchParams.append('adults', adults);
        url.searchParams.append('rooms', rooms);
        
        // Redirect
        window.location.href = url.toString();
    }

    // TOUR TAB FUNCTIONS
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

    // VISA TAB FUNCTIONS
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