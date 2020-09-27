/*Number input should take only number. mozilla fix */
(function () {
    var selectors = document.querySelectorAll('input[type="number"]');
    for (i = 0; i < selectors.length; i++) {
        setInputFilter(selectors[i], function (value) {
            return /^\d*\.?\d*$/.test(value); /* Allow digits and '.' only, using a RegExp */
        });
    }
})();
/* Restricts input for the given textbox to the given inputFilter function. */
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}
/* Ajax uploader */
// this is the id of the form
$(".ajax-upload").submit(function (event) {
    event.preventDefault();
    event.stopPropagation();
    var form = $(this);
    if (form.find('.list'))
        form.find('.list').fadeIn(100).css("width", "0px");
    var data = new FormData();
    var fields = form.serializeArray();
    $.each(fields, function (i, field) {
        data.append(field.name, field.value);
    });
    $.each(form.find('[type="file"]'), function (i, file_field) {
        data.append(file_field.getAttribute("name"), file_field.files[0]);/* 0=>Only first file; For multiple remove index */
    });
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            /* Upload progress*/
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    /* Do something with upload progress */
                    if (form.find('.list')) {
                        form.find('.list').fadeIn(100).css({"width": 100 * percentComplete + '%',
                            "text-align": "center",
                            "color": "#000"
                        }).html(Math.floor(100 * percentComplete) + '%');
                    }
                }
            }, false);
            /* Download progress */
            xhr.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    /* Do something with download progress */
                }
            }, false);
            return xhr;
        },
        success: function (data2) {
            if (form.find('.list')) {
                form.find('.list').css({
                    "width": "100%"
                }).html("Upload Complete!");
            }
            $('#success-modal').modal('show');
        },
        error: function (data2) {
            $('#error-modal').modal('show');
        }
    });
    return false;
});
/* Display photo after selecting */
function displayPhotoOnSelect(input, id = 'display-photo-on-select') {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + id).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
/* Form validation of the form with .needs-validation */
(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation');
        Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                /* was-validated is a bootstrap class */
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
/* View port height matching */
(function () {
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    var vp_h_55_md = document.querySelector('.vp-h-55-md');
    if (w > 768 && vp_h_55_md)
        vp_h_55_md.style.height = (h - 55) + 'px';
})();
/* Location control */
(function () {
    locationHandle('division', 'district', 'upazila', 'union', 'region');
    locationHandle('billing-division', 'billing-district', 'billing-upazila', 'billing-union', 'billing-region');
    locationHandle('shipping-division', 'shipping-district', 'shipping-upazila', 'shipping-union', 'shipping-region');
})();
function locationHandle(division, district, upazila, union, region) {
    var division_el = document.getElementById(division);
    var district_el = document.getElementById(district);
    var upazila_el = document.getElementById(upazila);
    var union_el = document.getElementById(union);
    var region_el = document.getElementById(region);
    if (division_el && district_el)
        division_el.addEventListener('change', function () {
            locationAjaxCall(division_el, district_el);
        });
    if (district_el && upazila_el)
        district_el.addEventListener('change', function () {
            locationAjaxCall(district_el, upazila_el);
        });
    if (division_el && region_el)
        division_el.addEventListener('change', function () {
            locationAjaxCall(division_el, region_el);
        });
    if (upazila_el && union_el)
        upazila_el.addEventListener('change', function () {
            locationAjaxCall(upazila_el, union_el);
        });
    if (union_el && region_el)
        union_el.addEventListener('change', function () {
            locationAjaxCall(union_el, region_el);
        });
}
function locationAjaxCall(item, child) {
    var base_url = $("meta[name=base-url]")[0].content;
    var id = item.id;
    id = id.replace("billing-", "");
    id = id.replace("shipping-", "");
    var c_id = child.id;
    c_id = c_id.replace("billing-", "");
    c_id = c_id.replace("shipping-", "");
    $.ajax({
        url: base_url + '/' + id + 's/' + item.value,
        success: function (result) {
            var options = result[0][c_id + 's'];
            var html = '<option value="0">--Select ' + c_id + '--</option>';
            options.forEach(function (entry) {
                html += '<option value="' + entry.id + '">' + entry.name + '</option>';
            });
            child.innerHTML = html;
        }
    });
}
/* Dropdowns filtering with two classes .derive-from in select, .derive-parent in option */
(function () {
    var derives = document.querySelectorAll('[derive-from]');
    derives.forEach(function (item, index) {
        var id = item.getAttribute('derive-from');
        var options = item.options;
        for (let i = 0; i < options.length; i++) {
            options[i].classList.add('d-none');
        }
        var parent = document.getElementById(id);
        parent.addEventListener('change', function (e) {
            for (let i = 0; i < options.length; i++) {
                var value = parent.options[parent.selectedIndex].value;
                if (options[i].getAttribute('derive-parent') != value) {
                    options[i].classList.add('d-none');
                } else {
                    options[i].classList.remove('d-none');
                }
            }
        });
    });
})();
/* Vue cart */
(function () {
    if (!localStorage.getItem("cart_products")) {
        localStorage.cart_products = '[]';
    }
    if (document.getElementById('cart'))
        var cart = new Vue({
            el: '#cart',
            data: {
                products: JSON.parse(localStorage.cart_products)
            },
            methods: {
                remove: function (id) {
                    this.products = this.products.filter(function (el) {
                        return el.id != id;
                    });
                }
            },
            computed: {
                totalProduct: function () {
                    var quantity_obj = {quantity: 0};
                    if (this.products.length > 0) {
                        quantity_obj = this.products.reduce(function (previousValue, currentValue) {
                            return {
                                "quantity": parseInt(previousValue.quantity) + parseInt(currentValue.quantity)
                            };
                        });
                    }
                    return quantity_obj.quantity;
                }
            },
            watch: {
                products: {
                    handler: function (n, o) {
                        localStorage.cart_products = JSON.stringify(n);
                        if (app2)
                            app2.products = n;
                    },
                    deep: true,
                }
            }
        });
})();
(function() {
    setTimeout(function(){ setParentsHeight(); }, 0);
})();
function setParentsHeight() {
    var elements = document.getElementsByClassName("h-parent");
    for(let i = 0; i<elements.length; i++) {
        elements[i].style.height = elements[i].parentElement.offsetHeight+'px';
    }
    
}
/*sticky-top event */
(function() {
    // get the sticky element
    window.observer = new IntersectionObserver(
        ([e]) => {
            e.target.classList.toggle('stuck', e.intersectionRatio < 1);
        },
        {
            threshold: [1]
        }
        );
})();
/* Multi handle slide starts */
(function() {
    var handle1Clicked = false;
    var handle2Clicked = false;
    var handle1Position = 0;
    var handle2Position = 0;
    
    var slides = document.getElementsByClassName("multi-handle-slide");
    var slide = slides[0];
    
    for(let i=0; i<slides.length; i++) {
        slides[i].setAttribute("data-handle-1", handle1Position);
        slides[i].setAttribute("data-handle-2", handle2Position);
        slides[i].querySelector(".handle-1").addEventListener('mousedown', e => {
            slide = e.target.parentElement || e.srcElement.parentElement;
            handle1Clicked = true;
        });
        slides[i].querySelector(".handle-2").addEventListener('mousedown', e => {
            slide = e.target.parentElement || e.srcElement.parentElement;
            handle2Clicked = true;
        });
    }
    document.addEventListener('mousemove', event => {
        event = getMouseEvent(event);
        var left = slide.getBoundingClientRect().left;
        
        var position = event.pageX-left;
        if(handle1Clicked) {
            handle1Position = updateHandle1(slide, position);
        } else if(handle2Clicked) {
            handle2Position = updateHandle2(slide, position);
        }
    });
    document.addEventListener('mouseup', e => {
        handle1Clicked = false;
        handle2Clicked = false;
    });
})();
function getMouseEvent(event) {
    var eventDoc, doc, body;
    event = event || window.event;
    if (event.pageX == null && event.clientX != null) {
        eventDoc = (event.target && event.target.ownerDocument) || document;
        doc = eventDoc.documentElement;
        body = eventDoc.body;
        event.pageX = event.clientX + (doc && doc.scrollLeft || body && body.scrollLeft || 0) - (doc && doc.clientLeft || body && body.clientLeft || 0);
    }
    return event;
}
function updateHandle1(slide, position) {
    let width = slide.offsetWidth;
    position = position<0?0:position;
    let handle1 = slide.querySelector(".handle-1");
    let highlight = slide.querySelector(".highlight");
    let min = slide.getAttribute("data-min");
    let max = slide.getAttribute("data-max");
    let callback = slide.getAttribute("data-callback");
    let handle2Position = slide.getAttribute("data-handle-2");
    let range = max-min;
    let unit = width/range;
    let value = Math.round(position/unit);
    let handle1Position = value*unit;
    let minimum = slide.querySelector(".minimum");
    handle1Position = handle1Position>width-handle2Position-20?width-handle2Position-20:handle1Position;
    handle1.style.transform = "translate("+handle1Position+"px, 0)";
    highlight.style.left = handle1Position+"px";
    highlight.style.width = width-handle1Position-handle2Position+"px";
    if(minimum)
        minimum.value = Math.round(handle1Position/unit);
    if(callback)
        window[callback](Math.round(handle1Position/unit), Math.round(handle2Position/unit));
    slide.setAttribute("data-handle-1", handle1Position);
    return handle1Position;
}
function updateHandle2(slide, position) {
    let width = slide.offsetWidth;
    position = position>width-20?width-20:position;
    let handle2 = slide.querySelector(".handle-2");
    let highlight = slide.querySelector(".highlight");
    let min = slide.getAttribute("data-min");
    let max = slide.getAttribute("data-max");
    let callback = slide.getAttribute("data-callback");
    let handle1Position = slide.getAttribute("data-handle-1");
    let range = max-min;
    let unit = width/range;
    let value = Math.round((width-position-20)/unit);
    let handle2Position = value*unit;
    let maximum = slide.querySelector(".maximum");
    handle2Position = handle2Position>width-handle1Position-20?width-handle1Position-20:handle2Position;
    handle2.style.transform = "translate(-"+handle2Position+"px, 0)";
    highlight.style.width = width-handle1Position-handle2Position+"px";
    if(maximum)
        maximum.value = range-Math.round(handle2Position/unit);
    if(callback)
        window[callback](Math.round(handle1Position/unit), range-Math.round(handle2Position/unit));
    slide.setAttribute("data-handle-2", handle2Position);
    return handle2Position;
}
/* Multi handle slide ends */