<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">

                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Banner') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="card bg-white shadow default-border-radius">
            <div class="card-body">
                <h5 class="card-title">{{ __('Banner') }}</h5>
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

                <form class="form-horizontal" action="{{ route('banner.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="text" class="hidden" id="id" name="id" value="{{(isset($model->id) ? $model->id : '')}}">

                    <div class="form-group row">
                        <label for="about" class="col-sm-2 text-left control-label col-form-label">{{ __('About') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->about))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->about) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="about" name="about" onChange="previewImage(this)">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('about')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="people" class="col-sm-2 text-left control-label col-form-label">{{ __('People') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->people))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->people) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="people" name="people" onChange="previewImage(this)">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('people')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="specializations" class="col-sm-2 text-left control-label col-form-label">{{ __('Specializations') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->specializations))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->specializations) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="specializations" name="specializations" onChange="previewImage(this)">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('specializations')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="services" class="col-sm-2 text-left control-label col-form-label">{{ __('Services') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->services))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->services) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="services" name="services" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('services')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="community" class="col-sm-2 text-left control-label col-form-label">{{ __('Community') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->community))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->community) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="community" name="community" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('community')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="partnership" class="col-sm-2 text-left control-label col-form-label">{{ __('Partnership') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->partnership))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->partnership) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="partnership" name="partnership" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('partnership')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="volunteering" class="col-sm-2 text-left control-label col-form-label">{{ __('Volunteering') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->volunteering))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->volunteering) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="volunteering" name="volunteering" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('volunteering')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="diversityandinclusion" class="col-sm-2 text-left control-label col-form-label">{{ __('Diversity and Inclusion') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->diversityandinclusion))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->diversityandinclusion) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="diversityandinclusion" name="diversityandinclusion" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('diversityandinclusion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="job" class="col-sm-2 text-left control-label col-form-label">{{ __('Job') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->job))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->job) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="job" name="job" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('job')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="joinabblesearch" class="col-sm-2 text-left control-label col-form-label">{{ __('Join Abblesearch') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->joinabblesearch))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->joinabblesearch) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="joinabblesearch" name="joinabblesearch" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('joinabblesearch')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="salarysurveys" class="col-sm-2 text-left control-label col-form-label">{{ __('Salary Surveys') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->salarysurveys))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->salarysurveys) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="salarysurveys" name="salarysurveys" onChange="previewImage()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('salarysurveys')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact" class="col-sm-2 text-left control-label col-form-label">{{ __('Contact') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->contact))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->contact) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="contact" name="contact" onChange="previewImage(this)">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('contact')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
