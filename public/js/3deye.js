(function ($) {
	$.fn.extend({
        vc3dEye: function(params) {
            vc3dEye(this, params);
            return
        }
    });

    var vc3dEye=function (selectorName,params) {
    	//assigning params
    	this.selector = $(selectorName);
    	this.imagePath = params.imagePath;
    	this.totalImages = params.totalImages;
    	this.imageExtension = params.imageExtension || "png";
    	this.isMoving = false;
    	this.currentX = 0;
    	this.currentImage=1;
		this.autoRotate = params.autoRotate || 0;
		this.timer = false;
		this.autoRotateInactivityDelay = params.autoRotateInactivityDelay || 0;

    	function assignOperations() {
            selector.mousedown(function(target) {
                isMoving = true;
                currentX=target.pageX - this.offsetLeft;
            });

            $(document).mouseup(function() {
                isMoving = false;
            });

            selector.mousemove(function(target) {
                if (isMoving == true)
                	loadAppropriateImage(target.pageX - this.offsetLeft);
            });

            selector.bind("touchstart", function(target) {
             	isMoving = true;

                //store the start position
                var actualTouch = target.originalEvent.touches[0] || target.originalEvent.changedTouches[0];
                currentX = actualTouch.clientX;

            });

            $(document).bind("touchend", function() {
                isMoving = false;
            });

            selector.bind("touchmove", function(target) {
                target.preventDefault();
                var actualTouch = target.originalEvent.touches[0] || target.originalEvent.changedTouches[0];
                if (isMoving == true)
                	loadAppropriateImage(actualTouch.pageX - this.offsetLeft);
                else
                	currentX = actualTouch.pageX - this.offsetLeft
            })
        }

        function loadAppropriateImage(newX) {

            if (currentX - newX > 25 ) {
                currentX = newX;
                currentImage = --currentImage < 1 ? totalImages : currentImage;
                selector.css("background-image", "url(" + imagePath + currentImage + "." + imageExtension + ")");
            } else if (currentX - newX < -25) {
                currentX = newX;
                currentImage = ++currentImage > totalImages ? 1 : currentImage;
                selector.css("background-image", "url(" + imagePath + currentImage + "." + imageExtension + ")");
            }
			clearInterval(timer);
            setTimeout(function(){clearInterval(timer);rotate();}, autoRotateInactivityDelay);

        }

        function forceLoadAllImages() {
        	//load the first image
            var loadedImages = 2;
            var appropriateImageUrl = imagePath + "1." + imageExtension;
            selector.css("background-image", "url(" + appropriateImageUrl + ")");

            $("<img/>").attr("src", appropriateImageUrl).on("load", function() {
                //selector.height(this.height).width(this.width);
            });

            //load all other images by force
            for (var n = 2; n <= totalImages; n++) {
                appropriateImageUrl = imagePath + n+"." + imageExtension;
                selector.append("<img src='" + appropriateImageUrl + "' style='display:none;'>");
                $("<img/>").attr("src", appropriateImageUrl).css("display", "none").on("load", function() {
                    loadedImages++;
                    if (loadedImages >= totalImages) {
                        $("#VCc").removeClass("onLoadingDiv");
                        $("#VCc").text("")
                    }
                })
            }
        }

        function initializeOverlayDiv() {
            $("html").append("<style type='text/css'>.onLoadingDiv{background-color:#00FF00;opacity:0.5;text-align:center;font-size:2em;font:color:#000000;}</style>")
            $(selector).html("<div id='VCc' style='height:100%;width:100%;' class='onLoadingDiv'>Loading...</div>");
        }
		function rotate() {
			if(autoRotate) {
                timer = setInterval(function () {
                    currentImage = ++currentImage > totalImages ? 1 : currentImage;
                    selector.css("background-image", "url(" + imagePath + currentImage + "." + imageExtension + ")");
                }, autoRotate);
            }

		}

        initializeOverlayDiv();
        forceLoadAllImages();
        setTimeout(function(){rotate();}, autoRotateInactivityDelay);
        assignOperations();
    }


})(jQuery);
