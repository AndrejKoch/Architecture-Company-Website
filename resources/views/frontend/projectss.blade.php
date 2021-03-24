@extends('layouts.frontend')
@section('content')
    <section id="projects" class="g-pt-100 g-pb-100--md">
        <div class="container text-center g-max-width-750 g-mb-70">
            <div class="text-uppercase u-heading-v2-4--bottom g-brd-primary">
                <h3 class="h3 g-letter-spacing-5 g-font-size-12 g-font-weight-400 g-color-primary g-mb-25">{{ $settings->ctitle3 }}</h3>
                <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-2 g-font-size-30 g-font-size-40--md mb-0"> {{ $settings->calttitle3 }}</h2>
            </div>
        </div>
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                @foreach($projects as $project)
                    <div
                        class="col-md-6 col-lg-4 g-parent g-theme-bg-blue-dark-v1--hover g-transition-0_2 g-transition--ease-in">
                        <a href="/project/{{$project->slug}}">
                            <img class="img-fluid w-100 gallery-custom"
                                 src="assets/img/projects/originals/{{$project->image}}" alt="">
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
            <div class="container">
                <div class="row justify-content-center">
                    {!! $projects->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
