@extends('website.layouts.master')

@section('title', 'Hotel - '.env('APP_NAME'))

@section('meta')
<meta name="description"
    content="Find the best hotels at competitive prices. Search and book your perfect stay.">
<meta name="keywords" content="hotels, booking, travel, accommodation">
<meta property="og:title" content="Hotels - {{ env('APP_NAME') }}">
<meta property="og:type" content="website">
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')
    <x-breadcrumb slug="Hotel" image="bread-bg-7"/>

    <section class="card-area section--padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="filter-wrap margin-bottom-30px">
              <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                <div>
                  <h3 class="title font-size-24">{{ $hotels->total() }} Hotels found</h3>
                  <p class="font-size-14">
                    <span class="me-1 pt-1">Book with confidence:</span>No hotel booking fees
                  </p>
                </div>
              </div>
              <div class="filter-bar d-flex align-items-center justify-content-between">
                <div class="filter-bar-filter d-flex flex-wrap align-items-center">
                  <div class="filter-option">
                    <h3 class="title font-size-16">Filter by:</h3>
                  </div>
                  <div class="filter-option">
                    <div class="dropdown dropdown-contain">
                      <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        Filter Price
                      </a>
                      <div class="dropdown-menu dropdown-menu-wrap">
                        <div class="dropdown-item">
                          <div class="slider-range-wrap">
                            <div class="price-slider-amount padding-bottom-20px">
                              <label for="amount" class="filter__label">Price:</label>
                              <input type="text" id="amount" class="amounts" readonly style="border:0; color:#f6931f; font-weight:bold;">
                              <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                              <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', 1000) }}">
                            </div>
                            <div id="slider-range"></div>
                          </div>
                          <div class="btn-box pt-4">
                            <button class="theme-btn theme-btn-small theme-btn-transparent" type="button" onclick="applyFilters()">Apply</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="select-contain select2-container-wrapper">
                  <select class="select-contain-select" id="sort_by" onchange="applyFilters()">
                    <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Sort by default</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: low to high</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: high to low</option>
                    <option value="star_desc" {{ request('sort') == 'star_desc' ? 'selected' : '' }}>Star Rating: High to Low</option>
                    <option value="star_asc" {{ request('sort') == 'star_asc' ? 'selected' : '' }}>Star Rating: Low to High</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="sidebar mt-0">
              <div class="sidebar-widget">
                <h3 class="title stroke-shape">Search Hotels</h3>
                <div class="sidebar-widget-item">
                  <div class="contact-form-action">
                    <form action="{{ route('hotel') }}" method="GET" id="filterForm">
                      <input type="hidden" name="min_price" id="form_min_price" value="{{ request('min_price', 0) }}">
                      <input type="hidden" name="max_price" id="form_max_price" value="{{ request('max_price', 2000) }}">
                      <input type="hidden" name="sort" id="hidden_sort" value="{{ request('sort', 'default') }}">

                      <div class="input-box">
                        <label class="label-text">Destination / hotel name</label>
                        <div class="form-group">
                          <span class="la la-map-marker form-icon"></span>
                          <input class="form-control" type="text" name="destination" placeholder="Destination, hotel name" value="{{ request('destination') }}">
                        </div>
                      </div>
                      <div class="input-box">
                        <label class="label-text">Check in - Check out</label>
                        <div class="form-group">
                          <span class="la la-calendar form-icon"></span>
                          <input class="date-range form-control" type="text" name="daterange" value="{{ request('daterange') }}">
                        </div>
                      </div>
                      
                      <!-- <div class="sidebar-widget-item">
                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                          <label class="font-size-16">Rooms</label>
                          <div class="qtyBtn d-flex align-items-center">
                            <input type="number" name="rooms" value="{{ request('rooms', 1) }}" min="1" class="form-control" style="width: 60px; text-align: center;">
                          </div>
                        </div>
                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                          <label class="font-size-16">Adults</label>
                          <div class="qtyBtn d-flex align-items-center">
                            <input type="number" name="adults" value="{{ request('adults', 2) }}" min="1" class="form-control" style="width: 60px; text-align: center;">
                          </div>
                        </div>
                      </div> -->

                      <div class="btn-box pt-2">
                        <button type="submit" class="theme-btn w-100">Search Now</button>
                      </div>

                      <hr class="mt-4 mb-4">
                      
                      <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Country</h3>
                        <div class="sidebar-category">
                          @if($countries && $countries->count() > 0)
                            <select class="form-control" name="country" onchange="this.form.submit()">
                              <option value="">All Countries</option>
                              @foreach($countries as $country)
                                <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                                  {{ $country }}
                                </option>
                              @endforeach
                            </select>
                          @else
                            <p class="text-muted">No countries saved yet.</p>
                          @endif
                        </div>
                      </div>

                      <!-- Sort By Sidebar -->
                      <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Sort Results</h3>
                        <div class="sidebar-category">
                          <div class="custom-radio">
                            <input type="radio" name="sort_radio" id="sort_def" value="default" {{ request('sort', 'default') == 'default' ? 'checked' : '' }} onchange="syncSortSidebar(this.value)">
                            <label for="sort_def" class="ms-2">Default</label>
                          </div>
                          <div class="custom-radio">
                            <input type="radio" name="sort_radio" id="sort_pa" value="price_asc" {{ request('sort') == 'price_asc' ? 'checked' : '' }} onchange="syncSortSidebar(this.value)">
                            <label for="sort_pa" class="ms-2">Price: Low to High</label>
                          </div>
                          <div class="custom-radio">
                            <input type="radio" name="sort_radio" id="sort_pd" value="price_desc" {{ request('sort') == 'price_desc' ? 'checked' : '' }} onchange="syncSortSidebar(this.value)">
                            <label for="sort_pd" class="ms-2">Price: High to Low</label>
                          </div>
                          <div class="custom-radio">
                            <input type="radio" name="sort_radio" id="sort_sd" value="star_desc" {{ request('sort') == 'star_desc' ? 'checked' : '' }} onchange="syncSortSidebar(this.value)">
                            <label for="sort_sd" class="ms-2">Star Rating: High to Low</label>
                          </div>
                          <div class="custom-radio">
                            <input type="radio" name="sort_radio" id="sort_sa" value="star_asc" {{ request('sort') == 'star_asc' ? 'checked' : '' }} onchange="syncSortSidebar(this.value)">
                            <label for="sort_sa" class="ms-2">Star Rating: Low to High</label>
                          </div>
                        </div>
                      </div>

                      <hr class="mt-4 mb-4">

                      <!-- Filter by Price -->
                      <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Filter by Price</h3>
                        <div class="sidebar-price-range">
                          <div class="main-search-input-item">
                            <div class="price-slider-amount padding-bottom-20px">
                              <label for="amount2" class="filter__label">Price:</label>
                              <input type="text" id="amount2" class="amounts" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            </div>
                            <div id="slider-range2"></div>
                          </div>
                          <div class="btn-box pt-4">
                            <button class="theme-btn theme-btn-small theme-btn-transparent" type="button" onclick="applyFilters()">Apply</button>
                          </div>
                        </div>
                      </div>


                      <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Filter by Rating</h3>
                        <div class="sidebar-review">
                          @foreach(range(5, 1) as $star)
                          <div class="custom-checkbox">
                            <input type="checkbox" class="form-check-input" id="star{{ $star }}" name="stars[]" value="{{ $star }}" {{ in_array($star, request('stars', [])) ? 'checked' : '' }} onchange="this.form.submit()">
                            <label for="star{{ $star }}">
                              <span class="ratings d-flex align-items-center">
                                @for($i = 0; $i < $star; $i++) <i class="la la-star"></i> @endfor
                                @for($i = $star; $i < 5; $i++) <i class="la la-star-o"></i> @endfor
                              </span>
                            </label>
                          </div>
                          @endforeach
                        </div>
                      </div>

                      <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Review Score</h3>
                        <div class="sidebar-category">
                          <div class="custom-checkbox">
                            <input type="checkbox" class="form-check-input" id="r_exc" name="review_score[]" value="9" {{ in_array(9, request('review_score', [])) ? 'checked' : '' }} onchange="this.form.submit()">
                            <label for="r_exc">Excellent (9+)</label>
                          </div>
                          <div class="custom-checkbox">
                            <input type="checkbox" class="form-check-input" id="r_vg" name="review_score[]" value="8" {{ in_array(8, request('review_score', [])) ? 'checked' : '' }} onchange="this.form.submit()">
                            <label for="r_vg">Very Good (8+)</label>
                          </div>
                          <div class="custom-checkbox">
                            <input type="checkbox" class="form-check-input" id="r_g" name="review_score[]" value="7" {{ in_array(7, request('review_score', [])) ? 'checked' : '' }} onchange="this.form.submit()">
                            <label for="r_g">Good (7+)</label>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            @forelse($hotels as $hotel)
            <div class="card-item card-item-list">
              <div class="card-img">
                <a href="#" class="d-block">
                  @if($hotel->agoda_data && isset($hotel->agoda_data['imageURL']))
                    <img src="{{ $hotel->agoda_data['imageURL'] }}" alt="{{ $hotel->title }}">
                  @elseif($hotel->mainImage)
                    <img src="{{ asset('storage/' . $hotel->mainImage->file_path) }}" alt="{{ $hotel->title }}">
                  @else
                    <img src="{{ asset('frontend/images/img1.jpg') }}" alt="hotel-img">
                  @endif
                </a>
                @if($hotel->is_featured)
                  <span class="badge">Featured</span>
                @endif
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="#">{{ $hotel->title }}</a>
                </h3>
                @php
                    $hotelLatitude = data_get($hotel->agoda_data, 'latitude', $hotel->map_lat);
                    $hotelLongitude = data_get($hotel->agoda_data, 'longitude', $hotel->map_lng);
                    $displayAddress = trim($hotel->address . ($hotel->location ? ', ' . $hotel->location->name : ''));
                    if (empty($displayAddress) && $hotelLatitude && $hotelLongitude) {
                        $displayAddress = "Location: $hotelLatitude, $hotelLongitude";
                    }
                @endphp
                <p class="card-meta hotel-address"
                   data-lat="{{ $hotelLatitude }}"
                   data-lng="{{ $hotelLongitude }}"
                   data-address="{{ $displayAddress }}">
                    <i class="la la-map-marker me-2" style="color: #2563eb;"></i>
                    {{ $displayAddress ?: 'Address not available' }}
                </p>
                @if($hotelLatitude && $hotelLongitude)
                <p class="card-meta" style="font-size: 12px; color: #6b7280; margin-top: 4px;">
                    <i class="la la-location-arrow me-1"></i>
                    {{ number_format($hotelLatitude, 4) }}, {{ number_format($hotelLongitude, 4) }}
                    <a href="https://www.google.com/maps/search/?api=1&query={{ $hotelLatitude }},{{ $hotelLongitude }}" 
                       target="_blank" 
                       class="btn-text text-primary ms-2" 
                       style="font-size: 12px; text-decoration: none;">
                        <i class="la la-map-o"></i> View on Map
                    </a>
                </p>
                @endif
                <div class="card-rating">
                  <span class="badge text-white">{{ $hotel->star_rate }}/5</span>
                  <span class="review__text">Rating</span>
                </div>
                <div class="card-price d-flex align-items-center justify-content-between">
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">${{ number_format($hotel->price, 2) }}</span>
                    <span class="price__text">Per night</span>
                  </p>
                  @if($hotel->agoda_data && isset($hotel->agoda_data['landingURL']))
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn-text me-3" onclick="showHotelDetail({{ json_encode($hotel->agoda_data) }}, '{{ addslashes($hotel->title) }}', '{{ addslashes($displayAddress) }}', {{ $hotelLatitude ?: 'null' }}, {{ $hotelLongitude ?: 'null' }})">More Details<i class="la la-angle-right"></i></button>
                        <a href="{{ $hotel->agoda_data['landingURL'] }}" target="_blank" class="theme-btn theme-btn-small">Book on Agoda</a>
                    </div>
                  @else
                    <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                  @endif
                </div>
              </div>
            </div>
            @empty
            @if(request('country'))
                <div class="alert alert-warning">
                    No hotels found in <strong>{{ request('country') }}</strong>. Try selecting a different country or removing the filter.
                </div>
            @else
                <div class="alert alert-info">No hotels found matching your criteria.</div>
            @endif
            @endforelse

            <!-- Hotel Detail Modal -->
            <div class="modal fade" id="hotelDetailModal" tabindex="-1" aria-labelledby="hotelDetailModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hotelDetailModalLabel">Hotel Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="hotel-detail-content">
                    <!-- Dynamic content here -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="theme-btn theme-btn-small" data-dismiss="modal">Close</button>
                    <a href="#" id="modal-book-btn" target="_blank" class="theme-btn theme-btn-small">Book Now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="btn-box mt-3 text-center">
                  {{ $hotels->appends(request()->query())->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@push('js')
<script>
// Global scope functions
function applyFilters() {
    var sortSelect = document.getElementById('sort_by');
    if (sortSelect) {
        document.getElementById('hidden_sort').value = sortSelect.value;
    }
    document.getElementById('filterForm').submit();
}

function syncSortSidebar(value) {
    var sortSelect = document.getElementById('sort_by');
    if (sortSelect) {
        sortSelect.value = value;
    }
    document.getElementById('hidden_sort').value = value;
    document.getElementById('filterForm').submit();
}

// Reverse geocode coordinates to a human-friendly address (OpenStreetMap Nominatim)
async function getLocationFromCoordinates(lat, lon) {
    if (!lat || !lon) {
        return null;
    }

    try {
        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`);
        if (!response.ok) {
            return null;
        }

        const data = await response.json();
        if (data && data.address) {
            const city = data.address.city || data.address.town || data.address.village || data.address.suburb || data.address.county || '';
            const country = data.address.country || '';
            return {
                name: city || 'Unknown location',
                fullAddress: data.display_name || '',
                city,
                country,
                area: data.address.suburb || data.address.neighbourhood || ''
            };
        }
        return null;
    } catch (error) {
        console.error('Reverse geocoding error:', error);
        return null;
    }
}

async function showHotelDetail(data, title, address, latitude, longitude) {
    const content = document.getElementById('hotel-detail-content');
    const bookBtn = document.getElementById('modal-book-btn');
    const modalTitle = document.getElementById('hotelDetailModalLabel');

    modalTitle.textContent = title;

    let displayAddress = address || data.address || '';
    if ((!displayAddress || displayAddress.startsWith('Location:')) && latitude && longitude) {
        try {
            const location = await getLocationFromCoordinates(latitude, longitude);
            if (location && location.fullAddress) {
                displayAddress = location.fullAddress;
            } else if (location && location.name) {
                displayAddress = `${location.name}${location.area ? ', ' + location.area : ''}${location.country ? ', ' + location.country : ''}`;
            }
        } catch (err) {
            console.warn('Could not reverse geocode hotel detail address:', err);
        }
    }

    if (!displayAddress) {
        displayAddress = 'Address not available';
    }

    let html = `
        <div class="hotel-detail-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <img src="${data.imageURL || ''}" class="img-fluid rounded mb-3" alt="${title}">
                </div>
                <div class="col-md-6">
                    <h4 class="mb-2">${title}</h4>
                    <div class="ratings mb-2 text-warning">
                        ${generateStars(data.starRating)}
                    </div>
                    <p class="mb-2"><i class="la la-map-marker me-1"></i> ${displayAddress}</p>
                    ${data.latitude && data.longitude ? `
                        <p class="mb-2">
                            <a href="https://www.google.com/maps/search/?api=1&query=${data.latitude},${data.longitude}" target="_blank" class="btn-text text-primary">
                                <i class="la la-map me-1"></i> View on Map
                            </a>
                        </p>
                    ` : ''}
                    <div class="price-info mb-3">
                        <span class="h4 text-primary">${data.currency || 'USD'} ${data.dailyRate || 0}</span>
                        <small class="text-muted"> / per night</small>
                    </div>
                    <div class="amenities mb-3">
                        <span class="badge bg-light text-dark border me-2 p-2">
                            <i class="la ${data.freeWifi ? 'la-wifi' : 'la-times-circle'}"></i> ${data.freeWifi ? 'Free WiFi' : 'No WiFi'}
                        </span>
                        <span class="badge bg-light text-dark border p-2">
                            <i class="la ${data.includeBreakfast ? 'la-coffee' : 'la-times-circle'}"></i> ${data.includeBreakfast ? 'Breakfast Included' : 'No Breakfast'}
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h5>Review Score: <span class="badge bg-success">${data.reviewScore || 'N/A'}</span></h5>
                    <p class="text-muted">Based on ${data.reviewCount || 0} reviews</p>
                </div>
            </div>
        </div>
    `;
    
    content.innerHTML = html;
    bookBtn.href = data.landingURL || '#';
    
    $('#hotelDetailModal').modal('show');
}

function generateStars(rating) {
    let stars = '';
    const fullStars = Math.floor(rating);
    for (let i = 0; i < fullStars; i++) {
        stars += '<i class="la la-star"></i>';
    }
    if (rating % 1 !== 0) {
        stars += '<i class="la la-star-half-alt"></i>';
    }
    const emptyStars = 5 - Math.ceil(rating);
    for (let i = 0; i < emptyStars; i++) {
        stars += '<i class="la la-star-o"></i>';
    }
    return stars;
}

async function resolveHotelAddresses() {
    const elements = document.querySelectorAll('.hotel-address');

    for (const el of elements) {
        const lat = el.getAttribute('data-lat');
        const lng = el.getAttribute('data-lng');
        const originalAddress = el.getAttribute('data-address') || '';

        if (!lat || !lng || !originalAddress.startsWith('Location:')) {
            continue;
        }

        try {
            const location = await getLocationFromCoordinates(lat, lng);
            let newAddress = originalAddress;
            
            if (location && location.fullAddress) {
                newAddress = location.fullAddress;
            } else if (location && location.name) {
                newAddress = `${location.name}${location.area ? ', ' + location.area : ''}${location.country ? ', ' + location.country : ''}`;
            }
            
            // Preserve the icon and update only the text
            el.innerHTML = '<i class="la la-map-marker me-2" style="color: #2563eb;"></i>' + newAddress;
        } catch (e) {
            console.warn('Could not load reverse geocoded address', e);
        }
    }
}

// Resolve addresses as soon as DOM is ready, not waiting for full page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', resolveHotelAddresses);
} else {
    resolveHotelAddresses();
}

$(document).ready(function() {
  // Date range picker initialization with override
  function initDatePickers() {
    if ($('.date-range').length && typeof $.fn.daterangepicker === 'function') {
      var daterangeInput = $('.date-range');
      
      // Destroy existing instance to clear conflicting state
      try {
          if (daterangeInput.data('daterangepicker')) {
              daterangeInput.data('daterangepicker').remove();
          }
      } catch (e) { }

      // Parse initial value if exists or set defaults
      var start = moment();
      var end = moment().add(1, 'days');
      var val = daterangeInput.val();
      
      if (val && val.indexOf(' - ') > -1) {
          var parts = val.split(' - ');
          var p1 = moment(parts[0], 'DD/MM/YYYY');
          var p2 = moment(parts[1], 'DD/MM/YYYY');
          if (p1.isValid() && p2.isValid()) {
              start = p1;
              end = p2;
          }
      }

      daterangeInput.daterangepicker({
        opens: 'left',
        minDate: moment(),
        startDate: start,
        endDate: end,
        autoUpdateInput: true,
        locale: {
          format: 'DD/MM/YYYY',
          separator: ' - '
        }
      });
    }
  }

  // Functional Price Slider initialization
  function initPriceSliders() {
      var minVal = parseInt("{{ request('min_price', 0) }}");
      var maxVal = parseInt("{{ request('max_price', 2000) }}");

      if ($("#slider-range").length && $.fn.slider) {
          $("#slider-range").slider({
              range: true,
              min: 0,
              max: 2000,
              values: [minVal, maxVal],
              slide: function(event, ui) {
                  $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                  $("#min_price").val(ui.values[0]);
                  $("#max_price").val(ui.values[1]);
                  $("#form_min_price").val(ui.values[0]);
                  $("#form_max_price").val(ui.values[1]);
              }
          });
          $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
      }
      
      if ($("#slider-range2").length && $.fn.slider) {
          $("#slider-range2").slider({
              range: true,
              min: 0,
              max: 2000,
              values: [minVal, maxVal],
              slide: function(event, ui) {
                  $("#amount2").val("$" + ui.values[0] + " - $" + ui.values[1]);
                  $("#form_min_price").val(ui.values[0]);
                  $("#form_max_price").val(ui.values[1]);
              }
          });
          $("#amount2").val("$" + $("#slider-range2").slider("values", 0) + " - $" + $("#slider-range2").slider("values", 1));
      }
  }

  // Use window load to ensure all libraries are ready
  $(window).on('load', async function() {
      setTimeout(async function() {
          initDatePickers();
          initPriceSliders();
      }, 500);
  });
});
</script>
@endpush
