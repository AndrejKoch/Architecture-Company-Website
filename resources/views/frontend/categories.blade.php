@extends('layouts.frontend')
@section('content')
    <section id="categories" class="g-theme-bg-gray-light-v2 g-py-100">
        <div class="container content-sm">
            <div class="container text-center g-max-width-750 g-mb-70">
                <div class="text-uppercase">
                    <div class="text-center">
                        <h3 class="h3 g-letter-spacing-5 g-font-size-22 g-font-weight-400 g-color-primary g-mb-25"></h3>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-0">
                <div class="row no-gutters">
                    @foreach($category as $category)
                        <div class="col-md-6 col-lg-4 g-parent g-theme-bg-blue-dark-v1--hover g-transition-0_2 g-transition--ease-in">
                                <div class="text-center text-uppercase g-pa-30">
                                <h3 class="h6 g-letter-spacing-2 g-font-weight-700 g-color-white--parent-hover mb-0 g-transition-0_2 g-transition--ease-in">
                                    <a href="/category/{{ $category->slug }}" class="btn-sm-link">{{$category->name}}</a></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
