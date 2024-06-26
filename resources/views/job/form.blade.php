<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/job">{{ __('Job') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __($status_title) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="div-top">
            <a class="btn btn-default" href="{{ route('job') }}">{{ __('Back') }}</a>
        </div>

        <div class="card bg-white shadow default-border-radius">
            <div class="card-body">
                <h5 class="card-title">{{ __('Form') }}</h5>
                <div class="border-top"></div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>{{ __('Whoops! ') }}</strong>{{ __('There were some problems with your input.') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="form-horizontal" action="{{ route('job.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="text" class="hidden" id="id" name="id" value="{{(isset($model->id) ? $model->id : '')}}">

                    <div class="form-group row">
                        <label for="type" class="col-sm-2 text-left control-label col-form-label">{{ __('Type') }}</label>
                        <div class="col-sm-10">
                            <select class="select2 form-control custom-select" id="type" name="type" style="width: 100%;">
                                <option value="jobs">Jobs</option>
                                <option value="join abblesearch">Join Abblesearch</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="place" class="col-sm-2 text-left control-label col-form-label">{{ __('Place') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Place" type="text" id="place" name="place" value="{{old('place', (isset($model->place) ? $model->place : ''))}}"  required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position" class="col-sm-2 text-left control-label col-form-label">{{ __('Company') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Company" type="text" id="position" name="position" value="{{old('position', (isset($model->position) ? $model->position : ''))}}"  required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 text-left control-label col-form-label">{{ __('Role') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Role" type="text" id="role" name="role" value="{{old('role', (isset($model->role) ? $model->role : ''))}}"  required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 text-left control-label col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-10">
                            <textarea id="description" name="description">{{old('description', (isset($model->description) ? $model->description : ''))}}</textarea>
                        </div>
                    </div>

                    <div class="border-top"></div>
                    <button type="submit" class="btn btn-default btn-action">Save</button>
                </form>

            </div>
        </div>

    </div>
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = document.getElementById("image").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
</x-app-layout>