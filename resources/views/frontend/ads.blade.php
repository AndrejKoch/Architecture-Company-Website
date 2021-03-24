@extends('layouts.frontend')
@section('content')
    <section id="ads" class="g-py-100">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                        <div class="thumbnails thumbnail-style">
                            <div class="thumbnail-img">
                                <div class="overflow-hidden">
                                    <a href="/ads-single/{{$service->slug}}">
                                        <img class="img-responsive ads-style" src="assets/img/services/thumbnails/{{$service->image}}" alt=""/>
                                    </a>
                                </div>
                                <a class="btn-more hover-effect" href="/ads-single/{{$service->slug}}">
                                    {{ $service->link }}
                                </a>
                            </div>
                            <div class="caption text-center ads-margins">
                                <h4><a class="g-color-black-opacity-0_7 hover-effect"
                                       href="/ads-single/{{$service->slug}}">{{$service->name}}</a>
                                </h4>
                            </div>
                            <div class="container text-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item margin-left-5">
                                        <i class="material-icons margin-left-5 icon-color-custom">grid_on</i>
                                    </li>
                                    <li class="list-inline-item margin-left-5">
                                        <p>{{$service->size}}</p>
                                    </li>
                                    <li class="list-inline-item margin-left-5">
                                        <i class="material-icons margin-left-5 icon-color-custom">local_hotel</i>
                                    </li>
                                    <li class="list-inline-item margin-left-5">
                                        <p> {{ $service->bedrooms }}</p>
                                    </li>
                                    <li class="list-inline-item margin-left-5">
                                        <i class="material-icons margin-left-5 icon-color-custom">bathtub</i>
                                    </li>
                                    <li class="list-inline-item margin-left-5">
                                        <p> {{ $service->toilets }}</p>
                                    </li>
                                    <li class="list-inline-item margin-left-5">
                                        <i class="material-icons margin-left-5 icon-color-custom">euro_symbol</i>
                                    </li>
                                    <li class="list-inline-item margin-left-5">
                                        <p> {{ $service->price }}</p>
                                    </li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="material-icons icon-color-custom">room</i>
                                    </li>
                                    <li class="list-inline-item">
                                        <p> {{ $service->location }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="container">
                    <div class="row justify-content-center">
                        {!! $services->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
