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
                            <img class="mb-2 img-fluid img-preview-about" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="about" name="about" onChange="previewImageAbout()">
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
                            <img class="mb-2 img-fluid img-preview-people" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="people" name="people" onChange="previewImagePeople()">
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
                            <img class="mb-2 img-fluid img-preview-specializations" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="specializations" name="specializations" onChange="previewImageSpecializations()">
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
                            <img class="mb-2 img-fluid img-preview-services" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="services" name="services" onChange="previewImageServices()">
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
                            <img class="mb-2 img-fluid img-preview-community" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="community" name="community" onChange="previewImageCommunity()">
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
                            <img class="mb-2 img-fluid img-preview-partnership" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="partnership" name="partnership" onChange="previewImagePartnership()">
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
                            <img class="mb-2 img-fluid img-preview-volunteering" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="volunteering" name="volunteering" onChange="previewImageVolunteering()">
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
                            <img class="mb-2 img-fluid img-preview-diversityandinclusion" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="diversityandinclusion" name="diversityandinclusion" onChange="previewImageDiversityandinclusion()">
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
                            <img class="mb-2 img-fluid img-preview-job" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="job" name="job" onChange="previewImageJob()">
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
                            <img class="mb-2 img-fluid img-preview-joinabblesearch" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="joinabblesearch" name="joinabblesearch" onChange="previewImageJoinabblesearch()">
                                <label class="custom-file-label" for="validatedCustomFile">{{ __('Choose file...') }}</label>
                                @error('joinabblesearch')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="salarysurveys" class="col-sm-2 text-left control-label col-form-label">{{ __('Knowledge') }}</label>
                        <div class="col-sm-10">
                            @if(!empty($model->salarysurveys))
                            <a style="color:#2962FF;white-space: nowrap;" href="{{ asset($model->salarysurveys) }}" target="_blank"><i class="fas fa-search"></i> Show Image</a>
                            @endif
                            <img class="mb-2 img-fluid img-preview-salarysurveys" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="salarysurveys" name="salarysurveys" onChange="previewImageSalarysurveys()">
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
                            <img class="mb-2 img-fluid img-preview-contact" style="max-width: 300px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="contact" name="contact" onChange="previewImageContact()">
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
//$(document).ready(function() {
    
        document.querySelector('#about').addEventListener('change', function (e) {
            var fileName = document.getElementById("about").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageAbout() {
            const image = document.querySelector('#about');
            const imgPreview = document.querySelector('.img-preview-about');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#people').addEventListener('change', function (e) {
            var fileName = document.getElementById("people").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImagePeople() {
            const image = document.querySelector('#people');
            const imgPreview = document.querySelector('.img-preview-people');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#specializations').addEventListener('change', function (e) {
            var fileName = document.getElementById("specializations").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageSpecializations() {
            const image = document.querySelector('#specializations');
            const imgPreview = document.querySelector('.img-preview-specializations');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#services').addEventListener('change', function (e) {
            var fileName = document.getElementById("services").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageServices() {
            const image = document.querySelector('#services');
            const imgPreview = document.querySelector('.img-preview-services');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#community').addEventListener('change', function (e) {
            var fileName = document.getElementById("community").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageCommunity() {
            const image = document.querySelector('#community');
            const imgPreview = document.querySelector('.img-preview-community');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#partnership').addEventListener('change', function (e) {
            var fileName = document.getElementById("partnership").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImagePartnership() {
            const image = document.querySelector('#partnership');
            const imgPreview = document.querySelector('.img-preview-partnership');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
                
        document.querySelector('#volunteering').addEventListener('change', function (e) {
            var fileName = document.getElementById("volunteering").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageVolunteering() {
            const image = document.querySelector('#volunteering');
            const imgPreview = document.querySelector('.img-preview-volunteering');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#diversityandinclusion').addEventListener('change', function (e) {
            var fileName = document.getElementById("diversityandinclusion").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageDiversityandinclusion() {
            const image = document.querySelector('#diversityandinclusion');
            const imgPreview = document.querySelector('.img-preview-diversityandinclusion');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#job').addEventListener('change', function (e) {
            var fileName = document.getElementById("job").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageJob() {
            const image = document.querySelector('#job');
            const imgPreview = document.querySelector('.img-preview-job');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#joinabblesearch').addEventListener('change', function (e) {
            var fileName = document.getElementById("joinabblesearch").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageJoinabblesearch() {
            const image = document.querySelector('#joinabblesearch');
            const imgPreview = document.querySelector('.img-preview-joinabblesearch');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#salarysurveys').addEventListener('change', function (e) {
            var fileName = document.getElementById("salarysurveys").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageSalarysurveys() {
            const image = document.querySelector('#salarysurveys');
            const imgPreview = document.querySelector('.img-preview-salarysurveys');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        
        document.querySelector('#contact').addEventListener('change', function (e) {
            var fileName = document.getElementById("contact").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        function previewImageContact() {
            const image = document.querySelector('#contact');
            const imgPreview = document.querySelector('.img-preview-contact');
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            ofReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    
//});
 
    </script>
</x-app-layout>
