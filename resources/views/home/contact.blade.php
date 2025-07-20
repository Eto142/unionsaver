@include('home.header')    <main>
  <!-- Banner section start -->
  

<div class="map-section">
  <div class="contact-map-area">
    <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2495.4980405835827!2d-3.207795984222675!3d51.47920682210645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486e1c7a61e2e891%3A0x84b6b8fbbbd28f28!2sCanton%2C%20Cardiff%2C%20UK!5e0!3m2!1sen!2sng!4v1626796438815!5m2!1sen!2sng" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
</div>


  <!-- End Map Section -->
  
  <!-- Contact Page Section -->
  <div class="contact-page-section">
    <div class="auto-container">
      <!-- Contact Info Boxed -->
      <div class="contact-info-boxed">
        <div class="row clearfix">
          <!-- Column -->
          <div class="column col-lg-6 col-md-6 col-sm-12">
            <h2>Canton, <span>United Kingdom</span></h2>
            <div class="text">
              256 Cowbridge Road E, Cardiff CF119TN </div>
            <div class="email">
              Email:
              <a href="mailto:support@topsaverstb.online">support@topsaverstb.online</a>
            </div>
          </div>
  
          <!-- Column -->
          <div class="column col-lg-6 col-md-6 col-sm-12">
            <div class="call">
              Phone No:<br /><a href="tel:+447701423168">+447701423168</a>
            </div>
            <ul class="location-list">
    
              <li>
                <span>Work Hours:</span>Mon - Sat: 8.00 - 17.00
              </li>
            </ul>
          </div>
        </div>
      </div>
  
      <!-- Form Boxed -->
      <div class="form-boxed">
        <div class="sec-title centered">
          <div class="title">contact us</div>
          <h2>We Always Here <span>To Help You</span></h2>
        </div>
  
  
        <div class="boxed-inner">
          <!-- Contact Form -->
          <div class="contact-form">
           <div class="col-xl-12">
                        <div class="card">
                            @if (session('error'))
                            <div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
                                <b>Error!</b>{{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @elseif (session('status'))
                            <div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
                                <b>Success!</b> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @elseif (session('message'))
                            <div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
                                <b>Success!</b> {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="card-body">
                                <h4 class="card-title mb-4"></h4>
                                <form id="inter_form" action="{{ route('send.mail')}}" method="POST">
                                    @csrf

                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-3 col-form-label">Email*</label>
                                        <div class="col-sm-9">
                                            <input type="email" value="support@topsaverstb.online" class="form-control"
                                                id="bank_name" name="email" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-3 col-form-label">Subject*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="bank_name" name="subject">
                                        </div>
                                    </div>




                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-3 col-form-label">Message*</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4"
                                            name="message"></textarea>
                                    </div>


                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button id="send_pin"
                                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                                    type="submit">Send Mail</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p class="response"></p>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Detail Section -->
  <!-- Map Section -->
  <!-- <div class="map-section">
              <div class="contact-map-area">
                  <iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2689.961936781822!2d-122.34013238480624!3d47.60742979591455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906ab3cbba9c83%3A0x548849e16a192f92!2s1301%202nd%20Ave%20%232600%2C%20Seattle%2C%20WA%2098101%2C%20USA!5e0!3m2!1sen!2sng!4v1626796438815!5m2!1sen!2sng" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
          </div> -->
  <!-- End Map Section -->
  
  
  
@include('home.footer')