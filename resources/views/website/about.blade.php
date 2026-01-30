@extends('website.layouts.master')

@section('title', 'About Us - Flytrust')

@section('meta')
<meta name="description" content="Learn about Hubli’s mission to transform Bangladesh’s food supply chain and eliminate food wastage with a smart, efficient national network.">
<meta name="keywords" content="Hubli, food hub, supply chain, food wastage, Bangladesh, agriculture">
<meta property="og:title" content="About Us - Hubli">
<meta property="og:description" content="Transforming Bangladesh’s food supply chain with smart logistics and technology.">
<meta property="og:image" content="{{ asset('frontend/assets/img/northbengal/contact_banner.png') }}">
<meta property="og:type" content="website">
@endsection

@push('styles')

@endpush

@section('content')
    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <x-breadcrumb slug="About Us" image="bread-bg-9" />
    <!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->


    <!-- ================================
    START ABOUT AREA
================================= -->
    <section class="about-area padding-top-100px padding-bottom-90px overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-heading margin-bottom-40px">
              <h2 class="sec__title">About Us</h2>
              <h4 class="title font-size-16 line-height-26 pt-4 pb-2">
                        Welcome to Flytrust International <br>
                        Where Every Journey Begins with Trust
              </h4>
              <p class="sec__desc font-size-16 pb-3">
                Flytrust International is not just a travel agency — we are your trusted partner in exploring the world with comfort, safety, and confidence. Built on integrity, transparency, and premium service, our mission is to redefine travel experiences for individuals, families, and corporate clients.
                Whether you are flying for leisure, business, medical needs, or spiritual journeys, we ensure a smooth, stress-free, and memorable experience from start to finish.

              </p>
              
              <h5>🌟 Our Mission</h5>
            <p class="sec__desc font-size-16 pb-3">
                To deliver reliable, secure, and high-quality travel solutions that empower travelers to explore the world with trust and confidence.
            </p>

              <h5>🌟 Our Vision</h5>
            <p class="sec__desc font-size-16 pb-3">
                To become Bangladesh’s most trusted global travel brand by combining innovation, service excellence, and customer satisfaction.
            </p>

              <p class="sec__desc font-size-16">
                Vivamus a mauris vel nunc tristique volutpat. Aenean eu faucibus
                enim. Aenean blandit arcu lectus, in cursus elit porttitor non.
                Curabitur risus eros,
              </p>
            </div>
            <!-- end section-heading -->
          </div>
          <!-- end col-lg-6 -->
          <div class="col-lg-5 ms-auto">
            <div class="image-box about-img-box">
              <img
                src="{{ asset('frontend/images/img24.jpg') }}"
                alt="about-img"
                class="img__item img__item-1"
              />
              <img
                src="{{ asset('frontend/images/img25.jpg') }}"
                alt="about-img"
                class="img__item img__item-2"
              />
            </div>
          </div>
          <!-- end col-lg-5 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end about-area -->
    <!-- ================================
    END ABOUT AREA
================================= -->


    <!-- ================================
    START INFO AREA
================================= -->
<section class="info-area padding-top-100px padding-bottom-70px" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-8">
        <h2 class="section-title mb-3">💼 Why Choose Flytrust International?</h2>
        <p class="section-subtitle">
          Travel needs differ — we understand that. Our team crafts tailored itineraries to match your preferences, budget, and travel purpose.
        </p>
      </div>
    </div>

    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">
              ✔ Personalized Service
            </h5>
            <p class="card-text">
              Our team crafts tailored itineraries to match your preferences, budget, and travel purpose.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">
              ✔ Expert Guidance
            </h5>
            <p class="card-text">
              Experienced travel consultants provide destination insights, visa guidance, itineraries, and real-time support.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">
              ✔ Strong Global Partnerships
            </h5>
            <p class="card-text">
              We work with reputable airlines, hotels, DMCs, and travel partners worldwide to provide premium and budget-friendly options.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">
              ✔ 24/7 Dedicated Support
            </h5>
            <p class="card-text">
              From flight changes to emergency assistance — our support team stays with you throughout your journey.
            </p>
          </div>
        </div>
      </div>
      <!-- Card 5 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">
              ✔ Ethical & Responsible Travel
            </h5>
            <p class="card-text">
             We encourage sustainable tourism, local engagement, and environmentally safe travel practices.
            </p>
          </div>
        </div>
      </div>
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
    STAR FUNFACT AREA
================================= -->
    <section class="funfact-area padding-bottom-70px">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading text-center">
              <h2 class="sec__title">Our Numbers Say Everything</h2>
            </div>
            <!-- end section-heading -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
        <div class="counter-box counter-box-2 margin-top-60px mb-0">
          <div class="row">
            <div class="col-lg-3 responsive-column">
              <div class="counter-item counter-item-layout-2 d-flex">
                <div class="counter-icon flex-shrink-0">
                  <i class="la la-users"></i>
                </div>
                <div class="counter-content">
                  <div>
                    <span
                      class="counter"
                      data-from="0"
                      data-to="200"
                      data-refresh-interval="5"
                      >0</span
                    >
                    <span class="count-symbol">+</span>
                  </div>
                  <p class="counter__title">Partners</p>
                </div>
                <!-- end counter-content -->
              </div>
              <!-- end counter-item -->
            </div>
            <!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
              <div class="counter-item counter-item-layout-2 d-flex">
                <div class="counter-icon flex-shrink-0">
                  <i class="la la-building"></i>
                </div>
                <div class="counter-content">
                  <div>
                    <span
                      class="counter"
                      data-from="0"
                      data-to="3"
                      data-refresh-interval="5"
                      >0</span
                    >
                    <span class="count-symbol">k</span>
                  </div>
                  <p class="counter__title">Properties</p>
                </div>
                <!-- end counter-content -->
              </div>
              <!-- end counter-item -->
            </div>
            <!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
              <div class="counter-item counter-item-layout-2 d-flex">
                <div class="counter-icon flex-shrink-0">
                  <i class="la la-globe"></i>
                </div>
                <div class="counter-content">
                  <div>
                    <span
                      class="counter"
                      data-from="0"
                      data-to="400"
                      data-refresh-interval="5"
                      >0</span
                    >
                    <span class="count-symbol">+</span>
                  </div>
                  <p class="counter__title">Destinations</p>
                </div>
                <!-- end counter-content -->
              </div>
              <!-- end counter-item -->
            </div>
            <!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
              <div class="counter-item counter-item-layout-2 d-flex">
                <div class="counter-icon flex-shrink-0">
                  <i class="la la-check-circle"></i>
                </div>
                <div class="counter-content">
                  <div>
                    <span
                      class="counter"
                      data-from="0"
                      data-to="40"
                      data-refresh-interval="5"
                      >0</span
                    >
                    <span class="count-symbol">k</span>
                  </div>
                  <p class="counter__title">Booking</p>
                </div>
                <!-- end counter-content -->
              </div>
              <!-- end counter-item -->
            </div>
            <!-- end col-lg-3 -->
          </div>
          <!-- end row -->
        </div>
        <!-- end counter-box -->
      </div>
      <!-- end container -->
    </section>
    <!-- ================================
    END FUNFACT AREA
================================= -->

    <!-- ================================
       START TESTIMONIAL AREA
================================= -->
    <x-testimonial />
    <!-- end testimonial-area -->
    <!-- ================================
       START TESTIMONIAL AREA
================================= -->

    <!-- ================================
    START INFO AREA
================================= -->
    {{--<section class="info-area padding-top-100px padding-bottom-60px text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading">
              <h2 class="sec__title">Our Dedicated Team</h2>
            </div>
            <!-- end section-heading -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
        <div class="row padding-top-100px">
          <div class="col-lg-4 responsive-column">
            <div class="card-item team-card">
              <div class="card-img">
                <img src="{{ asset('frontend/images/team1.jpg') }}" alt="team-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title">David Roberts</h3>
                <p class="card-meta">Founder & Director</p>
                <p class="card-text font-size-15 pt-2">
                  Ligula vehicula enenatis semper, magna lorem aliquet lacusin
                  ante dapibus dictum fugats vitaes nemo minima.
                </p>
                <ul class="social-profile padding-top-20px pb-2">
                  <li>
                    <a href="#"><i class="lab la-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item team-card">
              <div class="card-img">
                <img src="{{ asset('frontend/images/team2.jpg') }}" alt="team-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title">Augusta Silva</h3>
                <p class="card-meta">Chief Operating Officer</p>
                <p class="card-text font-size-15 pt-2">
                  Ligula vehicula enenatis semper, magna lorem aliquet lacusin
                  ante dapibus dictum fugats vitaes nemo minima.
                </p>
                <ul class="social-profile padding-top-20px pb-2">
                  <li>
                    <a href="#"><i class="lab la-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item team-card">
              <div class="card-img">
                <img src="{{ asset('frontend/images/team3.jpg') }}" alt="team-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title">Bernice Lucas</h3>
                <p class="card-meta">Account Manager</p>
                <p class="card-text font-size-15 pt-2">
                  Ligula vehicula enenatis semper, magna lorem aliquet lacusin
                  ante dapibus dictum fugats vitaes nemo minima.
                </p>
                <ul class="social-profile padding-top-20px pb-2">
                  <li>
                    <a href="#"><i class="lab la-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item team-card">
              <div class="card-img">
                <img src="{{ asset('frontend/images/team4.jpg') }}" alt="team-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title">David Jackson</h3>
                <p class="card-meta">Sales Support</p>
                <p class="card-text font-size-15 pt-2">
                  Ligula vehicula enenatis semper, magna lorem aliquet lacusin
                  ante dapibus dictum fugats vitaes nemo minima.
                </p>
                <ul class="social-profile padding-top-20px pb-2">
                  <li>
                    <a href="#"><i class="lab la-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item team-card">
              <div class="card-img">
                <img src="{{ asset('frontend/images/team5.jpg') }}" alt="team-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title">Kyle Martin</h3>
                <p class="card-meta">Order Manager</p>
                <p class="card-text font-size-15 pt-2">
                  Ligula vehicula enenatis semper, magna lorem aliquet lacusin
                  ante dapibus dictum fugats vitaes nemo minima.
                </p>
                <ul class="social-profile padding-top-20px pb-2">
                  <li>
                    <a href="#"><i class="lab la-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-4 -->
          <div class="col-lg-4 responsive-column">
            <div class="card-item team-card">
              <div class="card-img">
                <img src="{{ asset('frontend/images/team6.jpg') }}" alt="team-img" />
              </div>
              <div class="card-body">
                <h3 class="card-title">Evan Porter</h3>
                <p class="card-meta">Head of Design</p>
                <p class="card-text font-size-15 pt-2">
                  Ligula vehicula enenatis semper, magna lorem aliquet lacusin
                  ante dapibus dictum fugats vitaes nemo minima.
                </p>
                <ul class="social-profile padding-top-20px pb-2">
                  <li>
                    <a href="#"><i class="lab la-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lab la-linkedin-in"></i></a>
                  </li>
                </ul>
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
    <!-- end info-area -->
    <!-- ================================
    END INFO AREA
================================= -->

    <!-- ================================
    START CTA AREA
================================= -->
    <section class="cta-area cta-bg-2 bg-fixed section-padding text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading">
              <h2 class="sec__title mb-3 text-white">
                Interested in a career <br />
                at Flytrust.
              </h2>
              <p class="sec__desc text-white">
                We’re always looking for talented individuals and <br />
                people who are hungry to do great work.
              </p>
            </div>
            <!-- end section-heading -->
            <div class="btn-box padding-top-35px">
              <a href="#" class="theme-btn border-0">Join Our Team</a>
            </div>
          </div>
          <!-- end col-lg-12 -->
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

@push('scripts')

@endpush