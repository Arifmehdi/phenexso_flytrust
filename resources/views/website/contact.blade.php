@extends('website.layouts.master')

@section('title', 'Contact Us - ' . config('app.name'))
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

    <x-breadcrumb slug="Contact Us" image="bread-bg-5"/>
    <!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->

    <!-- ================================
    START CONTACT AREA
================================= -->
    <section class="contact-area section--padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="form-box">
              <div class="form-title-wrap">
                <h3 class="title">We'd love to hear from you</h3>
                <p class="font-size-15">
                  Send us a message, and we'll respond as soon as possible
                </p>
              </div>
              <!-- form-title-wrap -->
              <div class="form-content">
                <div class="contact-form-action">
                  <div
                    id="contact-success-message"
                    class="alert alert-success"
                    role="alert"
                  >
                    Thank You! Your message has been sent.
                  </div>
                  <form
                    id="contact-form"
                    method="post"
                    action="#"
                    class="row"
                  >
                    <div class="col-lg-6 responsive-column">
                      <div class="input-box">
                        <label class="label-text">Your Name</label>
                        <div class="form-group">
                          <span class="la la-user form-icon"></span>
                          <input
                            class="form-control"
                            type="text"
                            name="name"
                            placeholder="Your name"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- end col-lg-6 -->
                    <div class="col-lg-6 responsive-column">
                      <div class="input-box">
                        <label class="label-text">Your Email</label>
                        <div class="form-group">
                          <span class="la la-envelope-o form-icon"></span>
                          <input
                            class="form-control"
                            type="email"
                            name="email"
                            placeholder="Email address"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- end col-lg-6 -->
                    <div class="col-lg-12">
                      <div class="input-box">
                        <label class="label-text">Message</label>
                        <div class="form-group">
                          <span class="la la-pencil form-icon"></span>
                          <textarea
                            class="message-control form-control"
                            name="message"
                            placeholder="Write message"
                          ></textarea>
                        </div>
                      </div>
                    </div>
                    <!-- end col-lg-12 -->
                    <div class="col-lg-12">
                      <div class="btn-box">
                        <button
                          id="send-message-btn"
                          type="submit"
                          class="theme-btn"
                        >
                          Send Message
                        </button>
                      </div>
                    </div>
                    <!-- end col-lg-12 -->
                  </form>
                </div>
                <!-- end contact-form-action -->
              </div>
              <!-- end form-content -->
            </div>
            <!-- end form-box -->
          </div>
          <!-- end col-lg-8 -->
          <div class="col-lg-4">
              <div class="form-box">
                  <div class="form-title-wrap">
                      <h3 class="title">Contact Us</h3>
                  </div>
                  <!-- form-title-wrap -->
                  <div class="form-content">
                      <div class="address-book">
                          <ul class="list-items contact-address">
                              <li>
                                  <i class="la la-building icon-element"></i>
                                  <h5 class="title font-size-16 pb-1">Company</h5>
                                  <p class="map__desc">Flytrust International</p>
                              </li>
                              <li>
                                  <i class="la la-phone icon-element"></i>
                                  <h5 class="title font-size-16 pb-1">Phone</h5>
                                  <p class="map__desc">+8801775668424, +8801937994722</p>
                              </li>
                              <li>
                                  <i class="la la-envelope-o icon-element"></i>
                                  <h5 class="title font-size-16 pb-1">Email</h5>
                                  <p class="map__desc">flytrustinternational@gmail.com</p>
                              </li>
                              <li>
                                  <i class="la la-globe icon-element"></i>
                                  <h5 class="title font-size-16 pb-1">Website</h5>
                                  <p class="map__desc">www.flytrustint.com</p>
                              </li>
                              <li>
                                  <i class="la la-map-marker icon-element"></i>
                                  <h5 class="title font-size-16 pb-1">Address</h5>
                                  <p class="map__desc">Suit-321 (2nd Floor), Rupayan Center, Mohakhali C/A, Dhaka-1212</p>
                              </li>
                          </ul>
                          <ul class="social-profile text-center">
                              <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                              <li><a href="#"><i class="lab la-twitter"></i></a></li>
                              <li><a href="#"><i class="lab la-instagram"></i></a></li>
                              <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                              <li><a href="#"><i class="lab la-youtube"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <!-- end form-content -->
              </div>
              <!-- end form-box -->
          </div>

          <!-- end col-lg-4 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end contact-area -->
    <!-- ================================
    END CONTACT AREA
================================= -->

    <!-- ================================
    START MAP AREA
================================= -->
<section class="map-area padding-bottom-100px">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="map-container">
          <!-- Google Map Embed -->
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7304.019564953139!2d90.37070141831094!3d23.747030564334864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33cffc3fb%3A0x4a826f475fd312af!2sDhanmondi%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1764975070806!5m2!1sen!2sbd" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- end map-area -->
    <!-- ================================
    END MAP AREA
================================= -->
@endsection

@push('css')

@endpush
