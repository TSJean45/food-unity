<body>
    <div class="modal-header">
        <h5 class="modal-title">Add New Ticket</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="" method="POST">
            <h4 class="text-center form-section-title">Restaurant's Detail</h4>
            <div class="shape form-shape"></div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="restaurantName" class="form-input-title"><b>Restaurant Name</b></label>
                    <input type="text" class="form-control" name="restaurantName" required>
                    <div class="invalid-feedback">
                        Please provide a valid restaurant name.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="restaurantPax" class="form-input-title"><b>Estimated pax?</b></label>
                    <input type="text" class="form-control" name="restaurantPax" placeholder="20-30" required>
                    <div class="invalid-feedback">
                        Please provide a valid range.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="restaurantDate" class="form-input-title"><b>Date</b></label>
                    <input type="date" class="form-control" name="restaurantDate" min="<?php echo date("Y-m-d"); ?>" required>
                    <div class="invalid-feedback">
                        Please provide a valid date.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="restaurantTime" class="form-input-title"><b>What time will the campaign end?</b></label>
                    <input type="time" class="form-control" name="restaurantTime" required>
                    <div class="invalid-feedback">
                        Please provide a valid time.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="restaurantNote" class="form-input-title"><b>Note (Optional)</b></label>
                    <textarea class="form-control" name="restaurantNote" placeholder="Enter notes that is important to clarify to the public."></textarea>

                    <div class="invalid-feedback">
                        Please provide a valid range.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="restaurantAddress" class="form-input-title"><b>Restaurant Address</b></label>
                    <input type="text" class="form-control" id="restaurantAddress" name="restaurantAddress" required>
                    <div class="invalid-feedback">
                        Please provide a valid address.
                    </div>
                    <div id="map2"></div>
                    <input type="hidden" class="form-control" id="restaurantLat" name="restaurantLat">
                    <input type="hidden" class="form-control" id="restaurantLong" name="restaurantLong">
                </div>
            </div>
            <h4 class="text-center form-section-title">Restaurant Staff's Detail</h4>
            <div class="shape form-shape"></div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="submitterName" class="form-input-title"><b>Name</b></label>
                    <input type="text" class="form-control" name="submitterName" required>
                    <div class="invalid-feedback">
                        Please provide a valid name.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="submitterNumber" class="form-input-title"><b>Phone Number</b></label>
                    <input type="tel" class="form-control" name="submitterNumber" placeholder="01234398454" required>
                    <div class="invalid-feedback">
                        Please provide a valid phone number.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="submitterDesignation" class="form-input-title"><b>Designation</b></label>
                    <input type="text" class="form-control" name="submitterDesignation" required>
                    <div class="invalid-feedback">
                        Please provide a valid designation.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="submitterPassword" class="form-input-title"><b>Password</b></label>
                    <input type="password" class="form-control" name="submitterPassword" required>
                    <small id="passwordHelp" class="form-text text-muted">Password is important to end or edit the campaign.</small>
                    <div class="invalid-feedback">
                        Please provide a valid password.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="submitTicket">Submit Food Unity Campaign Ticket</button>
            </div>
        </form>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCwx_fIF6BS-yIhlmZWVDyubiZVQQQj3TU&callback=initMap" async defer></script>



</body>