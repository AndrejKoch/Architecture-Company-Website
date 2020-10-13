@extends('layouts.frontend')


@section('slider')
    <!-- Section Content -->
    <section id="home" class="u-bg-overlay g-pos-rel g-theme-bg-blue-dark-v1-opacity-0_8--after">
        <div class="js-carousel"
             data-autoplay="true"
             data-infinite="true"
             data-fade="true"
             data-speed="5000">

            @foreach($sliders as $slider)
                <div class="js-slide g-bg-img-hero g-height-100vh"
                     style="background-image: url('/assets/img/slider/originals/{{$slider->image}}');"></div>
            @endforeach
        </div>

        <div class="u-bg-overlay__inner g-absolute-centered w-100">
            <div class="container text-center g-max-width-750">
                <div class="text-uppercase u-heading-v2-4--bottom u-promo-title g-brd-primary">
                    <h3 class="h3 g-letter-spacing-7 g-font-size-12 g-font-weight-400 g-color-white g-mb-25">{{ $settings->link }}</h3>
                    <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-3 g-font-size-75 g-color-white mb-0">{{ $settings->title }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Content -->
@endsection

@section('about')
    <section id="about" class="g-pt-100 g-pb-100--md">
        <div class="container text-center g-max-width-750 g-mb-70">
            <div class="text-uppercase u-heading-v2-4--bottom g-brd-primary">
                <h3 class="h3 g-letter-spacing-5 g-font-size-12 g-font-weight-400 g-color-primary g-mb-25">{{ $settings->ctitle1 }}</h3>
                <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-2 g-font-size-30 g-font-size-40--md mb-0">{{ $settings->calttitle1 }}</h2>
            </div>
        </div>

        <div class="container px-0">
            <!-- Row -->
            <div class="row no-gutters">
                @foreach($staticpage->take(4) as $staticpage)
                    <div class="col-md-6 col-lg-3">
                        <div class="g-bg-img-hero"
                             style="background-image: url('/assets/img/static_page/medium/{{$staticpage->image}}');">
                            <div class="g-theme-bg-blue-dark-v3 g-opacity-1 g-opacity-0_8--hover g-py-50 g-px-15 g-pa-100-30--sm g-transition-0_2 g-transition--ease-in">
                                <span aria-hidden="true" style="font-size: 30px;color: #c74645;" class="{{$staticpage->icon}} icon"></span>
                                <h3 class="text-uppercase g-line-height-1_2 g-font-weight-700 g-color-white g-mb-25">{{$staticpage->title}}</h3>
                                <p class="g-font-size-13 g-color-white-opacity-0_7 g-mb-30">{!!  Str::limit($staticpage->description, 280) !!}</p>
                                <a href="/about-us#readmore"
                                   class="text-uppercase g-font-weight-700 g-font-size-11 g-text-underline--none--hover">{{$staticpage->link}}</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <!-- End Row -->
        </div>
    </section>
@endsection

@section('services')
    <section id="services" class="g-theme-bg-blue-dark-v1 g-py-100">
        <div class="container text-center g-max-width-750 g-mb-70">
            <div class="text-uppercase u-heading-v2-4--bottom g-brd-primary g-mb-30">
                <h3 class="h3 g-letter-spacing-5 g-font-size-12 g-font-weight-400 g-color-primary g-mb-25"> {{ $settings->ctitle2 }} </h3>
                <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-2 g-font-size-30 g-font-size-40--md g-color-white mb-0">{{ $settings->calttitle2 }} </h2>
            </div>
        </div>

        <div class="container">
            <!-- Carousel -->
            <div class="js-carousel"
                 data-infinite="true"
                 data-arrows-classes="u-arrow-v1 g-pos-abs g-top-35x g-width-45 g-height-45 g-color-white g-theme-bg-blue-dark-v2 g-bg-primary--hover g-rounded-50x g-transition-0_2 g-transition--ease-in"
                 data-arrow-left-classes="fa fa-chevron-left g-left-0"
                 data-arrow-right-classes="fa fa-chevron-right g-right-0">
                @foreach($services as $services)

                    <div class="js-slide">
                        <div class="container text-center g-max-width-600 g-mb-30">
                            <img class="img-fluid d-inline-block"
                                 src="assets/img/services/originals/{{$services->image}}" alt="Image description">
                        </div>

                        <div class="container text-center g-max-width-550">
                            <h4 class="h6 text-uppercase g-font-weight-700 g-color-white g-mb-20">{{$services->name}}</h4>
                            <p class="g-font-size-default g-color-white-opacity-0_8 g-mb-40">{!!  Str::limit($services->description, 300) !!}</p>
                            <a href="#"
                               class="text-uppercase g-font-weight-700 g-font-size-11 g-text-underline--none--hover">{{$services->link}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Carousel -->
        </div>
    </section>
@endsection

@section('projects')
    <section id="projects" class="g-pt-100 g-pb-100--md">
        <div class="container text-center g-max-width-750 g-mb-70">
            <div class="text-uppercase u-heading-v2-4--bottom g-brd-primary">
                <h3 class="h3 g-letter-spacing-5 g-font-size-12 g-font-weight-400 g-color-primary g-mb-25">{{ $settings->ctitle3 }}</h3>
                <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-2 g-font-size-30 g-font-size-40--md mb-0"> {{ $settings->calttitle3 }}</h2>
            </div>
        </div>

        <div class="container-fluid px-0">
            <div class="row no-gutters">

                @foreach($projects->take(6) as $project)
                    <div
                        class="col-md-6 col-lg-4 g-parent g-theme-bg-blue-dark-v1--hover g-transition-0_2 g-transition--ease-in">
                        <a href="/project/{{$project->slug}}">
                            <img class="img-fluid w-100" style="max-height: 250px"
                                 src="assets/img/projects/originals/{{$project->image}}" alt="Image Description">
                        </a>
                        <div class="text-center text-uppercase g-pa-30">
                            <h2 class="g-letter-spacing-5 g-font-size-11 g-font-weight-400 g-color-gray-dark-v5 g-color-primary--parent-hover g-mb-10 g-transition-0_2 g-transition--ease-in">
                                <a href="/project/{{$project->slug}}" class="btn-sm-link">{{$project->name}}</a></h2>
                            <h3 class="h6 g-letter-spacing-2 g-font-weight-700 g-color-white--parent-hover mb-0 g-transition-0_2 g-transition--ease-in">
                                <a href="/category/{{ $project->getCategory->slug }}"
                                   class="btn-sm-link">{{$project->getCategory->name}}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection


@section('partners')

    <section class="g-theme-bg-blue-dark-v1 g-py-80">
        <div class="container">
            <div class="row">
                <div class="container text-center g-max-width-750 g-mb-70">
                    <div class="text-uppercase g-brd-primary">
                        <h3 class="h3 g-letter-spacing-5 g-font-size-12 g-font-weight-400 g-color-primary g-mb-25">{{ $settings->ctitle4 }}</h3>
                    </div>
                </div>

                <div class="col-lg-12 g-mb-40 g-mb-0--lg">
                    <div class="g-overflow-hidden">
                        <div class="row text-center no-gutters g-ml-minus-1 g-mb-minus-1">
                            @foreach($partners->take(12) as $partner)
                                <div class="col-md-2">
                                    <div class="g-brd-left g-brd-bottom g-theme-brd-blue-dark-v5 g-py-60">
                                        <img class="img-fluid g-opacity-0_6 g-opacity-1--hover g-transition-0_2"
                                             style="max-height: 100px; max-width: 150px"
                                             src="assets/img/partners/medium/{{$partner->image}}"
                                             alt="Image Description">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('map')

    <div class="g-pos-rel g-height-400">
        <div id="map-canvas" class="js-g-map g-pos-abs w-100 h-100"
             data-type="custom"
             data-lat="{{ $settings->lat }}"
             data-lng="{{ $settings->lng }}"
             data-zoom="18"
             data-title="Architecture"
             data-styles='[
                 ["", "", [{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]],
                 ["", "labels", [{"visibility":"on"}]],
                 ["road.highway", "", [{"color":"#cc0033"}]],
                 ["water", "", [{"color":"#f7f4f4"}]]
               ]'
             data-pin="true"
             data-pin-icon="assets/img/pin.png"></div>
    </div>
    <!-- End Google (Map) [custom] -->
@endsection
