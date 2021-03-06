@extends('layouts.frontend')
@section('content')
    <section id="projects" class="g-theme-bg-gray-light-v2 g-py-100">
        <div class="cube-portfolio container margin-bot-60">
            <div id="grid-container" class="cbp-l-grid-agency">
                @foreach($project->gallery as $gall)
                        <div class="cbp-item graphic">
                            <div class="cbp-caption">
                                <div class="cbp-caption-defaultWrap">
                                    <img class="gallery-custom" src="/assets/img/gallery/thumbnails/{{$gall->image}}" alt="">
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
                        <h3 class="text-center h3 g-letter-spacing-5 g-font-size-22 g-font-weight-400 g-color-primary g-mb-25">{{$project->name}}</h3>
                        <p>{!! $project->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
