    <section class="footer-area section-bg padding-top-100px padding-bottom-30px">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <div class="footer-logo padding-bottom-30px">
                <a href="{{ route('home') }}" class="foot__logo"
                  ><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"
                /></a>
              </div>
              <!-- end logo -->
              <p class="footer__desc">
                Flytrust International is not just a travel agency — we are your trusted partner in exploring the world with comfort, safety, and confidence. 
              </p>

            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              >
                Company
              </h4>
              <ul class="list-items pt-3">
                <li>Flytrust International</li>
                <li>📞 +8801775668424, +8801937994722</li>
                <li>📧 flytrustinternational@gmail.com</li>
                <li>🌐 www.flytrustint.com</li>
                <li>
                  Suit-321 (2nd Floor), Rupayan Center, <br />
                  Mohakhali C/A, Dhaka-1212
                </li>
              </ul>
            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              >
                Other Links
              </h4>
              <ul class="list-items list--items">
                <li><a href="{{ route('about') }}">About us</a></li>
                <li><a href="{{ route('service') }}">Services</a></li>
              </ul>
            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              >
                Subscribe now
              </h4>
              <p class="footer__desc pb-3">
                Subscribe for latest updates & promotions
              </p>
              <div class="contact-form-action">
                <form action="#">
                  <div class="input-box">
                    <label class="label-text">Enter email address</label>
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
                        Go
                      </button>
                      <span class="font-size-14 pt-1"
                        ><i class="la la-lock me-1"></i>Your information is safe
                        with us.</span
                      >
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
        </div>
        <!-- end row -->
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="term-box footer-item">
              <ul class="list-items list--items d-flex align-items-center">
                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                {{--<li><a href="{{ route('privacypolicy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('supportpolicy') }}">Refund & Cancellation</a></li>--}}
              </ul>
            </div>
          </div>
          <!-- end col-lg-8 -->
          <div class="col-lg-4">
            <div class="footer-social-box text-end">
              <ul class="social-profile">
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
          <!-- end col-lg-4 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
      <div class="section-block mt-4"></div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="copy-right padding-top-30px">
              <p class="copy__desc">
                &copy; Copyright FLYTRUST <span id="get-year"></span> . Made with
                <span class="la la-heart"></span> by
                <a href="#"
                  >Phenexsoft</a
                >
              </p>
            </div>
            <!-- end copy-right -->
          </div>
          <!-- end col-lg-7 -->
          <div class="col-lg-5">
            <div
              class="copy-right-content d-flex align-items-center justify-content-end padding-top-30px"
            >
              <h3 class="title font-size-15 pe-2">We Accept</h3>
              <img src="{{ asset('frontend/images/payment-img.png') }}" alt="" />
            </div>
            <!-- end copy-right-content -->
          </div>
          <!-- end col-lg-5 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>