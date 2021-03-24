@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/static_page/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Card</a>
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
                    <h4 class="card-title ">About us cards table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Link
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Icon
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($static_page as $sp)
                                <tr>
                                    <td>{{ $sp->id }}</td>
                                    <td>{{ $sp->title }}</td>
                                    <td>{!! $sp->description !!}</td>
                                    <td>{!! $sp->link !!}</td>
                                    <td><img src="/assets/img/static_page/thumbnails/{{$sp->image}}" class="img-fluid"></td>
                                    <td>{!! $sp->icon!!}</td>
                                    <td>
                                        <a class="btn btn-warning pull-left" href="{{ url('/static_page', [$sp->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('/static_page', [$sp->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger pull-left">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
