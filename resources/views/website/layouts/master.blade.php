<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="TechyDevs" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
      rel="stylesheet"
    />

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animated-headline.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

    <!-- Analytics -->
    @if(!empty($ws->google_analytics_code)){!! $ws->google_analytics_code !!}@endif
    @if(!empty($ws->google_search_console)){!! $ws->google_search_console !!}@endif
    @if(!empty($ws->facebook_pixel_code)){!! $ws->facebook_pixel_code !!}@endif
    @stack('css')
  </head>
  <body>
    <!-- start cssload-loader -->
    <div class="preloader" id="preloader">
      <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
          <circle
            class="path"
            cx="25"
            cy="25"
            r="20"
            fill="none"
            stroke-width="5"
          ></circle>
        </svg>
      </div>
    </div>
    <!-- end cssload-loader -->

    <!-- ================================
            START HEADER AREA
================================= -->
    @include('website.layouts.header')
    <!-- ================================
         END HEADER AREA
================================= -->
    @yield('content')

    <!-- ================================
       START FOOTER AREA
================================= -->
    @include('website.layouts.footer')

    <!-- end footer-area -->
    <!-- ================================
       START FOOTER AREA
================================= -->

    <!-- start back-to-top -->
    <div id="back-to-top">
      <i class="la la-angle-up" title="Go top"></i>
    </div>
    <!-- end back-to-top -->

    <!-- end modal-shared -->
    <div class="modal-popup">
      <div
        class="modal fade"
        id="signupPopupForm"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div>
                <h5 class="modal-title title" id="exampleModalLongTitle">
                  Sign Up
                </h5>
                <p class="font-size-14">Hello! Welcome Create a New Account</p>
              </div>
              <button
                type="button"
                class="btn-close close"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true" class="la la-close"></span>
              </button>
            </div>
            <div class="modal-body">
              <div class="contact-form-action">
                <form method="post">
                  <div class="input-box">
                    <label class="label-text">Username</label>
                    <div class="form-group">
                      <span class="la la-user form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type your username"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Email Address</label>
                    <div class="form-group">
                      <span class="la la-envelope form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type your email"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Password</label>
                    <div class="form-group">
                      <span class="la la-lock form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type password"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Repeat Password</label>
                    <div class="form-group">
                      <span class="la la-lock form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="text"
                        placeholder="Type again password"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="btn-box pt-3 pb-4">
                    <button type="button" class="theme-btn w-100">
                      Register Account
                    </button>
                  </div>
                  <div class="action-box text-center">
                    <p class="font-size-14">Or Sign up Using</p>
                    <ul class="social-profile py-3">
                      <li>
                        <a href="#" class="bg-5 text-white"
                          ><i class="lab la-facebook-f"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-6 text-white"
                          ><i class="lab la-twitter"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-7 text-white"
                          ><i class="lab la-instagram"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-5 text-white"
                          ><i class="lab la-linkedin-in"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </form>
              </div>
              <!-- end contact-form-action -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal-popup -->

    <!-- end modal-shared -->
    <div class="modal-popup">
      <div
        class="modal fade"
        id="loginPopupForm"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div>
                <h5 class="modal-title title" id="exampleModalLongTitle2">
                  Login
                </h5>
                <p class="font-size-14">Hello! Welcome to your account</p>
              </div>
              <button
                type="button"
                class="btn-close close"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true" class="la la-close"></span>
              </button>
            </div>
            <div class="modal-body">
              <div class="contact-form-action">
                <form method="post" action="/login" id="loginForm">
                  @csrf
                  <div id="loginErrorMessage" class="alert alert-danger" style="display: none;"></div>
                  <div class="input-box">
                    <label class="label-text">Username</label>
                    <div class="form-group">
                      <span class="la la-user form-icon"></span>
                      <input
                        class="form-control"
                        type="text"
                        name="email"
                        placeholder="Type your username"
                      />
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="input-box">
                    <label class="label-text">Password</label>
                    <div class="form-group mb-2">
                      <span class="la la-lock form-icon"></span>
                      <input
                        class="form-control"
                        type="password"
                        name="password"
                        placeholder="Type your password"
                      />
                    </div>
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <div class="custom-checkbox mb-0">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="rememberchb"
                        />
                        <label for="rememberchb">Remember me</label>
                      </div>
                      <p class="forgot-password">
                        <a href="recover.html">Forgot Password?</a>
                      </p>
                    </div>
                  </div>
                  <!-- end input-box -->
                  <div class="btn-box pt-3 pb-4">
                    <button type="submit" class="theme-btn w-100">
                      Login Account
                    </button>
                  </div>
                  <div class="action-box text-center">
                    <p class="font-size-14">Or Login Using</p>
                    <ul class="social-profile py-3">
                      <li>
                        <a href="#" class="bg-5 text-white"
                          ><i class="lab la-facebook-f"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-6 text-white"
                          ><i class="lab la-twitter"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-7 text-white"
                          ><i class="lab la-instagram"></i
                        ></a>
                      </li>
                      <li>
                        <a href="#" class="bg-5 text-white"
                          ><i class="lab la-linkedin-in"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </form>
              </div>
              <!-- end contact-form-action -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal-popup -->

    <!-- Template JS Files -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>




    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>

    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countTo.min.js') }}"></script>
    <script src="{{ asset('frontend/js/animated-headline.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ripples-min.js') }}"></script>
    <script src="{{ asset('frontend/js/quantity-input.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                $('#loginErrorMessage').hide().html(''); // Clear previous errors

                var formData = $(this).serialize(); // Get form data

                $.ajax({
                    url: $(this).attr('action'), // /login
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Laravel CSRF token
                    },
                    success: function(response) {
                        // On success, reload the page or redirect
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) { // Validation errors
                            var errors = xhr.responseJSON.errors;
                            var errorHtml = '<ul>';
                            $.each(errors, function(key, value) {
                                errorHtml += '<li>' + value[0] + '</li>';
                            });
                            errorHtml += '</ul>';
                            $('#loginErrorMessage').html(errorHtml).show();
                        } else if (xhr.status === 401) { // Unauthorized (e.g., bad credentials)
                            $('#loginErrorMessage').html('<ul><li>' + xhr.responseJSON.message + '</li></ul>').show();
                        } else {
                            $('#loginErrorMessage').html('<ul><li>An unexpected error occurred. Please try again.</li></ul>').show();
                        }
                    }
                });
            });
        });
    </script>

  </body>
</html>
