
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>{{ $settings->title }}</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/frontend/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/frontend/css/simple-line-icons.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="/frontend/css/hamburgers.min.css">
    <link rel="stylesheet" href="/frontend/css/animate.css">
    <link rel="stylesheet" href="/frontend/css/slick.css">

    <link rel="stylesheet" href="/frontend/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="/frontend/cubeportfolio/custom/custom-cubeportfolio.css">

    <!-- CSS Template -->
    <link rel="stylesheet" href="/frontend/css/styles.op-architecture.css">

    <!-- CSS Customization -->
</head>

<body>
<main>
    <!-- Header v1 -->
    <header id="js-header" class="u-header u-header--sticky-top u-header--change-appearance"
            data-header-fix-moment="100">
        <div class="dark-theme u-header__section g-bg-black-opacity-0_4 g-transition-0_3 g-py-8 g-py-17--md"
             data-header-fix-moment-exclude="dark-theme g-bg-black-opacity-0_4 g-py-17--md"
             data-header-fix-moment-classes="light-theme u-theme-shadow-v1 g-bg-white g-py-10--md">
            <nav class="navbar navbar-expand-lg p-0 g-px-15">
                <div class="container g-pos-rel">
                    <a href="/" class="g-hidden-lg-up navbar-brand mr-0">
                        <img class="d-block g-width-32 g-width-32--md"  src="/assets/img/logo/originals/{{ $settings->logo }}" alt="Image Description"
                             data-header-fix-moment-exclude="d-block"
                             data-header-fix-moment-classes="d-none">

                        <img class="d-none g-width-32 g-width-32--md" src="/assets/img/logo/originals/{{ $settings->logo }} " alt="Image Description"
                             data-header-fix-moment-exclude="d-none"
                             data-header-fix-moment-classes="d-block">
                    </a>

                    <!-- Navigation -->
                    <div class="collapse navbar-collapse align-items-center flex-sm-row" id="navBar" data-mobile-scroll-hide="true">
                        <ul class="js-scroll-nav navbar-nav align-items-lg-center text-uppercase g-font-weight-700 g-letter-spacing-1 g-font-size-12 g-pt-20 g-pt-0--lg mx-auto"
                            data-splitted-breakpoint="992">

                            <li class="nav-item g-mr-30--lg g-mb-7 g-mb-0--lg">
                                <a href="/" class="nav-link p-0">Home</a>
                            </li>
                            <li class="nav-item g-mx-30--lg g-mb-7 g-mb-0--lg">
                                <a href="#about" class="nav-link p-0">About</a>
                            </li>
                            <li class="nav-item g-mx-30--lg g-mb-7 g-mb-0--lg">
                                <a href="#services" class="nav-link p-0">Services</a>
                            </li>


                            <!-- Logo -->
                            <li class="g-hidden-lg-down nav-logo-item g-mx-15--lg">
                                <a href="/" class="js-go-to navbar-brand mr-0"
                                   data-type="static">
                                    <img class="d-block g-width-32 g-width-32--md" src="/assets/img/logo/originals/{{ $settings->logo }}" alt="Image Description"
                                         data-header-fix-moment-exclude="d-block"
                                         data-header-fix-moment-classes="d-none">

                                    <img class="d-none g-width-32 g-width-32--md" src="/assets/img/logo/originals/{{ $settings->logo }} " alt="Image Description"
                                         data-header-fix-moment-exclude="d-none"
                                         data-header-fix-moment-classes="d-block">
                                </a>
                            </li>
                            <!-- End Logo -->

                            <li class="nav-item g-mx-30--lg g-mb-7 g-mb-0--lg {{ request()->is('projects') ? 'active' : ''}}">
                                <a href="{{ url('projects') }}" class="nav-link p-0">Projects</a>
                            </li>
                            <li class="nav-item g-mx-30--lg g-mb-7 g-mb-0--lg {{ request()->is('categories-all') ? 'active' : ''}}">
                                <a href="{{ url('categories-all') }}" class="nav-link p-0">Categories</a>
                            </li>
                            <li class="nav-item g-ml-30--lg">
                                <a href="#contact" class="nav-link p-0">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Navigation -->

                    <!-- Responsive Toggle Button -->
                    <button class="navbar-toggler btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-15 g-right-0" type="button"
                            aria-label="Toggle navigation"
                            aria-expanded="false"
                            aria-controls="navBar"
                            data-toggle="collapse"
                            data-target="#navBar">
                <span class="hamburger hamburger--slider">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
                    </button>
                    <!-- End Responsive Toggle Button -->
                </div>
            </nav>
        </div>
    </header>

    <!-- End Header v1 -->
    <!-- Section Content -->
   @yield('slider')
    <!-- End Section Content -->

    <!-- Section Content -->
    @yield('about')
    <!-- End Section Content -->

    <!-- Timeline -->
    @yield('services')
    <!-- End Timeline -->

    <!-- Section Content -->
   @yield('projects')
    <!-- End Section Content -->

    <!-- Section Content -->
    <!-- End Section Content -->
    @yield('content')


    <!-- Section Content -->
    @yield('partners')
    <!-- End Section Content -->

    <!-- Footer -->
    <footer>
        <div id="contact" class="g-py-80">
            <div class="container">
                <div class="container text-center g-max-width-750 g-mb-70">
                    <div class="text-uppercase u-heading-v2-4--bottom g-brd-primary">
                        <h3 class="h3 g-letter-spacing-5 g-font-size-12 g-font-weight-400 g-color-primary g-mb-25">Contact us</h3>
                        <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-2 g-font-size-30 g-font-size-40--md mb-0">Keep in touch</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 g-mb-25 g-mb-0--md">
                        <form action="/send-message" method="post">
                            {{ csrf_field() }}
                        <div class="row">


                            <div class="col-sm-6 form-group g-mb-30">
                                <input id="inputGroup1_1" class="form-control h-100 g-font-size-14 g-theme-bg-gray-light-v2 g-brd-none g-rounded-1 g-py-14 g-px-10" type="text" placeholder="Your name" name="name">
                            </div>

                            <div class="col-sm-6 form-group g-mb-30">
                                <input id="inputGroup1_2" class="form-control h-100 g-font-size-14 g-theme-bg-gray-light-v2 g-brd-none g-rounded-1 g-py-14 g-px-10" type="tel" placeholder="Your phone" name="phone">
                            </div>

                            <div class="col-sm-6 form-group g-mb-30">
                                <input id="inputGroup1_3" class="form-control h-100 g-font-size-14 g-theme-bg-gray-light-v2 g-brd-none g-rounded-1 g-py-14 g-px-10" type="email" placeholder="Email *" name="email">
                            </div>

                            <div class="col-sm-6 form-group g-mb-30">
                                <input id="inputGroup1_4" class="form-control h-100 g-font-size-14 g-theme-bg-gray-light-v2 g-brd-none g-rounded-1 g-py-14 g-px-10" type="text" placeholder="Subject" name="subject">
                            </div>

                            <div class="col-md-12 form-group g-mb-30">
                                <textarea id="inputGroup1_5" class="form-control g-resize-none g-font-size-14 g-theme-bg-gray-light-v2 g-brd-none g-rounded-1 g-py-14 g-px-10" rows="4" placeholder="Message" name="message"></textarea>
                            </div>

                        </div>

                        <div class="text-center">
                            <button class="btn u-btn-primary btn-md text-uppercase g-line-height-1 g-font-weight-700 g-font-size-11 rounded-0 g-py-12 g-px-25 mb-0" type="submit" role="button">Send message</button>
                        </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <address class="row text-center">
                            <div class="col-sm-4 col-md-12 g-mb-30">
                                <i class="icon-directions icon d-inline-block g-font-size-20 g-color-primary g-mb-7"></i>
                                <h3 class="text-uppercase g-font-size-12 g-color-gray-dark-v5 g-font-weight-400 g-mb-5">Address</h3>
                                <strong class="g-font-size-14 g-color-black">{{ $settings->address }}</strong>
                            </div>

                            <div class="col-sm-4 col-md-12 g-mb-30">
                                <i class="icon-call-in icon d-inline-block g-font-size-20 g-color-primary g-mb-7"></i>
                                <h3 class="text-uppercase g-font-size-12 g-color-gray-dark-v5 g-font-weight-400g-mb-5">Phone number</h3>
                                <strong class="g-font-size-14 g-color-black">{{ $settings->phone }}</strong>
                            </div>

                            <div class="col-sm-4 col-md-12">
                                <i class="icon-envelope-open icon d-inline-block g-font-size-20 g-color-primary g-mb-7"></i>
                                <h3 class="text-uppercase g-font-size-12 g-color-gray-dark-v5 g-font-weight-400 g-mb-5">Email</h3>
                                <a class="g-color-black g-color-black--hover"><strong class="g-font-size-14">{{ $settings->email }}</strong></a>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google (Map) [custom] -->
       @yield('map')

        <div class="text-center g-color-gray-dark-v5 g-theme-bg-blue-dark-v1 g-py-70">
            <a class="d-block g-width-140 mx-auto g-mb-30" href="/">
                <img class="img-fluid" src="/assets/img/logo/originals/{{ $settings->logo }}" style="height: 64px;" alt="Image description">
            </a>

            <ul class="list-inline d-inline-block mb-0">
                <li class="list-inline-item g-mr-10">
                    <a class="u-icon-v3 g-width-35 g-height-35 g-font-size-16 g-color-gray-dark-v5 g-color-white--hover g-theme-bg-blue-dark-v2 g-bg-primary--hover g-transition-0_2 g-transition--ease-in" href="#"><i class="fa fa-facebook"></i></a>
                </li>
            </ul>
        </div>
    </footer>
    <!-- End Footer -->

    <a class="js-go-to u-go-to-v1" href="#"
       data-type="fixed"
       data-position='{
           "bottom": 15,
           "right": 15
         }'
       data-offset-top="400"
       data-compensation="#js-header"
       data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
</main>

<!-- JS Global Compulsory -->
<script src="/frontend/js/jquery.min.js"></script>
<script src="/frontend/js/jquery-migrate.min.js"></script>
<script src="/frontend/js/popper.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/frontend/js/appear.js"></script>
<script src="/frontend/js/slick.js"></script>
<script src="/frontend/js/gmaps.min.js"></script>


<script type="text/javascript" src="/frontend/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="/frontend/cubeportfolio/js/cube-portfolio-3.js"></script>
<script src="/frontend/cubeportfolio/js/jquery.cubeportfolio.js"></script>
<script type="text/javascript" src="/frontend/cubeportfolio/js/plugins/style-switcher.js"></script>

<!-- JS Unify -->
<script src="/frontend/js/hs.core.js"></script>
<script src="/frontend/js/hs.header.js"></script>
<script src="/frontend/js/hs.hamburgers.js"></script>
<script src="/frontend/js/hs.scroll-nav.js"></script>
<script src="/frontend/js/hs.tabs.js"></script>
<script src="/frontend/js/hs.carousel.js"></script>
<script src="/frontend/js/hs.map.js"></script>
<script src="/frontend/js/hs.go-to.js"></script>



<!-- JS Customization -->

<!-- JS Plugins Init. -->
<script>
    // initialization of google map
    function initMap() {
        $.HSCore.components.HSGMap.init('.js-g-map');
    }



    $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');


        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of go to section
        $.HSCore.components.HSGoTo.init('.js-go-to');

        $('#processes [role="tablist"] .nav-link').on('click', function () {
            setTimeout(function () {
                $('#processesTabs .js-carousel').slick('setPosition');
            }, 200);
        });


    });


    $(window).on('load', function() {
        // initialization of HSScrollNav
        $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
            duration: 700
        });
    });

    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });
</script>


<script type="text/javascript">
    jQuery(document).ready( function() {
        jQuery('#grid-container').cubeportfolio({
            // options
        });
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        StyleSwitcher.initStyleSwitcher();
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8VZx7pTEJk6GqS4v93d-a9kSgeduiIu4&callback=initMap" async></script>
</body>
</html>
