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
                <h4 class="card-title">Edit gallery</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/gallery', [$gallery->id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $gallery->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group bmd-form-group">
                                <div class="file_input_div">
                                    <div class="file_input">
                                        <label
                                            class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
                                            Upload Image
                                            <i class="material-icons">file_upload</i>
                                            <input id="file_input_file" class="none" type="file" name="image"/>
                                        </label>
                                    </div>
                                    <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
                                        <input class="file_input_text mdl-textfield__input" type="text" disabled
                                               readonly
                                               id="file_input_text"/>
                                        <label class="mdl-textfield__label" for="file_input_text"></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @if($errors->has('image'))
                        <span style="color: red">{{ $errors->first('image') }}</span>
                    @endif
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <p>Select project</p>
                            <select type="text" class="form-control @error('project_id') is-invalid @enderror"
                                    name="project_id">
                                <option></option>
                            @foreach($projects as $project)
                                    <option value="{{ $project->id }}" @if($gallery->project_id == $project->id) selected @endif>{{ $project->name }}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('project_id') }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <p>Select advertisement</p>
                            <select type="text" class="form-control @error('service_id') is-invalid @enderror"
                                    name="service_id">
                                <option></option>
                            @foreach($services as $service)
                                    <option value="{{ $service->id }}" @if($gallery->service_id == $service->id) selected @endif>{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('service_id') }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update gallery image</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var fileInputTextDiv = document.getElementById('file_input_text_div');
        var fileInput = document.getElementById('file_input_file');
        var fileInputText = document.getElementById('file_input_text');

        fileInput.addEventListener('change', changeInputText);
        fileInput.addEventListener('change', changeState);

        function changeInputText() {
            var str = fileInput.value;
            var i;
            if (str.lastIndexOf('\\')) {
                i = str.lastIndexOf('\\') + 1;
            } else if (str.lastIndexOf('/')) {
                i = str.lastIndexOf('/') + 1;
            }
            fileInputText.value = str.slice(i, str.length);
        }

        function changeState() {
            if (fileInputText.value.length != 0) {
                if (!fileInputTextDiv.classList.contains("is-focused")) {
                    fileInputTextDiv.classList.add('is-focused');
                }
            } else {
                if (fileInputTextDiv.classList.contains("is-focused")) {
                    fileInputTextDiv.classList.remove('is-focused');
                }
            }
        }
    </script>
@endsection
