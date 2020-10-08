<!-- The Modal -->
<div class="modal fullscreen-md" id="whatsapp-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Personal Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="name" class="form-control" placeholder="Enter Name" id="name" v-model="name">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text btn btn-link bg-white border-right-0 text-dark">+88</span>
                        </div>
                        <input type="text" class="form-control" placeholder="phone" id="phone" name="phone" v-model="phone" @keyup="isPhoneValid" :disabled="otp_sent">
                        <div class="input-group-append">
                            <a class="input-group-text btn btn-link bg-white border-left-0 text-success" href="#" v-if="isPhoneValid() && !otp_sent" @click.prevent="sendOtp">Verify Now</a>
                            <span class="input-group-text btn bg-white border-left-0 text-secondary" v-else-if="!otp_sent">Invalid</span>
                            <a class="input-group-text btn bg-white border-left-0 text-danger" href="#" v-else>@{{ countDown }}</a>
                        </div>
                    </div>
                </div>
                <div class="form-group" v-if="otp_sent">
                    <label for="demo">OTP:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="OTP" id="otp" name="otp" v-model="otp">
                        <div class="input-group-append">
                            <span class="input-group-text btn bg-white border-left-0 text-secondary" v-if="otp_sent && !otp_error"><i class="fa fa-spinner fa-spin"></i></span>
                            <a class="input-group-text btn bg-white border-left-0 text-danger" href="#" v-else-if="otp_error">Wrong OTP</a>
                        </div>
                    </div>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="terms" name="terms" v-model="terms">
                    <label class="custom-control-label" for="terms">I agree to the <a class="btn btn-link text-primary py-0" href="#">Terms of Service</a> and <a class="btn btn-link text-primary py-0" href="#">Privacy Policy</a></label>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" v-if="name && phone && otp_sent && terms">
                <a class="btn red border" href="#" @click.prevent="verifyOtp">See Seller Details</a>
            </div>

        </div>
    </div>
</div>