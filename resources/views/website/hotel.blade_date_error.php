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
                      <input type="hidden" name="max_price" id="form_max_price" value="{{ request('max_price', 1000) }}">
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
                      
                      <div class="sidebar-widget-item">
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
                      </div>

                      <div class="btn-box pt-2">
                        <button type="submit" class="theme-btn w-100">Search Now</button>
                      </div>

                      <hr class="mt-4 mb-4">

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
                <p class="card-meta">{{ $hotel->address }} {{ $hotel->location ? ', ' . $hotel->location->name : '' }}</p>
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
                    <a href="{{ $hotel->agoda_data['landingURL'] }}" target="_blank" class="theme-btn theme-btn-small">Book on Agoda</a>
                  @else
                    <a href="#" class="btn-text">See details<i class="la la-angle-right"></i></a>
                  @endif
                </div>
              </div>
            </div>
            @empty
            <div class="alert alert-info">No hotels found matching your criteria.</div>
            @endforelse

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
  $(window).on('load', function() {
      setTimeout(function() {
          initDatePickers();
          initPriceSliders();
      }, 500);
  });
});
</script>
@endpush
