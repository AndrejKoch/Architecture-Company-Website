@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/partners/create" class="btn btn-round btn-info"><i class="material-icons">add_circle</i> Add
                Partner</a>
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
                    <h4 class="card-title ">Partners List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Id</td>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>{{ $partner->id }}</td>
                                    <td><img src="/assets/img/partners/thumbnails/{{$partner->image}}"
                                             class="img-fluid"></td>
                                    <td>{{ $partner->name }}</td>
                                    <td>
                                        <a class="btn btn-warning pull-left"
                                           href="{{ url('/partners', [$partner->id, 'edit']) }}">Edit</a>
                                        <form action="{{ url('partners', [$partner->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $partners->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
