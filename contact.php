<?php
$page_title = "Contact Page";
include 'partials/header.php';
?>
  <main>
    <section class="section-header bg-primary text-white pb-9 pb-lg-13 mb-4 mb-lg-6">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 text-center">
            <h1 class="display-2 mb-3">Got a question?</h1>
            <p class="lead">We’re here to help! Reach out to us anytime.</p>
          </div>
        </div>
      </div>
      <div class="pattern bottom"></div>
    </section>
    <div class="section section-lg pt-0">
      <div class="container mt-n8 mt-lg-n13 z-2">
        <div class="row justify-content-center">
          <div class="col-12"><!-- Card -->
            <div class="card border-light shadow-soft p-2 p-md-4 p-lg-5">
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group"><label class="form-label text-dark" for="firstNameLabel">First Name <span
                            class="text-danger">*</span></label>
                        <div class="input-group mb-4">
                          <div class="input-group-prepend"><span class="input-group-text"><i
                                class="fas fa-user-alt"></i></span></div><input class="form-control" id="firstNameLabel"
                            name="firstName" placeholder="John" type="text" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group"><label class="form-label text-dark" for="lastNameLabel">Last Name <span
                            class="text-danger">*</span></label>
                        <div class="input-group mb-4">
                          <div class="input-group-prepend"><span class="input-group-text"><i
                                class="fas fa-user-alt"></i></span></div><input class="form-control" id="lastNameLabel"
                            name="lastName" placeholder="Doe" type="text" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group"><label class="form-label text-dark" for="EmailLabel">Email <span
                            class="text-danger">*</span></label>
                        <div class="input-group mb-4">
                          <div class="input-group-prepend"><span class="input-group-text"><i
                                class="fas fa-envelope"></i></span></div><input class="form-control" id="EmailLabel"
                            name="email" placeholder="example@company.com" type="email" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group"><label class="form-label text-dark" for="phonenumberLabel">Phone
                          Number<span class="text-danger">*</span></label>
                        <div class="input-group mb-4">
                          <div class="input-group-prepend"><span class="input-group-text"><i
                                class="fas fa-phone-square-alt"></i></span></div><input class="form-control"
                            id="phonenumberLabel" name="phone" placeholder="07012 345678" type="tel" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 mt-4">
                      <div class="form-group"><label class="form-label text-dark" for="phonenumberLabel">How can we help
                          you?<span class="text-danger">*</span></label> <textarea class="form-control" name="message"
                          placeholder="Hi OACEC, I would like to ..." id="message-2" rows="8" required></textarea>
                      </div>
                      <!-- reCAPTCHA -->

                      <div class="text-center"><button type="submit" class="btn btn-secondary mt-4 animate-up-2"><span
                            class="mr-2"><i class="fas fa-paper-plane"></i></span>Send Message</button></div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-lg pt-0 line-bottom-light">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3 text-center px-4 mb-5 mb-lg-0">
            <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
              <i class="fas fa-envelope-open-text"></i>
            </div>
            <h5 class="mb-3">Email us</h5>
            <p>For general inquiries, please reach out to us via email.</p><a class="font-weight-bold text-primary"
              href="#"><span class="__cf_email__"
                data-cfemail="670801010e04022704080a1706091e4904080a">[email&#160;protected]</span></a>
          </div>
          <div class="col-12 col-md-3 text-center px-4 mb-5 mb-lg-0">
            <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
              <i class="fas fa-phone-volume"></i>
            </div>
            <h5 class="mb-3">Call us </h5>
            <p>Call us to speak to a member of our team. We are always happy to help you.</p><a
              class="font-weight-bold text-primary" href="#">07939 399669</a>
          </div>
          <div class="col-12 col-md-3 text-center px-4 mb-5 mb-lg-0">
            <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
              <i class="fas fa-location-arrow"></i>
            </div>
            <h5 class="mb-3">Visit us at</h5>
            <p>Suite 3 Floor Ten <br> Union Point, Blaikie's Quay <br> Aberdeen, AB11 5PW <br> Scotland</p>
          </div>
          <div class="col-12 col-md-3 text-center px-4">
            <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4"><i class="fas fa-headset"></i></div>
            <h5 class="mb-3">Support</h5>
            <p>For technical support.</p><a class="btn btn-sm btn-outline-primary" href="#">Support Center <span
                class="fas fa-long-arrow-alt-right ml-2"></span></a>
          </div>
        </div>
      </div>
    </div>
    <section class="section section-lg bg-soft">
      <div class="container">
        <div class="row justify-content-center mb-4 mb-lg-6">
          <div class="col-12 col-lg-8 text-center">
            <h1 class="display-3 mb-4">Frequently asked questions</h1>
            <p class="lead text-gray">Here’s what you need to know about OACEC, based on the questions we
              get asked the most.</p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8"><!--Accordion-->
            <div class="accordion">
              <div class="card card-sm card-body border border-light rounded mb-3">
                <div data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse" role="button"
                  aria-expanded="false" aria-controls="panel-1"><span class="h6 mb-0">Who is the app designed
                    for?</span> <span class="icon"><i class="fas fa-angle-down"></i></span></div>
                <div class="collapse" id="panel-1">
                  <div class="pt-3">
                    <p class="mb-0">The platform is designed for offshore oil and gas operators, HSE departments, and
                      contractors who need an easy way to capture and manage safety observations.</p>
                  </div>
                </div>
              </div>
              <div class="card card-sm card-body border border-light rounded mb-3">
                <div data-target="#panel-2" class="accordion-panel-header" data-toggle="collapse" role="button"
                  aria-expanded="false" aria-controls="panel-2"><span class="h6 mb-0">Can this be used outside oil and
                    gas?</span> <span class="icon"><i class="fas fa-angle-down"></i></span></div>
                <div class="collapse" id="panel-2">
                  <div class="pt-3">
                    <p class="mb-0">Yes. While built for offshore, the system can be adapted for construction, mining,
                      or any sector with high safety reporting needs.</p>
                  </div>
                </div>
              </div>
              <div class="card card-sm card-body border border-light rounded mb-3">
                <div data-target="#panel-3" class="accordion-panel-header" data-toggle="collapse" role="button"
                  aria-expanded="false" aria-controls="panel-3"><span class="h6 mb-0">Does the app work offline?</span>
                  <span class="icon"><i class="fas fa-angle-down"></i></span>
                </div>
                <div class="collapse" id="panel-3">
                  <div class="pt-3">
                    <p class="mb-0">Yes. Crews can submit cards without a connection. Once connectivity is restored, the
                      data automatically syncs.</p>
                  </div>
                </div>
              </div>
              <div class="row mt-5 mt-lg-6">
                <div class="col text-center"><a href="faq" class="btn btn-primary animate-up-2"><span
                      class="mr-2"><i class="fas fa-question-circle"></i></span> See all FAQ</a></div>
              </div>
            </div><!--End of Accordion-->
          </div>
        </div>
      </div>
    </section>

    <!-- Demo Booking Modal -->
    <?php include 'partials/bookDemoForm.php'; ?>
    
  <!-- Footer -->
  <?php include 'partials/footer.php'; ?>

</body>

</html>