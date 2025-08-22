<!-- Demo Booking Modal -->
<div id="demo-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content py-4">
            <div class="px-3">
                <div class="col-12 d-flex justify-content-end d-lg-none">
                    <i class="fas fa-times" data-dismiss="modal" aria-label="Close"></i>
                </div>
            </div>
            <div class="modal-header text-center text-black">
                <div class="col-12">
                    <h4 class="px-lg-6">
                        Book Your Free Demo
                    </h4>
                    <p class="text-muted">Schedule a personalised demonstration of our HSE reporting platform</p>
                </div>
            </div>
            <div class="modal-body">
                <form id="demo-form" class="px-4">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="demo-name" class="form-label font-weight-bold">Full Name *</label>
                            <input type="text" class="form-control" id="demo-name" name="name" required
                                placeholder="Enter your full name">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="demo-email" class="form-label font-weight-bold">Email Address *</label>
                            <input type="email" class="form-control" id="demo-email" name="email" required
                                placeholder="Enter your email address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="demo-phone" class="form-label font-weight-bold">Phone Number *</label>
                            <input type="tel" class="form-control" id="demo-phone" name="phone" required
                                placeholder="Enter your phone number">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="demo-date" class="form-label font-weight-bold">Preferred Date *</label>
                            <input type="date" class="form-control" id="demo-date" name="preferred_date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                            <label for="demo-time" class="form-label font-weight-bold">Preferred Time *</label>
                            <select class="form-control" id="demo-time" name="preferred_time" required>
                                <option value="">Select a time</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">01:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                                <option value="17:00">05:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <div id="demo-form-messages"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5" id="demo-submit-btn">
                            <span class="btn-text">Schedule Demo</span>
                            <span class="btn-spinner d-none">
                                <i class="fas fa-spinner fa-spin mr-2"></i>Scheduling...
                            </span>
                        </button>
                    </div>

                    <p class="text-center text-muted mt-3 small">
                        We'll contact you within 24 hours to confirm your demo appointment.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>