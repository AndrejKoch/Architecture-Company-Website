@extends('layouts.dashboard')
@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Counter</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/counter', [$counter->id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $counter->name }}">
                                @error('name')
                                <span class="invalid-feedback" icon="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                       name="icon" value="{{ $counter->icon }}">
                                @error('icon')
                                <span class="invalid-feedback" icon="alert">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Number</label>
                                <input type="text" class="form-control @error('number') is-invalid @enderror"
                                       name="number" value="{{ $counter->number }}">
                                @error('number')
                                <span class="invalid-feedback" number="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update counter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
