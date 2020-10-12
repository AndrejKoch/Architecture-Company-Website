@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/static_page/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Page</a>
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
                    <h4 class="card-title ">Static page table</h4>
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
                            @foreach($static_page as $static_page)
                                <tr>
                                    <td>{{ $static_page->id }}</td>
                                    <td>{{ $static_page->title }}</td>
                                    <td>{!! $static_page->description !!}</td>
                                    <td>{!! $static_page->link !!}</td>
                                    <td><img src="/assets/img/static_page/thumbnails/{{$static_page->image}}" class="img-fluid"></td>
                                    <td>{!! $static_page->icon!!}</td>

                                    <td>

                                        <a  class="btn btn-warning pull-left" style="margin-top: 6px" href="{{ url('/static_page', [$static_page->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('/static_page', [$static_page->id]) }}" method="post">
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
