<?php
$page_title = "Landing Page";
include 'partials/header.php';
?>
<main>
  <!-- Hero -->
  <section class="section-header pb-11 pb-lg-13 bg-primary text-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 text-center">
          <h1 class="display-1 mb-4">
            From Deck to Desk in Seconds <br />
            Modernising HSE Reporting
          </h1>
          <p class="lead mb-5 px-lg-5">
            Safety incidents and near misses shouldn’t take days to reach
            your HSE team. Our mobile-first reporting platform captures
            observations instantly, works offline, and delivers insights in
            real time, so you can act before risks escalate.
          </p>
          <!-- Button Modal -->
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#pricing-modal">
            <span class="mr-2"><i class="fas fa-hand-pointer"></i></span>
            Start <span class="d-none d-md-inline">a 30-days</span> trial
          </button>
          <a class="btn btn-white text-primary animate-up-2 ml-3" href="#" data-toggle="modal" data-target="#demo-modal">Quick demo</a>
        </div>
      </div>
    </div>
    <div class="pattern bottom"></div>
  </section>
  <div class="section pt-0">
    <div class="container mt-n9 mt-lg-n12 z-2">
      <div class="row justify-content-center">
        <div class="col-12">
          <img src="assets/img/index-mockup.png" alt="illustration" />
        </div>
      </div>
    </div>
  </div>
  <section class="section section-lg pt-0">
    <div class="container">
      <div class="row justify-content-center mb-5 mb-lg-6">
        <div class="col-12 col-md-8 text-center">
          <h2 class="h1 font-weight-bolder mb-4">
            One Solution, Two Powerful Tools
          </h2>
          <p class="lead">
            Our platform combines a mobile app for offshore crews with a web
            dashboard for onshore or offshore HSE managers.
          </p>
        </div>
      </div>
      <div class="row mb-4 mb-lg-7">
        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0 text-center">
          <!-- Icon -->
          <div class="icon icon-shape icon-shape-primary rounded-circle">
            <i class="fas fa-mobile"></i>
          </div>
          <!-- Heading -->
          <h5 class="mt-4 mb-3">Android Mobile App</h5>
          <p class="px-0 px-sm-4 px-lg-0">
            Designed for quick, intuitive card submission, even without a
            network connection.
          </p>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0 text-center">
          <!-- Icon -->
          <div class="icon icon-shape icon-shape-primary rounded-circle">
            <i class="fas fa-chart-pie"></i>
          </div>
          <!-- Heading -->
          <h5 class="mt-4 mb-3">HSE Web Dashboard</h5>
          <p class="px-0 px-sm-4 px-lg-0">
            Review, filter, and analyse incoming reports in real time;
            export data for audits and compliance.
          </p>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0 text-center">
          <!-- Icon -->
          <div class="icon icon-shape icon-shape-primary rounded-circle">
            <i class="fas fa-shield-alt"></i>
          </div>
          <!-- Heading -->
          <h5 class="mt-4 mb-3">
            Secure Cloud Hosting or On-Prem Deployment
          </h5>
          <p class="px-0 px-sm-4 px-lg-0">
            Choose what works best for your IT and compliance needs.
          </p>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0 text-center">
          <!-- Icon -->
          <div class="icon icon-shape icon-shape-primary rounded-circle">
            <i class="fas fa-headset"></i>
          </div>
          <!-- Heading -->
          <h5 class="mt-4 mb-3">24/7 support</h5>
          <p class="px-0 px-sm-4 px-lg-0">
            Our support team is a quick chat or email away — 24 hours a day.
          </p>
        </div>
      </div>
      <div class="row justify-content-center mb-4">
        <div class="col-12">
          <div class="position-relative">
            <button type="button" class="hotspot-popover bg-primary" style="top: 35%; left: 2%" data-container="body"
              data-toggle="popover" title="Menu"
              data-content="Use this menu to navigate through the dashboard functions."></button>
            <button type="button" class="hotspot-popover bg-primary" style="top: 55%; left: 35%" data-container="body"
              data-toggle="popover" title="Stats Tracker"
              data-content="We track your submitted cards and display them in history in a handy graph."></button>
            <img class="shadow-box rounded" src="assets/img/app-platform.png" alt="App preview" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-lg bg-primary text-white">
    <div class="container">
      <div class="row row-grid align-items-center">
        <div class="col-12 col-lg-5">
          <span class="h5 text-muted font-weight-normal mb-2 d-block">Our Support</span>
          <h2 class="h1 font-weight-bolder mb-4">
            We Don’t Just Provide a Tool, We Partner in Safety
          </h2>
          <p class="lead text-muted">
            We understand that implementing new systems offshore can be
            challenging, so we make it simple. From deployment to daily use,
            we work alongside you to ensure the platform delivers measurable
            safety improvements.
          </p>
          <a href="about.html" class="btn btn-secondary mt-3 animate-up-2">View more<span class="icon icon-xs ml-2"><i
                class="fas fa-arrow-right"></i></span></a>
        </div>
        <div class="col-12 col-lg-6 ml-lg-auto">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="card bg-white shadow-soft text-primary rounded mb-4">
                <div class="px-3 px-lg-4 py-5 text-center">
                  <span class="icon icon-lg mb-4"><i class="fas fa-clipboard-list"></i></span>
                  <h5 class="font-weight-normal text-primary">
                    Onboarding & Training
                  </h5>
                  <p>
                    Hands-on training for crews and HSE teams, in person or
                    online.
                  </p>
                </div>
              </div>
              <div class="card bg-white shadow-soft text-primary rounded mb-4">
                <div class="px-3 px-lg-4 py-5 text-center">
                  <span class="icon icon-lg mb-4"><i class="fas fa-headset"></i></span>
                  <h5 class="font-weight-normal text-primary">
                    24/7 Support
                  </h5>
                  <p>
                    Reach our support team anytime via phone, email, or
                    chat.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 pt-lg-5">
              <div class="card bg-white shadow-soft text-primary rounded mb-4">
                <div class="px-3 px-lg-4 py-5 text-center">
                  <span class="icon icon-lg mb-4"><i class="fas fa-plug"></i></span>
                  <h5 class="font-weight-normal text-primary">
                    Integration Services
                  </h5>
                  <p>Connect the platform to your existing systems.</p>
                </div>
              </div>
              <div class="card bg-white shadow-soft text-primary rounded mb-4">
                <div class="px-3 px-lg-4 py-5 text-center">
                  <span class="icon icon-lg mb-4"><i class="fas fa-palette"></i></span>
                  <h5 class="font-weight-normal text-primary">
                    Customisation
                  </h5>
                  <p>
                    Tailor forms, workflows, and analytics to your
                    operations
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section section-lg line-bottom-light">
    <div class="container">
      <div class="row justify-content-center mb-4 mb-lg-6">
        <div class="col-12 text-center">
          <h1 class="display-3 mb-3 mb-lg-4">
            Safety Reporting Without the Wait
          </h1>
          <p class="lead">
            Everything You Need for Safer and Smarter Reporting.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <!-- Tab -->
          <nav>
            <div
              class="nav nav-tabs flex-column flex-md-row bg-white shadow-soft border border-light justify-content-around rounded mb-lg-3 py-3"
              id="nav-tab" role="tablist">
              <a class="nav-item nav-link rounded mr-md-3 active" id="nav-field-reporting-tab" data-toggle="tab"
                href="#nav-field-reporting" role="tab" aria-controls="nav-field-reporting" aria-selected="true"><span
                  class="d-block"><i class="fas fa-file-alt"></i><span class="font-weight-normal">
                    Field Reporting</span></span></a>
              <a class="nav-item nav-link rounded mr-md-3" id="nav-data-management-tab" data-toggle="tab"
                href="#nav-data-management" role="tab" aria-controls="nav-data-management" aria-selected="false"><i
                  class="fas fa-chart-line"></i><span class="font-weight-normal">Data Management</span></a>
              <a class="nav-item nav-link rounded mr-md-3" id="nav-analysis-insights-tab" data-toggle="tab"
                href="#nav-analysis-insights" role="tab" aria-controls="nav-analysis-insights"
                aria-selected="false"><i class="far fa-bell"></i><span class="font-weight-normal">Analysis &
                  Insights</span></a>
              <a class="nav-item nav-link rounded mr-md-3" id="nav-compliance-support-tab" data-toggle="tab"
                href="#nav-compliance-support" role="tab" aria-controls="nav-compliance-support"
                aria-selected="false"><i class="fas fa-balance-scale"></i><span class="font-weight-normal">Compliance
                  Support</span></a>
            </div>
          </nav>
          <!-- Tab -->
          <div class="tab-content mt-5 mt-lg-6" id="nav-tabContent">
            <!-- Content Research Tab -->
            <div class="tab-pane fade show active" id="nav-field-reporting" role="tabpanel"
              aria-labelledby="nav-field-reporting-tab">
              <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-5">
                  <h3 class="mb-4">Field Reporting</h3>
                  <p>
                    Designed for speed and simplicity, ensuring crews can
                    record observations in less than three minute. Whether it’s
                    a STOP card, a near miss, or a routine observation,
                    every entry is clear, structured, and standardised. And
                    we took a further step to make reporting even easier by
                    allowing users to attach photos, providing richer
                    context for HSE teams reviewing incidents later.
                  </p>
                  <p>
                    Offshore teams in areas with weak or no connectivity can
                    still report incidents. Our mobile app works fully
                    offline, allowing crews to submit cards without a
                    network. All submissions are securely stored on the
                    device and automatically synced when a network is
                    available, ensuring no lost data and no delays.
                  </p>
                </div>
                <div class="col-12 col-md-6">
                  <img class="shadow rounded" src="assets/img/mobile-app-preview.png" alt="Mobile App Preview" />
                </div>
              </div>
            </div>
            <!-- Causes Tab -->
            <div class="tab-pane fade" id="nav-data-management" role="tabpanel"
              aria-labelledby="nav-data-management-tab">
              <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-5">
                  <h3 class="mb-4">Data Management</h3>
                  <p>
                    Our system ensures all submissions are stored securely,
                    with role-based access to protect sensitive information
                    while allowing the right people to see the right data.
                  </p>
                  <p>
                    Automatic audit logs track every submission and every
                    change, giving you a defensible trail for compliance
                    audits or investigations. This makes it easy to
                    demonstrate accountability during regulatory inspections
                    or internal reviews. We also know that every
                    organisation has its own processes. That’s why our forms
                    are fully customisable. Whether you need to mirror
                    existing paper cards, add company-specific fields, or
                    adapt to new safety initiatives.
                  </p>
                </div>
                <div class="col-12 col-md-6">
                  <img class="shadow rounded" src="assets/img/data-management.png" alt="Data Management Preview" />
                </div>
              </div>
            </div>
            <!-- Effects Tab -->
            <div class="tab-pane fade" id="nav-analysis-insights" role="tabpanel"
              aria-labelledby="nav-analysis-insights-tab">
              <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-5">
                  <h3 class="mb-4">Analysis & Insights</h3>
                  <p>
                    Our web dashboard transforms raw submissions into
                    real-time insights. Custom dashboards highlight emerging
                    trends, hotspots, and recurring risks so HSE managers
                    can prioritise proactive action before issues escalate.
                    Built-in filters allow teams to slice data by date, rig,
                    location, incident type, or even by individual
                    submitter. This makes it easy to identify problem areas
                    or track improvements over time.
                  </p>
                  <p>
                    For deeper analysis or corporate reporting, data can be
                    exported in multiple formats, including CSV, Excel, and
                    PDF, making integration with other systems or
                    presentations straightforward.
                  </p>
                </div>
                <div class="col-12 col-md-6">
                  <img class="shadow rounded" src="assets/img/analysis-insights.png"
                    alt="Analysis & Insights Preview" />
                </div>
              </div>
            </div>
            <!-- Effects Tab -->
            <div class="tab-pane fade" id="nav-compliance-support" role="tabpanel"
              aria-labelledby="nav-compliance-support-tab">
              <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-5">
                  <h3 class="mb-4">Compliance Support</h3>
                  <p>
                    Our platform is designed to help you meet those
                    obligations with confidence.
                  </p>
                  <p>
                    It supports the requirements of the UK Offshore Safety
                    Directive, provides structure for Safety Case Reporting
                    (SCR), and aligns with RIDDOR reporting obligations. The
                    system automatically preserves audit trails, timestamps,
                    and complete data histories, ensuring that nothing is
                    lost and everything can be substantiated during an
                    investigation.
                  </p>
                </div>
                <!-- <div class="col-12 col-md-6">
                    <img class="shadow rounded" src="../assets/img/compliance-support.png" alt="Preview" />
                  </div> -->
              </div>
            </div>
          </div>
          <!-- End of tab -->
        </div>
      </div>
    </div>
  </section>

  <section class="section section-lg pb-5 bg-soft">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2 class="mb-4">Ready to Transform Safety Reporting?</h2>
          <p class="lead mb-5">
            Join offshore operators who are replacing slow, manual HSE
            reporting with instant, actionable insights. <br />
            <span class="font-weight-bolder">Try the platform with zero risk.</span>
            Start your pilot today.
          </p>
        </div>
        <div class="col-12 text-center">
          <!-- Button Modal -->
          <button class="btn btn-secondary animate-up-2" data-toggle="modal" data-target=".pricing-modal">
            <span class="mr-2"><i class="fas fa-hand-pointer"></i></span>Start 30-days trial
          </button>
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