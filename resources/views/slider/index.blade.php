@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/slider/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Slider</a>
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
                    <h4 class="card-title ">Slider List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Id</td>
                                <td>Image</td>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Link</td>
                                <td>Action</td>
                            </tr>
                            @foreach($slider as $s)
                                <tr>
                                    <td>{{ $s->id }}</td>
                                    <td><img src="/assets/img/slider/thumbnails/{{$s->image}}" class="img-fluid"></td>
                                    <td>{{ $s->title }}</td>
                                    <td>{{ $s->description }}</td>
                                    <td>{{ $s->link }}</td>
                                    <td>
                                        <a  class="btn btn-warning pull-left"  href="{{ url('/slider', [$s->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('slider', [$s->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
