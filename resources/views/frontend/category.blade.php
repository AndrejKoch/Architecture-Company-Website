@extends('layouts.frontend')

@section('content')

    <section id="services" class="g-theme-bg-gray-light-v2 g-py-100">
        <div class="container content-sm">
            <div class="container text-center g-max-width-750 g-mb-70">
                <div class="text-uppercase">
                    <div class="text-center">
                        <h3 class="h3 g-letter-spacing-5 g-font-size-22 g-font-weight-400 g-color-primary g-mb-25">{{$category->name}}</h3>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-0">
                <div class="row no-gutters">
                    @foreach($projects as $project)
                        <div
                            class="col-md-6 col-lg-4 g-parent g-theme-bg-blue-dark-v1--hover g-transition-0_2 g-transition--ease-in">
                            <a href="/project/{{ $project->slug }}">
                                <img class="img-fluid w-100" style="max-height: 250px"
                                     src="/assets/img/projects/originals/{{$project->image}}" alt="Image Description">
                            </a>
                            <div class="text-center text-uppercase g-pa-30">
                                <h2 class="g-letter-spacing-5 g-font-size-11 g-font-weight-400 g-color-gray-dark-v5 g-color-primary--parent-hover g-mb-10 g-transition-0_2 g-transition--ease-in">
                                    <a href="/project/{{$project->slug}}" class="btn-sm-link">{{$project->name}}</a></h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
