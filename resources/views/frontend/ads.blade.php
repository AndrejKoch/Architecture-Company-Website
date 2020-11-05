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
                                        <img class="img-responsive"
                                             style="width: 100%; height: 220px; object-fit: cover;"
                                             src="assets/img/services/thumbnails/{{$service->image}}" alt=""/>
                                    </a>
                                </div>
                                <a class="btn-more hover-effect"
                                   href="/ads-single/{{$service->slug}}">{{ $service->link }}</a>
                            </div>
                            <div class="caption text-center" style="margin-left: 2%; margin-bottom: 5%;">
                                <h4><a class="g-color-white hover-effect"
                                       href="/ads-single/{{$service->slug}}">{{$service->name}}</a>
                                </h4>
                            </div>
                            <div class="container" style="text-align: center;">

                                <ul class="list-inline">
                                    <li class="list-inline-item margin-left-10">
                                        <i class="material-icons margin-left-10" style="color: #c74645;">grid_on</i>
                                    </li>
                                    <li class="list-inline-item margin-left-10">
                                        <p>{{$service->size}}</p>
                                    </li>
                                    <li class="list-inline-item margin-left-10">
                                        <i class="material-icons margin-left-10" style="color: #c74645;">local_hotel</i>
                                    </li>
                                    <li class="list-inline-item margin-left-10">
                                        <p> {{ $service->bedrooms }}</p>
                                    </li>
                                    <li class="list-inline-item margin-left-10">
                                        <i class="material-icons margin-left-10" style="color: #c74645;">bathtub</i>
                                    </li>
                                    <li class="list-inline-item margin-left-10">
                                        <p> {{ $service->toilets }}</p>
                                    </li>
                                    <li class="list-inline-item margin-left-10">
                                        <i class="material-icons margin-left-10" style="color: #c74645;">euro_symbol</i>
                                    </li>
                                    <li class="list-inline-item margin-left-10">
                                        <p> {{ $service->price }}</p>
                                    </li>
                                </ul>

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="material-icons" style="color: #c74645;">room</i>
                                    </li>
                                    <li class="list-inline-item">
                                        <p> {{ $service->location }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
