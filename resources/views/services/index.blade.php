@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/services/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Advertisement</a>
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
                    <h4 class="card-title ">Advertisements page table</h4>
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
                                    Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Link
                                </th>
                                <th>
                                    Location
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Size
                                </th>
                                <th>
                                    Bedrooms
                                </th>
                                <th>
                                    Toilets
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{!! Str::limit($service->description, 50) !!}</td>
                                    <td>{{ $service->link }}</td>
                                    <td>{{ $service->location }}</td>
                                    <td>{{ $service->price }}</td>
                                    <td>{{ $service->size }}</td>
                                    <td>{{ $service->bedrooms }}</td>
                                    <td>{{ $service->toilets }}</td>
                                    <td><img src="/assets/img/services/thumbnails/{{$service->image}}" class="img-fluid"></td>
                                    <td>
                                        <a  class="btn btn-warning pull-left" style="margin-top: 6px" href="{{ url('/services', [$service->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('/services', [$service->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger pull-left">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $services->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
