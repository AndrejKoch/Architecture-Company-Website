@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <a href="/counter/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add Counter</a>

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
                    <h4 class="card-title ">Counter List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Icon</td>
                                <td>Number</td>
                                <td>Action</td>
                            </tr>

                            @foreach($counter as $counter)
                                <tr>
                                    <td>{{ $counter->id }}</td>
                                    <td>{{ $counter->name }}</td>
                                    <td>{{ $counter->icon }}</td>
                                    <td>{{ $counter->number }}</td>

                                    <td>
                                        <a  class="btn btn-warning pull-left" style="margin-top: 6px" href="{{ url('/counter', [$counter->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('counter', [$counter->id]) }}" method="POST">
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



