@extends('website.layouts.master')

@section('title', 'Visa - '.env('APP_NAME'))

@section('meta')
<meta name="description"
    content="North Bengal offers premium dairy products, latest news, and world-class services. Explore our departments and services with ease.">
<meta name="keywords" content="North Bengal, dairy products, latest news, services, departments, quality dairy">
<meta property="og:title" content="Home - North Bengal">
<meta property="og:description"
    content="Discover North Bengal’s quality dairy products, latest news, and world-class services.">
<meta property="og:image" content="{{ asset('frontend/assets/img/northbengal/home-banner.png') }}">
<meta property="og:type" content="website">
<meta name="robots" content="index, follow">
@endsection

@push('css')

@endpush

@section('content')
    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <x-breadcrumb slug="Visa" image="bread-bg-7"/>
    <!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->

    <!-- ================================
    START CARD AREA
================================= -->
    <section class="card-area section--padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="filter-wrap margin-bottom-30px">
              <div
                class="filter-top d-flex align-items-center justify-content-between pb-4"
              >
                <div>
                  <h3 class="title font-size-24">2224 Hotels found</h3>
                  <p class="font-size-14">
                    <span class="me-1 pt-1">Book with confidence:</span>No hotel
                    booking fees
                  </p>
                </div>
                <div class="layout-view d-flex align-items-center">
                  <a
                    href="hotel-grid.html"
                    data-bs-toggle="tooltip"
                    data-placement="top"
                    title="Grid View"
                    class="active"
                    ><i class="la la-th-large"></i
                  ></a>
                  <a
                    href="hotel-list.html"
                    data-bs-toggle="tooltip"
                    data-placement="top"
                    title="List View"
                    ><i class="la la-th-list"></i
                  ></a>
                </div>
              </div>
              <!-- end filter-top -->
              <div
                class="filter-bar d-flex align-items-center justify-content-between"
              >
                <div
                  class="filter-bar-filter d-flex flex-wrap align-items-center"
                >
                  <div class="filter-option">
                    <h3 class="title font-size-16">Filter by:</h3>
                  </div>
                  <div class="filter-option">
                    <div class="dropdown dropdown-contain">
                      <a
                        class="dropdown-toggle dropdown-btn dropdown--btn"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                      >
                        Filter Price
                      </a>
                      <div class="dropdown-menu dropdown-menu-wrap">
                        <div class="dropdown-item">
                          <div class="slider-range-wrap">
                            <div
                              class="price-slider-amount padding-bottom-20px"
                            >
                              <label for="amount" class="filter__label"
                                >Price:</label
                              >
                              <input type="text" id="amount" class="amounts" />
                            </div>
                            <!-- end price-slider-amount -->
                            <div id="slider-range"></div>
                            <!-- end slider-range -->
                          </div>
                          <!-- end slider-range-wrap -->
                          <div class="btn-box pt-4">
                            <button
                              class="theme-btn theme-btn-small theme-btn-transparent"
                              type="button"
                            >
                              Apply
                            </button>
                          </div>
                        </div>
                        <!-- end dropdown-item -->
                      </div>
                      <!-- end dropdown-menu -->
                    </div>
                    <!-- end dropdown -->
                  </div>
                  <div class="filter-option">
                    <div class="dropdown dropdown-contain">
                      <a
                        class="dropdown-toggle dropdown-btn dropdown--btn"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                      >
                        Review Score
                      </a>
                      <div class="dropdown-menu dropdown-menu-wrap">
                        <div class="dropdown-item">
                          <div class="checkbox-wrap">
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="r1"
                              />
                              <label for="r1">
                                <span class="ratings d-flex align-items-center">
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <span class="color-text-3 font-size-13 ms-1"
                                    >(55.590)</span
                                  >
                                </span>
                              </label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="r2"
                              />
                              <label for="r2">
                                <span class="ratings d-flex align-items-center">
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star-o"></i>
                                  <span class="color-text-3 font-size-13 ms-1"
                                    >(40.590)</span
                                  >
                                </span>
                              </label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="r3"
                              />
                              <label for="r3">
                                <span class="ratings d-flex align-items-center">
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star-o"></i>
                                  <i class="la la-star-o"></i>
                                  <span class="color-text-3 font-size-13 ms-1"
                                    >(23.590)</span
                                  >
                                </span>
                              </label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="r4"
                              />
                              <label for="r4">
                                <span class="ratings d-flex align-items-center">
                                  <i class="la la-star"></i>
                                  <i class="la la-star"></i>
                                  <i class="la la-star-o"></i>
                                  <i class="la la-star-o"></i>
                                  <i class="la la-star-o"></i>
                                  <span class="color-text-3 font-size-13 ms-1"
                                    >(12.590)</span
                                  >
                                </span>
                              </label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="r5"
                              />
                              <label for="r5">
                                <span class="ratings d-flex align-items-center">
                                  <i class="la la-star"></i>
                                  <i class="la la-star-o"></i>
                                  <i class="la la-star-o"></i>
                                  <i class="la la-star-o"></i>
                                  <i class="la la-star-o"></i>
                                  <span class="color-text-3 font-size-13 ms-1"
                                    >(590)</span
                                  >
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <!-- end dropdown-item -->
                      </div>
                      <!-- end dropdown-menu -->
                    </div>
                    <!-- end dropdown -->
                  </div>
                  <div class="filter-option">
                    <div class="dropdown dropdown-contain">
                      <a
                        class="dropdown-toggle dropdown-btn dropdown--btn"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                      >
                        Facilities
                      </a>
                      <div class="dropdown-menu dropdown-menu-wrap">
                        <div class="dropdown-item">
                          <div class="checkbox-wrap">
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb1"
                              />
                              <label for="catChb1">Pet Allowed</label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb2"
                              />
                              <label for="catChb2">Groups Allowed</label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb3"
                              />
                              <label for="catChb3">Tour Guides</label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb4"
                              />
                              <label for="catChb4">Access for disabled</label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb5"
                              />
                              <label for="catChb5">Room Service</label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb6"
                              />
                              <label for="catChb6">Parking</label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb7"
                              />
                              <label for="catChb7">Restaurant</label>
                            </div>
                            <div class="custom-checkbox">
                              <input
                                type="checkbox"
                                class="form-check-input"
                                id="catChb8"
                              />
                              <label for="catChb8">Pet friendly</label>
                            </div>
                          </div>
                        </div>
                        <!-- end dropdown-item -->
                      </div>
                      <!-- end dropdown-menu -->
                    </div>
                    <!-- end dropdown -->
                  </div>
                </div>
                <!-- end filter-bar-filter -->
                <div class="select-contain select2-container-wrapper">
                  <select class="select-contain-select">
                    <option value="1">Short by default</option>
                    <option value="2">Popular Hotel</option>
                    <option value="3">Price: low to high</option>
                    <option value="4">Price: high to low</option>
                    <option value="5">A to Z</option>
                  </select>
                </div>
                <!-- end select-contain -->
              </div>
              <!-- end filter-bar -->
            </div>
            <!-- end filter-wrap -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/dhubai.jpg') }}" alt="hotel-img" />
                </a>
                <span class="badge">Bestseller</span>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html">Dubai</a>
                </h3>
                <!-- <p class="card-meta">124 E Huron St, New york</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/singapore-fl.jpg') }}" alt="hotel-img" />
                </a>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html">Singapore</a>
                </h3>
                <!-- <p class="card-meta">124 E Huron St, Chicago</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$58.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/thailand-fl.jpg') }}" alt="hotel-img" />
                </a>
                <span class="badge">Featured</span>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html"
                    >Thailand</a
                  >
                </h3>
                <!-- <p class="card-meta">200 Nohea Kai Dr, Lahaina, HI</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/chaina-1.jpg') }}" alt="hotel-img" />
                </a>
                <span class="badge">Popular</span>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html"
                    >China</a
                  >
                </h3>
                <!-- <p class="card-meta">3900 Wailea Alanui Drive, Kihei, HI</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/malaysia-flag.jpg') }}" alt="hotel-img" />
                </a>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html">Malaysia</a>
                </h3>
                <!-- <p class="card-meta">272 Bath Road, Harlington, England</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/nepal.jpg') }}" alt="hotel-img" />
                </a>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html"
                    >Nepal</a
                  >
                </h3>
                <!-- <p class="card-meta">38-40 Rue Saint Séverin, Paris, Paris</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/indronisia-fl.jpg') }}" alt="hotel-img" />
                </a>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html">Indonesia</a>
                </h3>
                <!-- <p class="card-meta">272 Bath Road, Harlington, England</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <a href="hotel-single.html" class="d-block">
                  <img src="{{ asset('frontend/images/visa/turkey.jpg') }}" alt="hotel-img" />
                </a>
                <div
                  class="add-to-wishlist icon-element"
                  data-bs-toggle="tooltip"
                  data-placement="top"
                  title="Bookmark"
                >
                  <i class="la la-heart-o"></i>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="hotel-single.html"
                    >Turkey</a
                  >
                </h3>
                <!-- <p class="card-meta">38-40 Rue Saint Séverin, Paris, Paris</p>
                <div class="card-rating">
                  <span class="badge text-white">4.4/5</span>
                  <span class="review__text">Average</span>
                  <span class="rating__text">(30 Reviews)</span>
                </div>
                <div
                  class="card-price d-flex align-items-center justify-content-between"
                >
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                    <span class="price__text">Per night</span>
                  </p>
                  <a href="hotel-single.html" class="btn-text"
                    >See details<i class="la la-angle-right"></i
                  ></a>
                </div> -->
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="btn-box mt-3 text-center">
              <button type="button" class="theme-btn">
                <i class="la la-refresh me-1"></i>Load More
              </button>
              <p class="font-size-13 pt-2">Showing 1 - 6 of 2224 Hotels</p>
            </div>
            <!-- end btn-box -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end card-area -->
    <!-- ================================
    END CARD AREA
================================= -->

    <div class="section-block"></div>

    <!-- ================================
    START INFO AREA
================================= -->
    <section class="info-area info-bg padding-top-90px padding-bottom-70px">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 responsive-column">
            <a href="#" class="icon-box icon-layout-2 d-flex">
              <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                <i class="la la-phone"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title">Need Help? Contact us</h4>
                <p class="info__desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
              </div>
              <!-- end info-content --> </a
            ><!-- end icon-box -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <a href="#" class="icon-box icon-layout-2 d-flex">
              <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                <i class="la la-money"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title">Payments</h4>
                <p class="info__desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
              </div>
              <!-- end info-content --> </a
            ><!-- end icon-box -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <a href="#" class="icon-box icon-layout-2 d-flex">
              <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                <i class="la la-times"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title">Cancel Policy</h4>
                <p class="info__desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing
                </p>
              </div>
              <!-- end info-content --> </a
            ><!-- end icon-box -->
          </div>
          <!-- end col-lg-4 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end info-area -->
    <!-- ================================
    END INFO AREA
================================= -->

    <!-- ================================
    START CTA AREA
================================= -->
    <section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="section-heading">
              <h2 class="sec__title font-size-30 text-white">
                Subscribe to see Secret Deals
              </h2>
            </div>
            <!-- end section-heading -->
          </div>
          <!-- end col-lg-7 -->
          <div class="col-lg-5">
            <div class="subscriber-box">
              <div class="contact-form-action">
                <form action="#">
                  <div class="input-box">
                    <label class="label-text text-white"
                      >Enter email address</label
                    >
                    <div class="form-group mb-0">
                      <span class="la la-envelope form-icon"></span>
                      <input
                        class="form-control"
                        type="email"
                        name="email"
                        placeholder="Email address"
                      />
                      <button
                        class="theme-btn theme-btn-small submit-btn"
                        type="submit"
                      >
                        Subscribe
                      </button>
                      <span class="font-size-14 pt-1 text-white-50"
                        ><i class="la la-lock me-1"></i>Don't worry your
                        information is safe with us.</span
                      >
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- end section-heading -->
          </div>
          <!-- end col-lg-5 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end cta-area -->
    <!-- ================================
    END CTA AREA
================================= -->

@endsection



@push('js')

@endpush