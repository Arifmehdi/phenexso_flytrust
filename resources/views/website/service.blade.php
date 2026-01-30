@extends('website.layouts.master')

@section('title', 'Service - ' . config('app.name'))
@section('meta')
    <meta name="description" content="Contact North Bengal for inquiries, product details, or business queries. Get in touch via phone, email, or visit our office.">
    <meta name="keywords" content="contact north bengal, contact us, north bengal inquiries, phone, email, office location">
    <meta property="og:title" content="Contact Us - North Bengal">
    <meta property="og:description" content="Reach North Bengal for product inquiries or business partnerships.">
    <meta property="og:image" content="{{ asset('frontend/assets/img/northbengal/contact_banner.png') }}">
    <meta property="og:type" content="website">
@endsection

@section('content')
     <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <x-breadcrumb slug="Our Services" image="bread-bg-9"/>
    <!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->

    <!-- ================================
    START SERVICE AREA
================================= -->
    <section class="service-area section--padding text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading text-center">
              <h2 class="sec__title">Services We Provide</h2>
            </div>
            <!-- end section-heading -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
        <div class="row padding-top-80px">
          <div class="col-lg-4 responsive-column">
            <div class="icon-box icon-layout-4">
              <div class="info-icon">
                <i class="la la-plane"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title"><a href="#"> Flight Ticketing <br>(Local & International)</a></h4>
                <p class="info__desc">
                    Best deals, flexible schedules, instant confirmations.

                </p>
              </div>
              <!-- end info-content -->
            </div>
            <!-- end icon-box -->
          </div>
                    <!-- end col-lg-3 -->
          <div class="col-lg-4 responsive-column">
            <div class="icon-box icon-layout-4">
              <div class="info-icon">
                <i class="la la-hotel"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title"><a href="#">Hotel Booking</a></h4>
                <p class="info__desc">
                  From luxury international hotels to budget stays — we provide verified accommodations at the best prices.
                </p>
              </div>
              <!-- end info-content -->
            </div>
            <!-- end icon-box -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-4 responsive-column">
            <div class="icon-box icon-layout-4">
              <div class="info-icon">
                <i class="la la-user-secret"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title"><a href="#">Visa Processing Assistance</a></h4>
                <p class="info__desc">
                  Complete support for tourism, business, student, and medical visas.
                </p>
              </div>
              <!-- end info-content -->
            </div>
            <!-- end icon-box -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-4 responsive-column">
            <div class="icon-box icon-layout-4">
              <div class="info-icon">
                <i class="la la-anchor"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title"><a href="#">Holiday Packages</a></h4>
                <p class="info__desc">
                  Customized tours across Asia, the Middle East, Europe, and more.

                </p>
              </div>
              <!-- end info-content -->
            </div>
            <!-- end icon-box -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-4 responsive-column">
            <div class="icon-box icon-layout-4">
              <div class="info-icon">
                <i class="la la-support"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title"><a href="#">Corporate Travel Management</a></h4>
                <p class="info__desc">
                  Dedicated account management, monthly reporting, and priority service.
                </p>
              </div>
              <!-- end info-content -->
            </div>
            <!-- end icon-box -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-4 responsive-column">
            <div class="icon-box icon-layout-4">
              <div class="info-icon">
                <i class="la la-briefcase"></i>
              </div>
              <!-- end info-icon-->
              <div class="info-content">
                <h4 class="info__title"><a href="#">Umrah & Religious Tours</a></h4>
                <p class="info__desc">
                  Trusted, organized, and safe arrangements.
                </p>
              </div>
              <!-- end info-content -->
            </div>
            <!-- end icon-box -->
          </div>
          <!-- end col-lg-3 -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-lg-12">
            <div
              class="tab-content-info mt-n4 d-flex justify-content-between align-items-center"
            >
              <p class="font-size-15">
                Do not hesitate to contact us for better help and service.
              </p>
              <a href="{{ route('contact') }}" class="btn-text font-size-15"
                >Contact us <i class="la la-arrow-right ms-1"></i
              ></a>
            </div>
            <!-- end tab-content-info -->
          </div>
        </div>
      </div>
      <!-- end container -->
    </section>
    <!-- end service-area -->
    <!-- ================================
    END SERVICE AREA
================================= -->

    <!-- ================================
    START SERVICE AREA
================================= -->
    {{--<section class="service-area section-bg section--padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading text-center">
              <h2 class="sec__title">Services Also We Offer</h2>
            </div>
            <!-- end section-heading -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
        <div class="row padding-top-50px">
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <img src="images/img9.jpg" alt="about-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title mb-2">Mountains Tours</h3>
                <p class="card-meta">
                  Duis cursus lectus sed dui imperdiet, id pharetra nunc
                  ullamcorper.
                </p>
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
                    <span class="price__num">$100.00</span>
                  </p>
                  <span class="tour-hour"
                    ><i class="la la-clock-o me-1"></i>7 days</span
                  >
                </div>
                <div class="btn-box pt-3">
                  <a href="#" class="theme-btn theme-btn-small">I want this</a>
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <img src="images/img10.jpg" alt="about-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title mb-2">Honeymoons Tours</h3>
                <p class="card-meta">
                  Duis cursus lectus sed dui imperdiet, id pharetra nunc
                  ullamcorper.
                </p>
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
                    <span class="price__num">$100.00</span>
                    <span class="price__num before-price color-text-3"
                      >$124.00</span
                    >
                  </p>
                  <span class="tour-hour"
                    ><i class="la la-clock-o me-1"></i>7 days</span
                  >
                </div>
                <div class="btn-box pt-3">
                  <a href="#" class="theme-btn theme-btn-small">I want this</a>
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <img src="images/img11.jpg" alt="about-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title mb-2">Sea Tours</h3>
                <p class="card-meta">
                  Duis cursus lectus sed dui imperdiet, id pharetra nunc
                  ullamcorper.
                </p>
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
                    <span class="price__num">$100.00</span>
                  </p>
                  <span class="tour-hour"
                    ><i class="la la-clock-o me-1"></i>7 days</span
                  >
                </div>
                <div class="btn-box pt-3">
                  <a href="#" class="theme-btn theme-btn-small">I want this</a>
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <img src="images/img12.jpg" alt="about-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title mb-2">Cruises Tours</h3>
                <p class="card-meta">
                  Duis cursus lectus sed dui imperdiet, id pharetra nunc
                  ullamcorper.
                </p>
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
                    <span class="price__num">$100.00</span>
                  </p>
                  <span class="tour-hour"
                    ><i class="la la-clock-o me-1"></i>7 days</span
                  >
                </div>
                <div class="btn-box pt-3">
                  <a href="#" class="theme-btn theme-btn-small">I want this</a>
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <img src="images/img13.jpg" alt="about-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title mb-2">Safari Tours</h3>
                <p class="card-meta">
                  Duis cursus lectus sed dui imperdiet, id pharetra nunc
                  ullamcorper.
                </p>
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
                    <span class="price__num">$100.00</span>
                    <span class="price__num before-price color-text-3"
                      >$124.00</span
                    >
                  </p>
                  <span class="tour-hour"
                    ><i class="la la-clock-o me-1"></i>7 days</span
                  >
                </div>
                <div class="btn-box pt-3">
                  <a href="#" class="theme-btn theme-btn-small">I want this</a>
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item">
              <div class="card-img">
                <img src="images/img14.jpg" alt="about-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title mb-2">Jungle Tours</h3>
                <p class="card-meta">
                  Duis cursus lectus sed dui imperdiet, id pharetra nunc
                  ullamcorper.
                </p>
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
                    <span class="price__num">$100.00</span>
                  </p>
                  <span class="tour-hour"
                    ><i class="la la-clock-o me-1"></i>7 days</span
                  >
                </div>
                <div class="btn-box pt-3">
                  <a href="#" class="theme-btn theme-btn-small">I want this</a>
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>--}}
    <!-- end service-area -->
    <!-- ================================
    END SERVICE AREA
================================= -->

    <!-- ================================
    START CTA AREA
================================= -->
    <section  class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="section-heading">
              <h2 class="sec__title font-size-30 text-white">
                Subscribe to Get Updates & Offers
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

@push('css')

@endpush
