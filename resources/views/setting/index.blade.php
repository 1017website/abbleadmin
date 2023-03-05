<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Setting') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="card bg-white shadow default-border-radius">
            <div class="card-body">
                <h5 class="card-title">{{ __('Data') }}</h5>
                <div class="border-top"></div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {!! $message !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('setting.save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }} 

                    <input type="hidden" name="id" value="{{ (($model) ? $model->id : '') }}">

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 text-left control-label col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Email" type="email" id="email" name="email" value="{{old('email', (isset($model->email) ? $model->email : ''))}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 text-left control-label col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Name" type="text" id="name" name="name" value="{{old('name', (isset($model->name) ? $model->name : ''))}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="domain_frontend" class="col-sm-2 text-left control-label col-form-label">{{ __('Frontend Url') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Domain Frontend" type="text" id="domain_frontend" name="domain_frontend" value="{{old('domain_frontend', (isset($model->domain_frontend) ? $model->domain_frontend : ''))}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="domain_backend" class="col-sm-2 text-left control-label col-form-label">{{ __('Backend Url') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Domain Backend" type="text" id="domain_backend" name="domain_backend" value="{{old('domain_backend', (isset($model->domain_backend) ? $model->domain_backend : ''))}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="maintenance" class="col-sm-2 text-left control-label col-form-label">{{ __('Maintenance') }}</label>
                        <div class="col-sm-10">
                            <div class="form-check mr-sm-2">
                                <input type="checkbox" class="form-check-input" id="maintenance" name="maintenance" <?= (isset($model) ? ($model->maintenance == 1 ? 'checked' : '') : '') ?>>
                                <label class="form-check-label mb-0" for="customControlAutosizing1" style="vertical-align: sub;">On/Off</label>
                            </div>
                        </div>
                    </div>

                    <div class="border-top"></div>
                    <button type="submit" class="btn btn-default btn-action">Update</button>

                </form>

            </div>
        </div>

    </div>

    <script>

    </script>

</x-app-layout>