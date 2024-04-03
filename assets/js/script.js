jQuery(document).ready(function () {
    function mobileMenu () {
        jQuery('.menu-btn').on('click', function() {
            jQuery('.menu-btn').toggleClass('active');
            jQuery('.menu').toggleClass('active');
            jQuery('.overlay-main').fadeToggle(300);
            jQuery('body').toggleClass('lock');
        });
        jQuery('.overlay-main').on('click', function() {
            jQuery('.menu').removeClass('active');
            jQuery(this).fadeOut(300);
            jQuery('.menu-btn').removeClass('active');
            jQuery('body').removeClass('lock');
        });
    
        jQuery('.menu').on('a', function() {
            if(jQuery(window).width() < 993){
                jQuery('.menu').removeClass('active');
                jQuery('.overlay-main').fadeOut(300);
                jQuery('.menu-btn').removeClass('active');
                jQuery('body').removeClass('lock');
            }
        });   
    }
    function toggleSubMenu() {
        jQuery('.menu').on('click', '.first-level-item > a', function (event) {
            event.preventDefault();
            if (jQuery(window).width() < 993) {
                let $this = jQuery(this);

                if (!$this.hasClass("active")) {
                    jQuery('.first-level-item > a').removeClass('active');
                    jQuery('.sub-menu').slideUp();
                }

                $this.toggleClass('active');
                $this.next().slideToggle();
            }
        });
    }


    function stickyHeader() {
        try {    
            jQuery(window).scroll(function () {      
            if (jQuery(window).scrollTop() > 0) {  
                jQuery('.header').addClass('header-scroll');
            } else {                                
                jQuery('.header').removeClass('header-scroll');
            }
          });
          } catch {
          }
    }

    function subNavigationToggle() {
        const header = document.querySelector('.header');
    
        // If header doesn't exist, bail
        if (!header) {
            return;
        }

        const subNavigations = header.querySelectorAll('.sub-menu');
    
        // Close all sub menus
        const closeAllMenus = () => {
        subNavigations.forEach(menu => {
            menu.classList.remove('open');
        });
        };
    
        // Toggle sub navigation level 2 menu on space or enter key down
        header.addEventListener('keydown', function (event) {

        if (!event.target.closest('.menu-item-has-children')) {
            return;
        }
    
        if (event.keyCode === 32 || event.keyCode === 13) {
            event.preventDefault();
            const subNavigation =
            event.target.parentNode.querySelector('.sub-menu');
    
            subNavigation.classList.toggle('open');
        }
        });
    
        // Close not active sub menu on tab key up
        header.addEventListener('keyup', function (event) {
        if (!event.target.closest('.menu-item')) {
            return;
        }
    
        if (event.keyCode === 9) {
            const subNavigation =
            event.target.parentNode.querySelector('.sub-menu');
    
            if (subNavigation) {
            subNavigations.forEach(menu => {
                if (menu !== subNavigation) {
                menu.classList.remove('open');
                }
            });
            }
        }
        });
    
        // Close sub menu on key up outside menu
        header.addEventListener('keyup', function (event) {
        if (event.target.closest('.custom-logo-link')) {
            closeAllMenus();
        }
        if (event.target.closest('.wpml-ls-item')) {
            closeAllMenus();
        }
        });
    
        //close sub menu on click outside menu
        document.addEventListener('click', event => {
        if (event.target.closest('.sub-menu')) {
            return;
        }
        closeAllMenus();
        });
    };

    function heroSlider() {
        jQuery('.hero-slider').each(function() {
            hasDots = jQuery( this ).hasClass( 'has-dots' );
            jQuery( this ).slick({
                dots: hasDots,
                nextArrow: '<button type="button" class="slick-angle angle-next"></button>',
                prevArrow: '<button type="button" class="slick-angle angle-prev"></button>',
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 5000,
            });
        })
    }

    function featureSlider() {
        jQuery('.feature-slider').each(function() {
            jQuery( this ).slick({
                dots: false,
                nextArrow: jQuery( this ).siblings('.round-angle-next'),
                prevArrow: jQuery( this ).siblings('.round-angle-prev'),
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 5000,
            });
        });
    }

    function testimonialSlider() {
        jQuery('.testimonials-slider').slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            nextArrow: '<button type="button" class="slick-btn slick-next"></button>',
            prevArrow: '<button type="button" class="slick-btn slick-prev"></button>',
        });
    }

    function roomsSlider() {
        if (jQuery('.rooms-list .room').length > 3) {
            jQuery('.rooms-list').slick({
                dots: false,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                nextArrow: '<button type="button" class="slick-angle angle-next"></button>',
                prevArrow: '<button type="button" class="slick-angle angle-prev"></button>',
                responsive: [
                    {
                      breakpoint: 992,
                      settings: 'unslick'
                    }
                  ]
            });
        }
    }

    function imageSlider() {
        const sliders = document.querySelectorAll('.image-slider');

        if (sliders.length === 0) {
            return;
        }

        sliders.forEach(slider => {
            const sliderCount = slider.dataset.sliderCount;
            
            jQuery(`[data-fancybox="image-slider-gallery-${sliderCount}"]`).fancybox({
                loop: true,
                backFocus: false,
                buttons: [
                    "zoom",
                    "thumbs",
                    "close"
                ],
                thumbs : {
                    autoStart : true
                },
                afterShow: function (instance, current) {
                    current.opts.$orig.closest('.slick-initialized').slick('slickGoTo', parseInt(current.index), true);
                }
            });

            jQuery(slider).slick({
                dots: false,
                slidesToShow: 1,
                infinite: true,
                centerMode: true,
                variableWidth: true,
                centerPadding: '20px',
                nextArrow: jQuery(slider).siblings('.image-slider-next'),
                prevArrow: jQuery(slider).siblings('.image-slider-prev'),
            });
        });

        jQuery(document).on('click', '.image-slider .slick-cloned', function(e) {
            let $slides = $(this)
                .parent()
                .children('.slick-slide:not(.slick-cloned)');
    
            $slides
                .eq( ( jQuery(this).attr("data-slick-index") || 0) % $slides.length )
                .trigger("click.fb-start", { $trigger: $(this) });
    
            return false;
        });
        
    }

    function teserSlider() {
        const sliders = document.querySelectorAll('.teaser-slider');

        if (sliders.length === 0) {
            return;
        }

        sliders.forEach(slider => {
            const sliderCount = slider.dataset.sliderCount;
            
            jQuery(`[data-fancybox="image-teaser-gallery-${sliderCount}"]`).fancybox({
                loop: true,
                backFocus: false,
                buttons: [
                    "zoom",
                    "thumbs",
                    "close"
                ],
                thumbs : {
                    autoStart : true
                },
                afterShow: function (instance, current) {
                    current.opts.$orig.closest('.slick-initialized').slick('slickGoTo', parseInt(current.index), true);
                }
            });

            jQuery(slider).slick({
                dots: false,
                nextArrow: jQuery(slider).siblings('.round-angle-next'),
                prevArrow: jQuery(slider).siblings('.round-angle-prev'),
                infinite: true,
                fade: true,
                cssEase: 'linear',
            });
        });

        jQuery(document).on('click', '.teaser-slider .slick-cloned', function(e) {
            let $slides = $(this)
                .parent()
                .children('.slick-slide:not(.slick-cloned)');
        
            $slides
                .eq( ( jQuery(this).attr("data-slick-index") || 0) % $slides.length )
                .trigger("click.fb-start", { $trigger: $(this) });
    
            return false;
        });

    }

    function galleryLightbox() {
        jQuery('[data-fancybox="gallery"]').fancybox({
            buttons: [
                "zoom",
                "thumbs",
                "close"
              ],
            thumbs : {
                autoStart : true
            }
        });
    }

    function playVideo() {
        try {
            jQuery('.play-btn').on('click', function() {
                jQuery(this).fadeOut(300);
                jQuery('.poster').fadeOut(300);
                jQuery('.video-wrapper video').get(0).play();
            });
        } catch {}
    }

    jQuery('.button-more').click(function () {
        let windowHeight = jQuery(window).height();
        let headerHeight = jQuery('.header').height();
        jQuery('body,html').animate({
            scrollTop: windowHeight - headerHeight
        }, 800);
        return false;
    });

    new WOW().init();
    mobileMenu();
    toggleSubMenu();
    stickyHeader();
    subNavigationToggle();
    heroSlider();
    featureSlider();
    testimonialSlider();
    roomsSlider();
    imageSlider();
    playVideo();
    galleryLightbox();
    teserSlider();
});