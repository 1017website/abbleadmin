<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{ __('Community') }}</a></li>
                            <li class="breadcrumb-item"><a href="/community-volunteering">{{ __('Volunteering') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __($status_title) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="div-top">
            <a class="btn btn-default" href="{{ route('volunteering') }}">{{ __('Back') }}</a>
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

                <form class="form-horizontal" action="{{ route('volunteering.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="text" class="hidden" id="id" name="id" value="{{(isset($model->id) ? $model->id : '')}}">

                    <div class="form-group row">
                        <label for="image" class="col-sm-2 text-left control-label col-form-label">{{ __('Image') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->image))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->image) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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