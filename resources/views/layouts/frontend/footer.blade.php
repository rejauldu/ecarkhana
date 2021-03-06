<!--=================================footer -->

<footer class="footer bg-2 bg-overlay-black-90" @if(isset($type) && ($type == 'Motorcycle' || $type == 'Bicycle')) style="background-image: url({{ url('/') }}/images/bike/bike-title.jpg);" @endif>
    <div class="container text-light">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <h6 class="text-white mb-1">About</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="#" onclick="window.location='{{ route('about-us') }}'">About Us</a></li>
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="#" onclick="window.location='{{ route('faq') }}'">FAQs</a></li>
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="#" onclick="window.location='{{ route('term-and-condition') }}'">Terms of Services</a></li>
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><span class="text-light-secondary cursor-pointer" data-toggle="modal" data-target="#advertise-with-us">Advertising with us</span></li>
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="#" onclick="window.location='{{ route('privacy-policy') }}'">Privacy Policy</a></li>
                    @mobile
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><span class="text-light-secondary cursor-pointer" data-toggle="modal" data-target="#signupform">Be a partner with us</span></li>
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="#" onclick="window.location='{{ route('promotion') }}'">Promotion</a></li>
                    @endmobile
                </ul>
            </div>
            @computer
            <div class="col-12 col-sm-6 col-md-4">
                <h6 class="text-white mb-1">Subscribe to our newsletter</h6>
                <form class="d-block" action="{{ route('subscriptions.store') }}" method="post">
                    @csrf
                    <input type="email" placeholder="Enter your Email" class="form-control mb-2 py-0 height-30">
                    <input type="submit" class="button red" value="Subscribe" />
                </form>
                <h6 class="text-white mb-1 mt-2">Others</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><span class="text-light-secondary cursor-pointer" data-toggle="modal" data-target="#signupform">Be a partner with us</span></li>
                    <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="#" onclick="window.location='{{ route('promotion') }}'">Promotion</a></li>
                </ul>
            </div>
            @endcomputer
            <div class="col-12 col-sm-6 col-md-4">
                <h6 class="text-white mb-1">Connect with us</h6>
                <div class="row">
                    <div class="col-2">
                        <a href="https://facebook.com/ecarkhana" class="rounded-circle bg-facebook d-inline-block text-center btn width-40 height-40 p-0"><i class="fa fa-facebook text-white font-weight-bold line-height-40"></i></a>
                    </div>
                    <div class="col-2">
                        <a href="https://youtube.com/ecarkhana" class="rounded-circle bg-youtube d-inline-block text-center btn width-40 height-40 p-0"><i class="fa fa-youtube text-white font-weight-bold line-height-40"></i></a>
                    </div>
                    <div class="col-2">
                        <a href="https://twitter.com/ecarkhana" class="rounded-circle bg-twitter d-inline-block text-center btn width-40 height-40 p-0"><i class="fa fa-twitter text-white font-weight-bold line-height-40"></i></a>
                    </div>
                    <div class="col-2">
                        <a href="https://linkedin.com/ecarkhana" class="rounded-circle bg-linkedin d-inline-block text-center btn width-40 height-40 p-0"><i class="fa fa-linkedin text-white font-weight-bold line-height-40"></i></a>
                    </div>
                    <div class="col-2">
                        <a href="https://instagram.com/ecarkhana" class="rounded-circle bg-instagram d-inline-block text-center btn width-40 height-40 p-0"><i class="fa fa-instagram text-white font-weight-bold line-height-40"></i></a>
                    </div>
                    @computer
                    <div class="col-12 pt-3">
                        <h6 class="text-white mb-1">Contact</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="https://www.google.com/maps/@{lat},{long},{zoom}z"><i class="fa fa-map-marker"></i>220E Front St. Burlington NC 27215</a></li>
                            <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="tel:{{ env('PHONE_CONTACT_US') }}"><i class="fa fa-phone"></i><span> {{ env('PHONE_CONTACT_US') }}</span></a></li>
                            <li class="list-group-item border-0 py-0 pl-0 bg-transparent"><a class="text-light-secondary" href="mailto:{{ env('MAIL_CONTACT_US') }}"><i class="fa fa-envelope-o"></i><span> {{ env('MAIL_CONTACT_US') }}</span></a></li>
                        </ul>
                    </div>
                    @endcomputer
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="text-center">
                    <p class="text-secondary">©Copyright {{ date('Y') }} E-CarKhana Developed by <a href="http://www.storerepublic.com" target="_blank"><span style="color:#009900"> Store</span><span style="color:#1363C6"> Republic</span></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--=================================
footer -->

<!--=================================
back to top -->

<div class="car-top">
    <span><img src="{{ url('/') }}/images/{{ $type ?? 'Car' }}-to-top.png" alt=""></span>
</div>

<!--=================================
back to top -->


<!--Login-Form -->
<div class="modal fade" id="loginform">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center w-100">Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row login_wrap">
                    <div class="col-md-6 col-sm-12">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Username or Email address*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password*">
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-block">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h6 class="gray_text">Login the Quick Way</h6>
                        <a href="#" class="btn btn-block facebook-btn"><i class="fa fa-facebook-square"
                                                                          aria-hidden="true"></i> Login with Facebook</a>
                        <a href="#" class="btn btn-block googleplus-btn"><i class="fa fa-google"
                                                                            aria-hidden="true"></i> Login with Google</a>
                    </div>
                    <div class="mid_divider"></div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal" class="btn btn-link m-0">Signup Here</a></p>
                <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
            </div>
        </div>
    </div>
</div>
<!--/Login-Form -->

<!--Register-Form -->
<div class="modal fade" id="signupform">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Sign Up</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row signup_wrap">
                    <div class="col-md-6 col-sm-12">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <div class="select">
                                    <select name="user_type_id" class="form-control" required>
                                        <option value="1">General User</option>
                                        <option value="2">Eshowroom</option>
                                        <option value="3">National Distributor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" name="terms_agree" id="terms_agree" required>
                                <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign Up" class="btn btn-block">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h6 class="gray_text">Login the Quick Way</h6>
                        <a href="#" class="btn btn-block facebook-btn"><i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook</a>
                        <a href="#" class="btn btn-block googleplus-btn"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</a>
                    </div>
                    <div class="mid_divider"></div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
            </div>
        </div>
    </div>
</div>
<!--/Register-Form -->

<!--Forgot-password-Form -->
<div class="modal fade" id="forgotpassword">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Password Recovery</h3>
            </div>
            <div class="modal-body">
                <div class="row forgotpassword_wrap">
                    <div class="col-md-12">
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email address*">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Reset My Password" class="btn btn-block">
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="gray_text">For security reasons we don't store your password. Your password will be reset and a new one will be send.</p>
                            <p><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Forgot-password-Form -->
<!--what a new -->
<div class="modal fade" id="what-a-new">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">What a New</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="wht-new-list">
                            <li class="unordered-list-item"><span class="text-gray-darker size-16 align-middle">Some previously optional advanced safety features are now standard</span></li>
                            <li class="unordered-list-item"><span class="text-gray-darker size-16 align-middle">A minor shuffling of standard and available features</span></li>
                            <li class="unordered-list-item"><span class="text-gray-darker size-16 align-middle">Part of the first Kona generation introduced for 2018</span></li>
                        </ul>
                        <div class="p">
                            <p>Pros & Cons</p>
                            <ul class="mb-1 list-unstyled">
                                <li class="unordered-list-item pro-con-li pl-2"><span class="text-gray-darker size-16 align-middle"><i class="fa fa-check"></i>Optional turbocharged engine provides quick acceleration</span></li>
                                <li class="unordered-list-item pro-con-li pl-2"><span class="text-gray-darker size-16 align-middle"><i class="fa fa-check"></i>Nimble handling makes it enjoyable to drive</span></li>
                                <li class="unordered-list-item pro-con-li pl-2"><span class="text-gray-darker size-16 align-middle"><i class="fa fa-check"></i>Lots of features for your money</span></li>
                                <li class="unordered-list-item pro-con-li pl-2"><span class="text-gray-darker size-16 align-middle"><i class="fa fa-times"></i>Weak base engine</span></li>
                                <li class="unordered-list-item pro-con-li pl-2"><span class="text-gray-darker size-16 align-middle"><i class="fa fa-times"></i>Gear shifts from the turbocharged engine's transmission are often unrefined</span></li>
                                <li class="unordered-list-item pro-con-li pl-2"><span class="text-gray-darker size-16 align-middle"><i class="fa fa-times"></i>Interior is trimmed with a lot of hard plastic panels</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="advertise-with-us">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Advertise With Us</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body text-justify">
                Ecarkhana is the right platform to reach out to your customers. We ensure that your advertising messages reach the relevant customer in the right way.<br/>
                For any advertising options and corporate tie-ups, you may contact us at the below details:
                <ul class="list-group text-left mt-3">
                    <li class="list-group-item border-0 py-0 pl-0"><a class="text-dark" href="https://www.google.com/maps/@{lat},{long},{zoom}z"><i class="fa fa-map-marker"></i> 220E Front St. Burlington NC 27215</a></li>
                    <li class="list-group-item border-0 py-0 pl-0"><a class="text-dark" href="tel:{{ env('PHONE_CONTACT_US') }}"><i class="fa fa-phone"></i><span> {{ env('PHONE_CONTACT_US') }}</span></a></li>
                    <li class="list-group-item border-0 py-0 pl-0"><a class="text-dark" href="mailto:{{ env('MAIL_CONTACT_US') }}"><i class="fa fa-envelope-o"></i><span> {{ env('MAIL_CONTACT_US') }}</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--/what a new -Form -->
@auth
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<form id="delete-form" action="#" method="POST" style="display: none;">
    @csrf
    @delete
</form>
@endauth
<form action="{{ route('compare-product') }}" id="compare-product-form" method="post">
    @csrf
    <input type="hidden" name="products[]" id="compare-product-0" value="" />
    <input type="hidden" name="products[]" id="compare-product-1" value="" />
    <input type="hidden" name="products[]" id="compare-product-2" value="" />
</form>
<!-- Default Success Modal called from JavaScript -->
<div class="modal fade" id="success-modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-success">
                Updated successfully
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- Default Success Modal called from JavaScript -->
<div class="modal fade" id="error-modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Error</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-danger">
                Error! Update error. Please try again.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Smooth Scroll -->
<script src="{{ asset('js/smooth-scroll.js') }}"></script>
<!-- owl-carousel -->
<script type="text/javascript" src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
<!-- slick -->
<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>

<!-- Swiper -->
<script type="text/javascript" src="{{ asset('js/swiper.jquery.js') }}"></script>
<script type="text/javascript " src="{{ asset('js/jquery.ripples-min.js ') }}"></script>


<!-- revolution -->
<script type="text/javascript" src="{{ asset('js/revolution/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution/extensions/revolution.extension.video.min.js') }}"></script>

<!-- custom -->
<script type="text/javascript" src="{{ asset('js/custom.js') }}?20"></script>
@yield('script')
<script src="{{ asset('js/theme.js') }}" defer></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
(function () {
    var checkboxes;
    checkboxes = document.getElementsByClassName("compare-checkbox");
    for (let i = 0; i < checkboxes.length; i++) {
        attachEventListener(checkboxes[i]);
    }
})();
function attachEventListener(c) {
    c.addEventListener('change', function () {
        if (this.checked) {
            if (!sessionStorage.compare_count)
                sessionStorage.compare_count = 0;
            sessionStorage.compare_count = Number(sessionStorage.compare_count) + 1;
            var total = pushToCompare(this.getAttribute("product-id"));
            if (total.length > 2) {
                resetCompare();
                document.getElementById("compare-product-form").submit();
            }
        } else {
            sessionStorage.compare_count = Number(sessionStorage.compare_count) - 1;
            popFromCompare(this.getAttribute("product-id"));
        }
    });
}
function pushToCompare(x) {
    popFromCompare(x);
    var compare = [];
    if (sessionStorage.compare_array)
        compare = JSON.parse(sessionStorage.compare_array);
    compare.push(x);
    sessionStorage.compare_array = JSON.stringify(compare);
    return compare;
}
function popFromCompare(x) {
    var compare = [];
    if (sessionStorage.compare_array)
        compare = JSON.parse(sessionStorage.compare_array);
    var index = compare.indexOf(x);
    if (index !== -1)
        compare.splice(index, 1);
    sessionStorage.compare_array = JSON.stringify(compare);
    return compare;
}
function resetCompare() {
    var compare = JSON.parse(sessionStorage.compare_array);
    document.getElementById('compare-product-0').value = compare[0];
    document.getElementById('compare-product-1').value = compare[1];
    document.getElementById('compare-product-2').value = compare[2];
    sessionStorage.removeItem('compare_array');
    sessionStorage.removeItem('compare_count');
}
</script>
</body>
</html>
