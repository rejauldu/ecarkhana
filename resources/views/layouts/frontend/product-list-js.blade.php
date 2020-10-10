<script>
    var products;
    (function() {
        products = new Vue({
            el: '#products',
            data: {
                id: '',
                name: '',
                phone: '',
                otp: '',
                terms: '',
                otp_sent: false,
                otp_error: false,
                countDown: 60,
                price_min: {{ $minimum_price ?? 0 }},
                price_max: {{ $maximum_price ?? 0 }},
                models: '{{ $model_search ?? '' }}',
                body_types: '{{ $body_type_search ?? '' }}',
                make_year_min: {{ $minimum_make_year ?? 0 }},
                make_year_max: {{ $maximum_make_year ?? 0 }},
                kms_driven_min: {{ $minimum_kms_driven ?? 0 }},
                kms_driven_max: {{ $maximum_kms_driven ?? 0 }},
                conditions: '{{ $condition_search ?? '' }}',
                categories: '{{ $category_search ?? '' }}',
                modal_type: ''
            },
            methods: {
                openWhatsappModal: function (id) {
                    this.id = id;
                    this.modal_type = 'whatsapp';
                    if (localStorage.getItem("phone_verified")) {
                        window.location = this.whatsappLink;
                    } else {
                        $('#whatsapp-modal').modal('show');
                    }
                },
                openDealerModal: function (id) {
                    this.id = id;
                    this.modal_type = 'dealer';
                    if (localStorage.getItem("phone_verified")) {
                        window.location = this.whatsappLink;
                    } else {
                        $('#whatsapp-modal').modal('show');
                    }
                },
                isPhoneValid: function () {
                    var pattern = /(^(\+88|0088)?(01){1}[356789]{1}(\d){8,9})$/;
                    return pattern.test(this.phone);
                },
                sendOtp: function () {
                    var _this = this;
                    this.countDown = 60;
                    this.countDownTimer();
                    $.ajax({
                        url: "{{ route('send-otp') }}",
                        data: {"name":this.name, "phone":this.phone, "_token":"{{ csrf_token() }}"},
                        type: "post",
                        success: function(result){
                            _this.otp_sent = true;
                        }
                    });
                },
                countDownTimer() {
                    if (this.countDown > 0) {
                        setTimeout(() => {
                            this.countDown -= 1
                            this.countDownTimer()
                        }, 1000);
                    } else {
                        this.otp_sent = false;
                    }
                },
                verifyOtp: function() {
                    var _this = this;
                    $.ajax({
                        url: "{{ route('verify-otp') }}",
                        data: {"phone":this.phone, "otp":this.otp, "_token":"{{ csrf_token() }}"},
                        type: "post",
                        success: function(result) {
                            if(result == 'success') {
                                localStorage.phone_verified = 1;
                                if(_this.modal_type = 'whatsapp')
                                    window.location = _this.whatsappLink;
                                else
                                    window.location = _this.dealerLink;
                            } else
                                _this.otp_error = true;
                        }
                    });
                },
                updatePrice: function(min, max) {
                    this.price_min = min;
                    this.price_max = max;
                },
                updateModels: function(name) {
                    if(this.models.includes(name)) {
                        this.models = this.models.replace('-and-'+name, '');
                        this.models = this.models.replace(name, '');
                    } else
                        this.models += '-and-'+name;
                    this.searchSubmit();
                },
                updateMakeYear: function(min, max) {
                    this.make_year_min = min;
                    this.make_year_max = max;
                },
                updateBodyType: function(name) {
                    if(this.body_types.includes(name)) {
                        this.body_types = this.body_types.replace('-and-'+name, '');
                        this.body_types = this.body_types.replace(name, '');
                    } else
                        this.body_types += '-and-'+name;
                    this.searchSubmit();
                },
                updateCondition: function(name) {
                    if(this.conditions.toLowerCase().includes(name.toLowerCase())) {
                        this.conditions = this.conditions.toLowerCase().replace('-and-'+name.toLowerCase(), '');
                        this.conditions = this.conditions.replace(name.toLowerCase(), '');
                    } else
                        this.conditions += '-and-'+name.toLowerCase();
                    this.searchSubmit();
                },
                updateCategory: function(name) {
                    if(this.categories.toLowerCase().includes(name.toLowerCase())) {
                        this.categories = this.categories.toLowerCase().replace('-and-'+name.toLowerCase(), '');
                        this.categories = this.categories.replace(name.toLowerCase(), '');
                    } else
                        this.categories += '-and-'+name.toLowerCase();
                    this.searchSubmit();
                },
                updateKmsDriven: function(min, max) {
                    this.kms_driven_min = min;
                    this.kms_driven_max = max;
                },
                searchSubmit: function() {
                    @if(isset($url))
                    @php($link = $url)
                    @else
                    @php($link = '/'.$category_small.'s')
                    @endif
                    var url = "{{ url($link) }}?";
                    if(this.price_min)
                        url += "&minimum-price="+this.price_min;
                    if(this.price_max)
                        url += "&maximum-price="+this.price_max;
                    if(this.models) {
                        this.models = this.models.replace(/^(-and-)+/g, "");
                        url += "&models="+this.models;
                    }
                    if(this.make_year_min)
                        url += "&minimum-make-year="+this.make_year_min;
                    if(this.make_year_max)
                        url += "&maximum-make-year="+this.make_year_max;
                    if(this.body_types) {
                        this.body_types = this.body_types.replace(/^(-and-)+/g, "");
                        url += "&body-types="+this.body_types;
                    }
                    if(this.conditions) {
                        this.conditions = this.conditions.replace(/^(-and-)+/g, "");
                        url += "&conditions="+this.conditions;
                    }
                    if(this.categories) {
                        this.categories = this.categories.replace(/^(-and-)+/g, "");
                        url += "&categories="+this.categories;
                    }
                    if(this.kms_driven_min)
                        url += "&minimum-kms-driven="+this.kms_driven_min;
                    if(this.kms_driven_max)
                        url += "&maximum-kms-driven="+this.kms_driven_max;
                    url = url.replace("?&", "?");
                    url = url.replace(/\?+$/g, "");
                    window.location = url;
                }
            },
            computed: {
                whatsappLink: function () {
                    var encodedURL = encodeURIComponent("{{ url('/products') }}/" + this.id);
                    var link = 'https://api.whatsapp.com/send?phone=8801817338234&text=' + encodedURL + '%0a‎Hello%0aI%0aneed%0asome%0ainformation%0aabout%0athis%0avehicle';
                    return link;
                },
                dealerLink: function () {
                    var link = "{{ url('/dealers') }}/" + this.id;
                    return link;
                }
            }
        });
        $('#mobile-filter').on('show.bs.collapse', function () {
            setTimeout(function(){ multiHandleSlider(); }, 0);
        });
    })();

</script>