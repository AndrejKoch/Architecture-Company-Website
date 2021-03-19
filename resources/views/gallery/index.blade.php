@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <a href="/gallery/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Gallery</a>

        </div>
    </div>

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Gallery List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Id</td>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Project Name</td>
                                <td>Advertisement Name</td>
                                <td>Action</td>
                            </tr>

                            @foreach($gallery as $galler)
                                <tr>
                                    <td>{{ $galler->id }}</td>
                                    <td><img src="/assets/img/gallery/thumbnails/{{$galler->image}}" class="img-fluid"></td>
                                    <td>{{ $galler->name }}</td>
                                    <td>@if($galler->project_id != NULL)
                                            {{ $galler->getProject->name }}
                                        @else
                                            n/a
                                        @endif</td>
                                    <td>@if($galler->service_id != NULL)
                                        {{ $galler->getServices->name }}
                                    @else
                                        n/a
                                        @endif</td>

                                    <td>
                                        <a  class="btn btn-warning pull-left" style="margin-top: 6px" href="{{ url('/gallery', [$galler->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('gallery', [$galler->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $gallery->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



