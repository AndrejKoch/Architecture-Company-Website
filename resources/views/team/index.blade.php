@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <a href="/team/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Team Member</a>

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
                    <h4 class="card-title ">Team List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Id</td>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Role</td>
                                <td>Action</td>
                            </tr>

                            @foreach($team as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td><img src="/assets/img/team/thumbnails/{{$team->image}}" class="img-fluid"></td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->description }}</td>
                                    <td>{{ $team->role }}</td>

                                    <td>
                                        <a  class="btn btn-warning pull-left" style="margin-top: 6px" href="{{ url('/team', [$team->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('team', [$team->id]) }}" method="POST">
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



