@extends('layouts.frontend')

@section('content')
    <section id="projects" class="g-theme-bg-gray-light-v2 g-py-100">
        <div class="cube-portfolio container margin-bot-60">
            <div id="grid-container" class="cbp-l-grid-agency">

                @foreach($services->gallery as $gall)
                    <div class="cbp-item graphic">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <img  style="height: 250px;object-fit: cover;" src="/assets/img/gallery/thumbnails/{{$gall->image}}" alt="">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <ul class="link-captions">
                                            <li><a href="/assets/img/gallery/originals/{{$gall->image}}" class="cbp-lightbox"><i class="rounded-x fa fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container g-mt-45">
                <div class="col-md-12">
                    <div class="mb-5">
                        <h3 class="text-center h3 g-letter-spacing-5 g-font-size-22 g-font-weight-400 g-color-primary g-mb-25">{{$services->name}}</h3>
                        <div class="container text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10 icon-color-custom">grid_on</i>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <p>{{$services->size}}</p>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10 icon-color-custom">local_hotel</i>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <p> {{ $services->bedrooms }}</p>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10 icon-color-custom">bathtub</i>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <p> {{ $services->toilets }}</p>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10 icon-color-custom">room</i>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <p> {{ $services->location }}</p>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <i class="material-icons margin-left-10 icon-color-custom">euro_symbol</i>
                                </li>
                                <li class="list-inline-item margin-left-10">
                                    <p> {{ $services->price }}</p>
                                </li>
                            </ul>
                        </div>
                        <p>{!! $services->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
