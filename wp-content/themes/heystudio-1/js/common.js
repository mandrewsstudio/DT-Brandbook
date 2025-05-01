// Initialize variables
var $ = jQuery.noConflict();
var working = false;
var lastwidth, lastheight = 0;
var win_height = $.windowHeight();
var $grid = null;
var sorting = false;
var news_swiper = false;
var favicon_inteval = false;
var click_exist = false;

// Document ready function
$(function() {
    // Click event handling
    $('body,a').click(function() {
        click_exist = true;
        $('video').each(function() {
            var video = $(this).get(0);
        });
    });

    // Add loading class to body
    $('body').addClass('loading_page');

    // Initialize Ajaxify
    ajaxify = new Ajaxify({
        elements: "#content",
        selector: "a:not(.no-ajaxy)",
        aniTime: 0,
        scrolltop: true,
        requestDelay: 400,
        bodyClasses: true,
        prefetchoff: true,
        refresh: true,
        forms: false,
        prefetchoff: true,
        inline: false,
        inlinesync: false,
        inlineappend: true,
        pluginon: true,
    });

    // Event listeners for Pronto.js
    window.addEventListener('pronto.request', function(event) {
        $('body').addClass('website_unloading');
    });

    window.addEventListener('pronto.beforeload', function(event) {
        $('body').addClass('website_loaded');
    });

    window.addEventListener('pronto.load', function(event) {
        $('body').addClass('website_loaded');
    });

    window.addEventListener('pronto.render', function(event) {
        // Randomize colors, add/remove classes, and other actions on render
        randomize_colors();
        $('body').addClass('website_unloading');
        $('body').addClass('website_loaded');

        $('body').removeClass('filter_is_open');
        setTimeout(function() {
            $('body').removeClass('website_unloading');
        }, 300);
        first_time = true;
        fix_links();
        fix_all();
        target = $('#page_name').val();
        init_section(target);
    });

    // Detect touch devices and add touch event handling
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        var touchables = '.main_menu ul li a,.main_grid_container .main_grid .grid_item a,.filters_container .filters_container_selector .filter_item,.filters_container .filter_options .filter_labels_container .categories_filters_option,.filters_container .filters_container_selector .filter_item,.underline';
        $(touchables).addClass('touchable');
        $('.touchable').bind('touchstart', function() {
            $(this).addClass('mobile_hover');
        });
        $('.touchable').bind('touchmove', function() {
            $(this).addClass('mobile_hover');
        });
        $('.touchable').bind('touchend', function() {
            $(this).removeClass('mobile_hover');
        });
    }

    // Initialize Swiper for news
    var slides_per_view = 4;
    if (window.innerHeight > window.innerWidth) {
        slides_per_view = 'auto';
    }
    if ($(window).width() >= 1680) {
        slides_per_view = 5;
    }
    news_swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        mousewheel: {
            invert: false,
        },
        freeMode: {
            enabled: true,
            sticky: false,
        },
        slidesPerView: slides_per_view,
        loop: true,
    });

    fix_links();
    fix_all();
    set_orientation();
    var target = $('#page_name').val();
    init_section(target);
});

// Touchstart event listener
document.addEventListener("touchstart", function() {}, true);

// Window load event listener
$(window).on('load', function() {
    fix_header();
});

// Window scroll event listener
$(window).scroll(function() {
    fix_all();
    fix_header();
    fix_parallax();
});

// Window resize event listener
$(window).resize(function() {
    set_orientation();
    fix_all();
    fix_header();
    fix_parallax();
    change_orientation_action();
});

// Orientation change event listener
window.addEventListener("orientationchange", function() {
    change_orientation_action();
});

// Window load event listener
$(window).on("load", function() {});

// Window scroll event listener
$(window).scroll(function() {});

// Window resize event listener
$(window).resize(function() {});

// jQuery plugin to maintain aspect ratio
$.fn.keepRatio = function(which, width, height, resize) {
    var $this = $(this);
    var w = width;
    var h = height;
    var ratio = w / h;

    switch (which) {
        case 'width':
            var nh = Math.round($this.width() / ratio);
            $this.css('height', nh + 'px');
            break;
        case 'height':
            var nw = Math.round($this.height() * ratio);
            $this.css('width', nw + 'px');
            break;
    }

    if (resize != false) {
        $(window).resize(function() {
            switch (which) {
                case 'width':
                    var nh = Math.round($this.width() / ratio);
                    $this.css('height', nh + 'px');
                    break;
                case 'height':
                    var nw = Math.round($this.height() * ratio);
                    $this.css('width', nw + 'px');
                    break;
            }
        });
    }
};

// Function to check if an email is valid
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

// Function to check if an element is in the viewport
function elementInViewport(el) {
    if ($(el)[0]) {
        var top = el.offsetTop;
        var left = el.offsetLeft;
        var width = el.offsetWidth;
        var height = el.offsetHeight;

        while (el.offsetParent) {
            el = el.offsetParent;
            top += el.offsetTop;
            left += el.offsetLeft;
        }

        return (top < (window.pageYOffset + window.innerHeight) && left < (window.pageXOffset + window.innerWidth) && (top + height) > window.pageYOffset && (left + width) > window.pageXOffset);
    } else {
        return false;
    }
}

// Function to fix links
function fix_links() {
    $('.main_menu ul li.active').removeClass('active');
    $('.main_menu ul li a').each(function() {
        if ($(this).attr('url')) {
            $(this).attr('href', $(this).attr('url'));
        }
        var url = $(this).attr('href');
        $(this).attr('url', url);
        if (url) {
            current_url = $('#associated_page').val() ? $('#associated_page').val() : window.location.href;
            if ((url) == (current_url)) {
                $(this).parent().addClass('active');
                if ($(this).parent().attr('parent_id')) {
                    var parent_id = $(this).parent().attr('parent_id');
                    $('nav .main-nav li[item_id="' + parent_id + '"]').addClass('active');
                }
            } else {
                $(this).attr('href', $(this).attr('url'));
            }
        }
    });
}

// Function to get the path from a URL
function getPathFromUrl(url) {
    return url.split(/[?#]/)[0];
}

// Function to get URL parameters
var getUrlParameter = function getUrlParameter(sParam, url) {
    if (!url) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1));
    } else {
        var sPageURL = decodeURIComponent(url.split(/[?#]/)[1]);
    }
    var sURLVariables = sPageURL.split('&'), sParameterName, i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
// Function to handle mouseup event for closing menu
$(document).mouseup(function(e) {
    if ($('.main_menu.open')[0]) {
        var container = $(".main_menu .main_menu_wrapper,.menu_black_btn");
        var container_close_div = $('.menu_black_btn');
    }

    if (container) {
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if (container_close_div) {
                container_close_div.click();
                $('body,html').removeClass('overflow_hidden');
            } else {
                container.hide();
            }
        }
    }
});

// Function to handle keydown events
$(document).keydown(function(e) {
    switch (e.which) {
        case 37:
            // Left arrow key
            break;
        case 13:
        case 32:
            // Enter or spacebar key
            break;
        case 38:
            // Up arrow key
            break;
        case 39:
            // Right arrow key
            break;
        case 40:
            // Down arrow key
            break;
        case 27:
            // Escape key
            break;
        default:
            return;
    }

    // Prevent the default action (scroll / move caret)
});

// Function to extract path from a URL
function getPathFromUrl(url) {
    return url.split(/[?#]/)[0];
}

// Function to set orientation based on window size
function set_orientation() {
    if (window.innerHeight > window.innerWidth) {
        $('body').addClass('portrait');
        win_height = $.windowHeight();
        $('body').removeClass('landscape');
    } else {
        $('body').removeClass('portrait');
        win_height = $.windowHeight();
        $('body').addClass('landscape');
    }
}

// Function to perform various fixes
function fix_all() {
    if (lastheight != win_height) {
        var full_height_ob = '';
        $(full_height_ob).css('height', win_height);

        var full_min_height_ob = 'html,body,#page';
        $(full_min_height_ob).css('min-height', win_height);

        var full_height_ob_no_header = '.about_container';
        $(full_height_ob_no_header).css('height', win_height - $('#masthead').outerHeight());
        var full_height_ob_no_header_no_footer = '.media_info_wrapper';
        lastheight = win_height;
    }

    // Iterate through links and set target attribute
    $('a').each(function() {
        var a = new RegExp('/' + window.location.host + '/');
        if (this.href && validURL(this.href)) {
            if (!a.test(this.href)) {
                $(this).attr("target", "_blank");
            }
        }
    });
}

// Function to handle parallax scrolling effects
function fix_parallax() {
    var scrollTop = custom_get_scroll();
    $fadeInOb = $('[data-aos="fade-up"]');
    $fadeInOb.each(function() {
        ob = $(this);
        var ob_start = ob.offset().top;
        if ((scrollTop + win_height) >= (ob.offset().top) && !ob.hasClass('start_animation')) {
            if (!ob.hasClass('aos-animate')) {
                ob.addClass('aos-animate');
            }
        }
    });
    $items = $('.grid_item');
    $items.each(function() {
        ob = $(this);
        if (!ob.hasClass('image_loaded')) {
            var ob_start = ob.offset().top;
            if ((scrollTop + win_height) >= (ob.offset().top)) {
                ob.addClass('image_loaded');
                bk = ob.find('.grid_item_image_ob').attr('bk_image');
                ob.find('.grid_item_image_ob').css('background-image', 'url(' + bk + ')');
            }
        }
        if ((scrollTop + win_height) >= (ob.offset().top) && (scrollTop) <= (ob.offset().top + ob.outerHeight())) {
            if (ob.find('video')[0]) {
                var video = ob.find('video').get(0);
                if (video.paused) {
                    video.play();
                }
            } else {
                if (ob.find('.grid_item_image').attr('video_url')) {
                    muted = 'muted';
                    ob.find('.grid_item_image_ob').append('<video autoplay loop ' + muted + ' playsinline  id="home_main_module_video" class="cover"><source src="' + ob.find('.grid_item_image').attr('video_url') + '" type="video/mp4"></video>');
                }
            }
        } else {
            if (ob.find('video')[0]) {
                var video = ob.find('video').get(0);
                if (!video.paused) {
                    video.pause();
                }
            }
        }
    });
    $items = $('.has_video');
    $items.each(function() {
        ob = $(this);
        if ((scrollTop + win_height) >= (ob.offset().top) && (scrollTop) <= (ob.offset().top + ob.outerHeight())) {
            if (ob.find('video')[0]) {
                var video = ob.find('video').get(0);
                if (video.paused) {
                    video.play();
                    if (click_exist) {
                        video.muted = false;
                    }
                }
            } else {
                if (ob.attr('video_url')) {
                    muted = 'muted';
                    if (click_exist) {
                        muted = '';
                    }
                    ob.append('<video autoplay loop ' + muted + ' playsinline  id="home_main_module_video" class="cover"><source src="' + ob.attr('video_url') + '" type="video/mp4"></video>');
                }
            }
        } else {
            if (ob.find('video')[0]) {
                var video = ob.find('video').get(0);
                if (!video.paused) {
                    video.pause();
                }
            }
        }
    });
}

// Function to check if a video is currently playing
function isPlaying(vid) {
    return $("video").prop('muted') == false;
}

// Function to play/pause a video
function playPause() {
    vid = document.getElementById('tha_video');
    if (vid.paused) {
        vid.play();
        $('.video_play').addClass('pause');
    } else {
        vid.pause();
        $('.video_play').removeClass('pause');
    }
}

// Function to pause all videos
function pause_all_videos() {
    $('video').each(function() {
        var video = $(this).get(0);
        if (!video.paused) {
            video.pause();
        }
    });
}

// Function to fix header
function fix_header() {
    // Add your code to fix the header here
}

// Function to update cursor position
function update_cursor_position(pageX, pageY) {
    $("#body_cursor").css({
        left: pageX,
        top: pageY - $(window).scrollTop(),
    });
}

// Function to handle window resize event
function customOnResize() {
    $('.fix_object').removeClass('fix_object');
    $('.contain').each(function() {
        var $parent = $(this).parents('.swiper_image');
        var $ob = $(this);
        if ($ob.width() > $parent.width()) {
            $parent.addClass('fix_object');
        }
        $ob.addClass('active');
    });
}

// Function to initialize a section based on target
function init_section(target) {
    $('.change_colors_js').each(function() {
        project_id = $(this).attr('project_id');
        if (posts_colors[project_id]) {
            $(this).css('color', posts_colors[project_id]['general_color']);
        }
    });
    $('body').addClass('loading_page');
    switch (target) {
        case "home":
            init_work();
            break;
        case "contact":
            init_contact();
            break;
        case "about":
            init_about();
            break;
        case "project":
            init_project();
            break;
    }
    force_resize = true;
    fix_all();
    force_resize = false;
    setTimeout(function() {
        $('body').removeClass('loading_page');
        fix_parallax();
    }, 100);
}

// Function to get the current scroll position
function custom_get_scroll() {
    var scrollTop = $(window).scrollTop();
    return scrollTop;
}


// Function to initialize work-related functionality
function init_work() {
    // Iterate over elements with the class 'scale_prop'
    $('.scale_prop').each(function() {
        var $ob = $(this);
        var $ob_width = $ob.attr('o_width');
        var $ob_height = $ob.attr('o_height');

        // Check if 'o_width' and 'o_height' attributes exist
        if ($ob_width && $ob_height) {
            // Call the 'keepRatio' function to maintain the aspect ratio
            $ob.keepRatio('width', $ob_width, $ob_height);
        }
    });

    // Initialize Isotope for grid
    $grid = $('.main_grid').isotope({
        itemSelector: '.grid_item',
    });

    // Bind the 'layoutComplete' event to 'onLayout' function
    $grid.isotope('on', 'layoutComplete', onLayout);

    // Handle click events for filter items
    $('.filter_item').click(function() {
        $filter = $(this);
        $filter_open = $('.filter_item.open');
        var filter_id = $filter.attr('filter');
        $filters_container = $('.filter_labels_container[filter="' + filter_id + '"]');

        if ($filter.hasClass('open')) {
            // If the filter is already open, close it
            $filter.removeClass('open');
            $filters_container.css('height', '0px');
            $filters_container.removeClass('open');
        } else {
            // If the filter is closed, open it
            $filter.addClass('open');

            if ($filter_open[0]) {
                // Close any open filter and open the clicked one
                $filter_open.removeClass('open');
                var filter_open_id = $filter_open.attr('filter');
                $filters_open_container = $('.filter_labels_container[filter="' + filter_open_id + '"]');
                $filters_open_container.css('height', '0px');
                $filters_open_container.removeClass('open');

                setTimeout(function() {
                    $filter_open = $('.filter_item.open');
                    filter_open_id = $filter_open.attr('filter');
                    $filters_to_open_container = $('.filter_labels_container[filter="' + filter_open_id + '"]');
                    height = $filters_to_open_container.find('.filter_labels_container_wrapper').outerHeight();
                    $filters_to_open_container.css('height', height + 'px');
                    $filters_to_open_container.addClass('open');
                }, 500);
            } else {
                // Open the clicked filter
                height = $filters_container.find('.filter_labels_container_wrapper').outerHeight();
                $filters_container.css('height', height + 'px');
                $filters_container.addClass('open');
            }
        }

        // Toggle the body class based on open filters
        if ($('.filter_item.open')[0]) {
            $('body').addClass('filter_is_open');
        } else {
            $('body').removeClass('filter_is_open');
        }
    });

    // Handle click events for filter values
    $('[filter_val]').click(function() {
        var ob = $(this);
        if (!ob.hasClass('active')) {
            ob.addClass('active');
        } else {
            ob.removeClass('active');
        }
        var filter_slug = ob.attr('filter_val');
        topic_filter = filter_slug;
        if (topic_filter == '') {
            $('[filter_val].active').removeClass('active');
        }

        // Call the 'filter_archive' function
        filter_archive();
    });

    // Get 'service' and 'industry' parameters from URL and trigger clicks accordingly
    $service = getUrlParameter('service');
    $industry = getUrlParameter('industry');
    if ($service) {
        $('.filters_container .filter_options .filter_labels_container[filter="service"] .categories_filters_option .filter_item[filter_val="' + $service + '"]').click();
    }
    if ($industry) {
        $('.filters_container .filter_options .filter_labels_container[filter="industry"] .categories_filters_option .filter_item[filter_val="' + $industry + '"]').click();
    }

    // Call the 'filter_archive' function
    filter_archive();
}

// Function to initialize contact-related functionality
function init_contact() {
    // Add class 'underline' to anchor elements within the contact container
    $('.contact_container a').addClass('underline');
    
    // Set 'data-aos' attribute for paragraph elements to 'fade-up'
    $('.contact_container p').attr('data-aos', 'fade-up');

    var color_index = 0;
    
    // Iterate over 'strong' elements within the contact container
    $('.contact_container strong').each(function() {
        if (!general_colors[color_index]) {
            color_index = 0;
        }
        // Set color based on the general_colors array
        $(this).css('color', general_colors[color_index]['general_color']);
        color_index++;
    });
    
    // Initialize the AJAX form
    $('.newsletter_form').ajaxForm({
        context: this,
        beforeSubmit: function(arr, $form) {
            if (!working) {
                $form.parents('form').find('.newsletter_thanks_container').removeClass('visible');
                if (validateNewsletter($form)) {
                    working = true;
                    $('body').addClass('waiting');
                    $form.find('input[type=submit]').prop('disabled', true);
                    return true;
                }
            }
            return false;
        },
        success: function(html, status, xhr, myForm) {
            if ($(myForm).find('.action_newsletter')[0]) {
                $(myForm).find('.action_newsletter').fadeOut(function() {
                    $(myForm).find('.newsletter_thanks_wrapper').addClass('visible');
                });
            } else {
                $(myForm).find('.newsletter_thanks_wrapper').addClass('visible');
            }
            $(myForm)[0].reset();
            $('.newsletter_email').blur();
            $('.newsletter_email').unbind().focus(function() {
                $(this).parents('form').find('.newsletter_thanks_wrapper').removeClass('visible');
            });
            $(myForm).find('input[type=submit]').prop('disabled', false);
        },
        complete: function(xhr) {
            working = false;
            $('body').removeClass('waiting');
            $('form').find('input[type=submit]').prop('disabled', false);
        }
    });

    var $submitButton = $('.newsletter_submit');
    var $inputField = $('.newsletter_email');
    
    // Handle input event for the newsletter email field
    $inputField.on('input', function() {
        if ($inputField.val() === '') {
            $submitButton.prop('disabled', true);
        } else {
            $submitButton.prop('disabled', false);
        }
    });
}

// Function to initialize the about section
function init_about() {
    // This function does not contain any specific code
}

// Function to filter the archive based on selected filters
function filter_archive() {
    filters_array = [];
    filter = '';
    
    // Iterate over filter label containers
    $('.filter_labels_container').each(function() {
        selected_count = $(this).find('.categories_filters_option.active').size();
        filter_id = $(this).attr('filter');
        $filters_tab = $('.filter_item[filter="' + filter_id + '"]');
        if (selected_count > 0) {
            $filters_tab.find('.selected_count').html('(' + selected_count + ')');
        } else {
            $filters_tab.find('.selected_count').html('');
        }
    });
    
    // Iterate over active filter values
    $('.categories_filters_option.active').each(function() {
        filter_string = $(this).attr('filter_val');
        if (filter_string != '') {
            filters_array.push('.' + filter_string);
        }
    });
    
    topic_filter = filters_array.join(',');
    
    if (topic_filter != '') {
        $('.work_filters .categories_filters_option:last-child a').removeClass('active');
        filter += topic_filter;
        $('body').addClass('filtered_grid');
    }
    
    $('.grid_item.isotope-inactive').removeClass('isotope-inactive');
    $('.grid_item.isotope-active').removeClass('isotope-active');
    
    if (filter != '') {
        $('.grid_item:not(' + filter + ')').each(function() {
            $(this).addClass('isotope-inactive');
        });
        $(filter).each(function() {
            $(this).addClass('isotope-active');
        });
    }
    
    $('body').addClass('block_show_effects');
    sorting = setInterval(function() {
        fix_parallax();
    }, 10);
    
    $grid.isotope({
        getSortData: {
            name: function($elem) {
                return $($elem).hasClass('isotope-active') ? 'a' : 'b';
            }
        },
        sortBy: ['name'],
        sortAscending: true
    });
    
    $grid.isotope('updateSortData').isotope();
}

// Function to initialize the project section
function init_project() {
    project_id = $('#this_project_id').val();
    if (posts_colors[project_id]['general_color']) {
        var $styles = '<style>';
        $styles += '.section_color{';
        $styles += 'color:' + posts_colors[project_id]['general_color'] + ';' + '}' + '.section_color .underline:after{' + 'background-color:' + posts_colors[project_id]['general_color'] + ';' + '}';
        $styles += '</style>';
        $('.project_colors_styles').html($styles);
    }
    $('.underline_link a').addClass('underline');
    $('.add_fade p').attr('data-aos', 'fade-up');
    $('.scale_prop').each(function() {
        var $ob = $(this);
        var $ob_width = $ob.attr('o_width');
        var $ob_height = $ob.attr('o_height');
        if ($ob_width && $ob_height) {
            $ob.keepRatio('width', $ob_width, $ob_height);
        }
    });
    $grid = $('.main_grid').isotope({
        itemSelector: '.grid_item',
    });
    $('.mobile_accordion_header_btn').click(function() {
        if (!$('.mobile_accordion').hasClass('open')) {
            $('.mobile_accordion').addClass('open');
            $('.mobile_accordion_body').stop().slideDown();
        } else {
            $('.mobile_accordion').removeClass('open');
            $('.mobile_accordion_body').stop().slideUp();
        }
    });
}

// Function to handle layout events
function onLayout() {
    var scrollTop = custom_get_scroll();
    clearInterval(sorting);
    $items = $('.grid_item');
    $items.each(function() {
        ob = $(this);
        var ob_start = ob.offset().top;
        if ((scrollTop + win_height) >= (ob.offset().top) && !ob.hasClass('start_animation')) {} else {
            if (ob.find('a').hasClass('aos-animate')) {
                ob.find('a').removeClass('aos-animate');
            }
        }
    });
    $('body').removeClass('block_show_effects');
}

// Function to validate a URL
function validURL(str) {
    regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
    if (regexp.test(str)) {
        return true;
    } else {
        return false;
    }
}

// Function to handle screen orientation changes
function change_orientation_action() {
    if (news_swiper) {
        if (window.innerHeight > window.innerWidth) {
            news_swiper.params.slidesPerView = 'auto';
            news_swiper.update();
        } else {
            if ($(window).width() >= 1680) {
                news_swiper.params.slidesPerView = 5;
            } else {
                news_swiper.params.slidesPerView = 4;
            }
            news_swiper.update();
        }
    }
}

// Function to randomize colors
function randomize_colors() {
    var randomIndices = general_colors.map(function(element, index) {
        return {
            index: index,
            value: Math.random()
        };
    }).sort(function(a, b) {
        return a.value - b.value;
    }).slice(0, 3).map(function(element) {
        return element.index;
    });
}
