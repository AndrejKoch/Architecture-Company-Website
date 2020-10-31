@extends('layouts.frontend')



@section('content')
    <!--=== Cube-Portfdlio ===-->

    <section id="projects" class="g-theme-bg-gray-light-v2 g-py-100">
        <div class="cube-portfolio container margin-bot-60">
            <div id="grid-container" class="cbp-l-grid-agency">

                @foreach($gallery as $gall)
                    <div class="cbp-item graphic">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <img  style="height: 250px;object-fit: cover;" src="/assets/img/gallery/thumbnails/{{$gall->image}}" alt="">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <ul class="link-captions">
                                            <li><a href="/assets/img/gallery/originals/{{$gall->image}}"
                                                   class="cbp-lightbox"><i
                                                        class="rounded-x fa fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container text-center" style="margin-top: 45px">
                <div class="col-md-12">
                    <div class="mb-5">
                        <h3 class="h3 g-letter-spacing-5 g-font-size-22 g-font-weight-400 g-color-primary g-mb-25">{{$services->name}}</h3>

                        <div class="container" style="text-align: center;">

                            <ul class="list-inline">
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10" style="color: #c74645;">grid_on</i>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <p>{{$services->size}}</p>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10" style="color: #c74645;">local_hotel</i>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <p> {{ $services->bedrooms }}</p>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10" style="color: #c74645;">bathtub</i>
                                </li>
                                <li class="list-inline-item">
                                    <p> {{ $services->toilets }}</p>
                                </li>
                                <li class="list-inline-item">
                                    <i class="material-icons" style="color: #c74645;">room</i>
                                </li>
                                <li class="list-inline-item">
                                    <p> {{ $services->location }}</p>
                                </li>
                                <li class="list-inline-item">
                                    <i class="material-icons" style="color: #c74645;">euro_symbol</i>
                                </li>
                                <li class="list-inline-item">
                                    <p> {{ $services->price }}</p>
                                </li>
                            </ul>
                        </div>
                        <p>{!! $services->description !!}</p>
                    </div>
                </div>
                <!--/end Grid Container-->
            </div>
        </div>
    </section>
@endsection



