@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <a href="/projects/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Project</a>

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
                    <h4 class="card-title ">Projects List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Id</td>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>

                            @foreach($projects as $projects)
                                <tr>
                                    <td>{{ $projects->id }}</td>
                                    <td><img src="/assets/img/projects/thumbnails/{{$projects->image}}" class="img-fluid"></td>
                                    <td>{{ $projects->name }}</td>
                                    <td>{{ $projects->getCategory->name }}</td>
                                    <td> @if($projects->description != NULL)
                                            {!!  Str::limit($projects->description, 150) !!}
                                        @else
                                            N/A
                                        @endif</td>


                                    <td>
                                        <a  class="btn btn-warning pull-left" style="margin-top: 6px" href="{{ url('/projects', [$projects->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('projects', [$projects->id]) }}" method="POST">
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



