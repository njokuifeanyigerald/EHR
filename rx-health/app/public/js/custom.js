/*
Template: XRay - Responsive Bootstrap 5 Admin Dashboard Template
Author: iqonicthemes.in
Design and Developed by: iqonicthemes.in
NOTE: This file contains the styling for responsive Template.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------

:: Page Loader
:: Scrollbar
:: Page Menu
:: Header fixed
:: Tooltip
:: Sidebar Widget
:: Magnific Popup
:: Ripple Effect
:: FullScreen
:: Page faq
:: Owl Carousel
:: Select input
:: Search input
:: Counter
:: Progress Bar
:: Wow Animation
:: Mailbox
:: Flatpicker
:: chatuser
:: chatuser main
:: Chat
:: todo Page
:: Sidebar Widget
:: Rtl Switch Toggle


------------------------------------------------
Index Of Script
----------------------------------------------*/

(function(jQuery) {


    "use strict";

    jQuery(document).ready(function() {

        /*---------------------------------------------------------------------
        Page Loader
        -----------------------------------------------------------------------*/
        jQuery("#load").fadeOut();
        jQuery("#loading").delay().fadeOut("");



        /*---------------------------------------------------------------------
        Scrollbar
        -----------------------------------------------------------------------*/
        let Scrollbar = window.Scrollbar;
        if (jQuery('#sidebar-scrollbar').length) {
            Scrollbar.init(document.querySelector('#sidebar-scrollbar'), options);
        }
        let Scrollbar1 = window.Scrollbar;
        if (jQuery('#right-sidebar-scrollbar').length) {
            Scrollbar1.init(document.querySelector('#right-sidebar-scrollbar'), options);
        }



        /*---------------------------------------------------------------------
        Page Menu
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.wrapper-menu', function() {
            jQuery(this).toggleClass('open');
            jQuery("body").toggleClass("sidebar-main");
        });



        /*---------------------------------------------------------------------
         Header fixed
         -----------------------------------------------------------------------*/

        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() >= 75) {
                jQuery('.iq-top-navbar').addClass('fixed-header');
            } else {
                jQuery('.iq-top-navbar').removeClass('fixed-header');
            }
        });



        /*---------------------------------------------------------------------
        Tooltip
        -----------------------------------------------------------------------*/
        jQuery('[data-bs-toggle="popover"]').each(function () {
            new bootstrap.Popover(this);
        });

        jQuery('[data-bs-toggle="tooltip"]').each(function () {
            new bootstrap.Tooltip(this);
        });



        /*---------------------------------------------------------------------
        Sidebar Widget
        -----------------------------------------------------------------------*/
        function checkClass(ele, type, className) {
            switch (type) {
                case 'addClass':
                    if (!ele.hasClass(className)) {
                        ele.addClass(className);
                    }
                    break;
                case 'removeClass':
                    if (ele.hasClass(className)) {
                        ele.removeClass(className);
                    }
                    break;
                case 'toggleClass':
                    ele.toggleClass(className);
                    break;
            }
        }
        jQuery('.iq-sidebar-menu .active').each(function(ele, index) {
            jQuery(this).find('.iq-submenu').parent().addClass('menu-open');
            jQuery(this).find('.iq-submenu').addClass('menu-open');
        })
        jQuery(document).on('click', '.iq-sidebar-menu li', function() {

            if (jQuery(this).hasClass('menu-open')) {
                jQuery(this).find('.iq-submenu').slideUp();
                checkClass(jQuery(this), 'removeClass', 'menu-open');
                if (!jQuery(this).find('.iq-submenu.menu-open .menu-open').length) {
                    checkClass(jQuery(this).find('.menu-open'), 'removeClass', 'menu-open');
                } else {
                    checkClass(jQuery(this).find('.iq-submenu'), 'removeClass', 'menu-open');
                }
            } else if (jQuery(this).find('.iq-submenu').length) {
                jQuery(this).find('.iq-submenu').slideDown();
                checkClass(jQuery(this), 'addClass', 'menu-open');
                checkClass(jQuery(this).find('.iq-submenu'), 'addClass', 'menu-open');
            }
        });


        /*---------------------------------------------------------------------
        Magnific Popup
        -----------------------------------------------------------------------*/
        jQuery('.popup-gallery').magnificPopup({
            delegate: 'a.popup-img',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                }
            }
        });
        jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });


        /*---------------------------------------------------------------------
        Ripple Effect
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', ".iq-waves-effect", function(e) {
            // Remove any old one
            jQuery('.ripple').remove();
            // Setup
            let posX = jQuery(this).offset().left,
                posY = jQuery(this).offset().top,
                buttonWidth = jQuery(this).width(),
                buttonHeight = jQuery(this).height();

            // Add the element
            jQuery(this).prepend("<span class='ripple'></span>");


            // Make it round!
            if (buttonWidth >= buttonHeight) {
                buttonHeight = buttonWidth;
            } else {
                buttonWidth = buttonHeight;
            }

            // Get the center of the element
            let x = e.pageX - posX - buttonWidth / 2;
            let y = e.pageY - posY - buttonHeight / 2;


            // Add the ripples CSS and start the animation
            jQuery(".ripple").css({
                width: buttonWidth,
                height: buttonHeight,
                top: y + 'px',
                left: x + 'px'
            }).addClass("rippleEffect");
        });

        /*---------------------------------------------------------------------
        FullScreen
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.iq-full-screen', function() {
            let elem = jQuery(this);
            if (!document.fullscreenElement &&
                !document.mozFullScreenElement && // Mozilla
                !document.webkitFullscreenElement && // Webkit-Browser
                !document.msFullscreenElement) { // MS IE ab version 11

                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
            elem.find('i').toggleClass('ri-fullscreen-line').toggleClass('ri-fullscreen-exit-line');
        });

        /*---------------------------------------------------------------------
        Page faq
        -----------------------------------------------------------------------*/
        jQuery('.iq-accordion .iq-accordion-block .accordion-details').hide();
        jQuery('.iq-accordion .iq-accordion-block:first').addClass('accordion-active').children().slideDown('slow');
        jQuery(document).on("click", '.iq-accordion .iq-accordion-block', function() {
            if (jQuery(this).children('div.accordion-details ').is(':hidden')) {
                jQuery('.iq-accordion .iq-accordion-block').removeClass('accordion-active').children('div.accordion-details ').slideUp('slow');
                jQuery(this).toggleClass('accordion-active').children('div.accordion-details ').slideDown('slow');
            }
        });


        /*---------------------------------------------------------------------
       Owl Carousel
       -----------------------------------------------------------------------*/
        jQuery('.owl-carousel').each(function() {
            let jQuerycarousel = jQuery(this);
            jQuerycarousel.owlCarousel({
                items: jQuerycarousel.data("items"),
                loop: jQuerycarousel.data("loop"),
                margin: jQuerycarousel.data("margin"),
                nav: jQuerycarousel.data("nav"),
                dots: jQuerycarousel.data("dots"),
                autoplay: jQuerycarousel.data("autoplay"),
                autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
                navText: ["<i class='fa fa-angle-left fa-2x'></i>", "<i class='fa fa-angle-right fa-2x'></i>"],
                responsiveClass: true,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: jQuerycarousel.data("items-mobile-sm"),
                        nav: false,
                        dots: true
                    },
                    // breakpoint from 480 up
                    480: {
                        items: jQuerycarousel.data("items-mobile"),
                        nav: false,
                        dots: true
                    },
                    // breakpoint from 786 up
                    786: {
                        items: jQuerycarousel.data("items-tab")
                    },
                    // breakpoint from 1023 up
                    1023: {
                        items: jQuerycarousel.data("items-laptop")
                    },
                    1199: {
                        items: jQuerycarousel.data("items")
                    }
                }
            });
        });

        /*---------------------------------------------------------------------
        Select input
        -----------------------------------------------------------------------*/
        jQuery('.select2jsMultiSelect').select2({
            tags: true
        });

        /*---------------------------------------------------------------------
        Search input
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', function(e) {
            let myTargetElement = e.target;
            let selector, mainElement;
            if (jQuery(myTargetElement).hasClass('search-toggle') || jQuery(myTargetElement).parent().hasClass('search-toggle') || jQuery(myTargetElement).parent().parent().hasClass('search-toggle')) {
                if (jQuery(myTargetElement).hasClass('search-toggle')) {
                    selector = jQuery(myTargetElement).parent();
                    mainElement = jQuery(myTargetElement);
                } else if (jQuery(myTargetElement).parent().hasClass('search-toggle')) {
                    selector = jQuery(myTargetElement).parent().parent();
                    mainElement = jQuery(myTargetElement).parent();
                } else if (jQuery(myTargetElement).parent().parent().hasClass('search-toggle')) {
                    selector = jQuery(myTargetElement).parent().parent().parent();
                    mainElement = jQuery(myTargetElement).parent().parent();
                }
                if (!mainElement.hasClass('active') && jQuery(".navbar-list li").find('.active')) {
                    jQuery('.navbar-list li').removeClass('iq-show');
                    jQuery('.navbar-list li .search-toggle').removeClass('active');
                }

                selector.toggleClass('iq-show');
                mainElement.toggleClass('active');

                e.preventDefault();
            } else if (jQuery(myTargetElement).is('.search-input')) {} else {
                jQuery('.navbar-list li').removeClass('iq-show');
                jQuery('.navbar-list li .search-toggle').removeClass('active');
            }
        });


        /*---------------------------------------------------------------------
        Counter
        -----------------------------------------------------------------------*/
        jQuery('.counter').counterUp({
            delay: 10,
            time: 1000
        });


        /*---------------------------------------------------------------------
        Progress Bar
        -----------------------------------------------------------------------*/
        jQuery('.iq-progress-bar > span').each(function() {
            let progressBar = jQuery(this);
            let width = jQuery(this).data('percent');
            progressBar.css({
                'transition': 'width 2s'
            });

            setTimeout(function() {
                progressBar.appear(function() {
                    progressBar.css('width', width + '%');
                });
            }, 100);
        });

        jQuery('.progress-bar-vertical > span').each(function() {
            let progressBar = jQuery(this);
            let height = jQuery(this).data('percent');
            progressBar.css({
                'transition': 'height 2s'
            });

            setTimeout(function() {
                progressBar.appear(function() {
                    progressBar.css('height', height + '%');
                });
            }, 100);
        });


        /*---------------------------------------------------------------------
        Wow Animation
        -----------------------------------------------------------------------*/
        let wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        wow.init();


        /*---------------------------------------------------------------------
        Mailbox
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', 'ul.iq-email-sender-list li', function() {
            jQuery(this).next().addClass('show');
        });

        jQuery(document).on('click', '.email-app-details li h4', function() {
            jQuery('.email-app-details').removeClass('show');
        });

        /*------------------------------------------------------------------
        Flatpicker
        * -----------------------------------------------------------------*/
        if (typeof flatpickr !== 'undefined' && jQuery.isFunction(flatpickr)) {
            jQuery(".flatpicker").flatpickr({
                inline: true
            });
        }

        /*---------------------------------------------------------------------
        chatuser
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.chat-head .chat-user-profile', function() {
            jQuery(this).parent().next().toggleClass('show');
        });
        jQuery(document).on('click', '.user-profile .close-popup', function() {
            jQuery(this).parent().parent().removeClass('show');
        });

        /*---------------------------------------------------------------------
        chatuser main
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.chat-search .chat-profile', function() {
            jQuery(this).parent().next().toggleClass('show');
        });
        jQuery(document).on('click', '.user-profile .close-popup', function() {
            jQuery(this).parent().parent().removeClass('show');
        });

        /*---------------------------------------------------------------------
        Chat 
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '#chat-start', function() {
            jQuery('.chat-data-left').toggleClass('show');
        });
        jQuery(document).on('click', '.close-btn-res', function() {
            jQuery('.chat-data-left').removeClass('show');
        });
        jQuery(document).on('click', '.iq-chat-ui li', function() {
            jQuery('.chat-data-left').removeClass('show');
        });
        jQuery(document).on('click', '.sidebar-toggle', function() {
            jQuery('.chat-data-left').addClass('show');
        });

        /*---------------------------------------------------------------------
        todo Page
        -----------------------------------------------------------------------*/
        jQuery(document).on('click', '.todo-task-list > li > a', function() {
            jQuery('.todo-task-list li').removeClass('active');
            jQuery('.todo-task-list .sub-task').removeClass('show');
            jQuery(this).parent().toggleClass('active');
            jQuery(this).next().toggleClass('show');
        });
        jQuery(document).on('click', '.todo-task-list > li li > a', function() {
            jQuery('.todo-task-list li li').removeClass('active');
            jQuery(this).parent().toggleClass('active');
        });

        /*---------------------------------------------------------------------
        Sidebar Widget
        -----------------------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery().on('click', '.todo-task-lists li', function() {
                if (jQuery(this).find('input:checkbox[name=todo-check]').is(":checked")) {

                    jQuery(this).find('input:checkbox[name=todo-check]').attr("checked", false);
                    jQuery(this).removeClass('active-task');
                } else {
                    jQuery(this).find('input:checkbox[name=todo-check]').attr("checked", true);
                    jQuery(this).addClass('active-task');
                }
            });
        });

        /*---------------------------------------------------------------------
        Swiper Slider
        -----------------------------------------------------------------------*/
        function initializeSwipers() {
            jQuery('.ele-widget-swiper.swiper').each(function () {
                let slider = jQuery(this);
                let navTarget = slider.data('navtarget');
                let navNext = (slider.data('navnext')) ? "#" + slider.data('navnext') : "";
                let navPrev = (slider.data('navprev')) ? "#" + slider.data('navprev') : "";
                let pagination = (slider.data('pagination')) ? "#" + slider.data('pagination') : "";
                let sliderAutoplay = slider.data('autoplay') ? { delay: slider.data('autoplay') } : false;
                let iqonicPagination = {
                    el: pagination,
                    clickable: true,
                    dynamicBullets: true,
                };
        
                let sw_config = {
                    loop: slider.data('loop'),
                    speed: slider.data('speed'),
                    spaceBetween: slider.data('spacebtslide'),
                    slidesPerView: slider.data('slide'),
                    centeredSlides: slider.data('center'),
                    mousewheel: slider.data('mousewheel'),
                    autoplay: sliderAutoplay,
                    effect: slider.data('effect'),
                    navigation: {
                        nextEl: navTarget + ' .swiper-button-next',
                        prevEl: navTarget + ' .swiper-button-prev'
                    },
                    pagination: (slider.data('pagination')) ? iqonicPagination : "",
                    breakpoints: {
                        // when window width is >= 0px
                        0: {
                            slidesPerView: slider.data('mobile-sm'),
                            spaceBetween: slider.data('spacemobile'),
                        },
                        576: {
                            slidesPerView: slider.data('mobile'),
                            spaceBetween: slider.data('spacemobile'),
                        },
                        // when window width is >= 768px
                        768: {
                            slidesPerView: slider.data('tab'),
                            spaceBetween: slider.data('spacetablet'),
                        },
                        // when window width is >= 1025px
                        1025: {
                            slidesPerView: slider.data('laptop'),
                            spaceBetween: slider.data('spacelaptop'),
                        },
                        // when window width is >= 1500px
                        1500: {
                            slidesPerView: slider.data('slide'),
                            spaceBetween: slider.data('spacebtslide'),
                        },
                    }
                };
        
                let swiper = new Swiper(slider[0], sw_config);
                jQuery(document).trigger('after_slider_init', { sliderId: slider.attr('id'), swiper: swiper });
            });
        }
        
        initializeSwipers();
        
        // Custom Navigation
        jQuery(document).on('after_slider_init', function (event, data) {
            let slider = jQuery('#' + data.sliderId);
            if (slider.length === 0) return;
        
            let navTarget = slider.data('navtarget');
            let navigation = jQuery(navTarget).find('.swiper-buttons');
            const Slider = document.querySelector(navTarget);
        
            if (Slider && Slider.swiper && navigation.length > 0) {
                const sliderParam = Slider.swiper.passedParams;
                sliderParam.navigation.nextEl = navigation[0].querySelector('.swiper-button-next');
                sliderParam.navigation.prevEl = navigation[0].querySelector('.swiper-button-prev');
                Slider.swiper.destroy(true, true);
                new Swiper(navTarget, sliderParam);
            }
        });

        /*=================== 
        Rtl Switch Toggle
        =========================*/
        jQuery(document).ready(function() {
            var switchElement = jQuery('#rtl-switch');
            var linkElement = jQuery('#bootstrap-css');
            var htmlElement = jQuery('html');
        
            // Check localStorage for saved direction on page load
            var savedDir = localStorage.getItem('direction');
            if (savedDir) {
                htmlElement.attr('dir', savedDir);
                // Set CSS path based on saved direction
                var cssFileName = (savedDir === 'rtl') ? 'bootstrap.rtl.min.css' : 'bootstrap.min.css';
                var currentHref = linkElement.attr('href');
                var newPath = currentHref.replace(/\/[\w.-]+\.css$/, '/' + cssFileName);
                linkElement.attr('href', newPath);
                switchElement.prop('checked', savedDir === 'rtl');
            }
        
            switchElement.on('change', function() {
                var currentDir = htmlElement.attr('dir');
                var cssFileName;
        
                if (currentDir === 'ltr') {
                    // Set CSS file name to bootstrap.rtl.min.css when dir="rtl"
                    cssFileName = 'bootstrap.rtl.min.css';
                    htmlElement.attr('dir', 'rtl');
                    localStorage.setItem('direction', 'rtl'); // Save direction to localStorage
                } else {
                    // Set CSS file name to bootstrap.min.css when dir="ltr"
                    cssFileName = 'bootstrap.min.css';
                    htmlElement.attr('dir', 'ltr');
                    localStorage.setItem('direction', 'ltr'); // Save direction to localStorage
                }
        
                // Get the current href attribute value
                var currentHref = linkElement.attr('href');
                
                // Replace the file name in the path
                var newPath = currentHref.replace(/\/[\w.-]+\.css$/, '/' + cssFileName);
                
                // Update the href attribute with the new CSS path
                linkElement.attr('href', newPath);
            });
        });
        
    });

})(jQuery);