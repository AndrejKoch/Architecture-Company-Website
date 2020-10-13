@extends('layouts.dashboard')
@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <form action="{{ route('counter.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">



                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}">
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
                            <label class="bmd-label-floating">Number</label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror"
                                   name="number" value="{{ old('number') }}">
                            @error('number')
                            <span class="invalid-feedback" number="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
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
                                   name="icon" value="{{ old('icon') }}">
                            @error('icon')
                            <span class="invalid-feedback" icon="alert">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create new counter</button>
            </div>
        </div>
    </form>

@endsection
