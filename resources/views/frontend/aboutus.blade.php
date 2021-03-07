@extends('layouts.frontend')


@section('content')
    <!--=== Interactive Slider ===-->
    <section id="aboutus" class="g-py-100 g-theme-bg-blue-dark-v1-opacity-0_8--after">

        <div class="">
            <div class="container">
                <div class="margin-bottom-40 text-uppercase g-brd-primary">
                    <h2 class="text-center u-heading-v2__title g-line-height-1 g-letter-spacing-2 g-font-size-30 g-font-size-40--md mb-0">{{ $settings->ctitle5 }}</h2>
                </div>
                <p>{!! $settings->description !!}</p>
            </div>
        </div>
        <!--=== End Interactive Slider ===-->

        <!--=== Title v1 ===-->
        <div class="container content-sm">
            <div class="title-v1 no-margin-bottom">
                <p id="readmore" class="no-margin-bottom">
                </p>
            </div>
        </div>
        <!--=== End Title v1 ===-->

        <!--=== Service Block v4 ===-->
        <div class="service-block-v4" >
            <div class="container content-sm">
                <div class="row">
                    @foreach($staticPages as $staticPage)
                        <div class="col-md-3 md-margin-bottom-50">
                            <span aria-hidden="true" style="font-size: 30px;color: #c74645;"
                                  class="{{$staticPage->icon}} icon"></span>
                            <h3>{{$staticPage->title}}</h3>
                            <p>{!! $staticPage->description !!}</p>
                        </div>
                    @endforeach

                </div><!--/end row-->
            </div><!--/end container-->
        </div>
        <!--=== End Service Block v4 ===-->


        <!--=== Parallax Counter v4 ===-->
        <div class="parallax-counter-v4 parallaxBg g-theme-bg-blue-dark-v1-opacity-0_8--after">
            <div class="container content-sm">
                <div class="row">
                    @foreach($counter as $counter)
                    <div class="col-md-3 col-xs-6 md-margin-bottom-50">
                        <i class="{{$counter->icon}}" style="color: #c74645;"></i>
                        <span class="counter">{{$counter->number}}</span>
                        <h4>{{$counter->name}}</h4>
                    </div>
                    @endforeach
                </div><!--/end row-->
            </div><!--/end container-->
        </div>
        <!--=== End Parallax Counter v4 ===-->

        <!--=== Team v3 ===-->
        <div class="container content-sm g-pt-100 g-pb-100--md">
            <div class="text-center text-capitalize margin-bottom-60">
                <h3 class="h3 g-letter-spacing-5 g-font-size-20 g-font-weight-400 g-color-primary g-mb-25">{{ $settings->ctitle6 }}</h3>
                <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-2 g-font-size-28 g-font-size-40--md mb-0">{{ $settings->calttitle6 }}</h2>
            </div>

            <div class="row team-v3">
                @foreach($team as $team)
                    <div class="col-md-3 col-sm-6">
                        <div class="team-img">
                            <img class="rounded-circle img-thumbnail img-responsive" src="assets/img/team/medium/{{$team->image}}" alt="">
                            <div class="team-hover">
                                <span>{{$team->name}}</span>
                                <small>{{$team->role}}</small>
                                <p>{{$team->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        <!--/end row-->
        </div>
        <!--=== End Team v3 ===-->
    </section>
@endsection
