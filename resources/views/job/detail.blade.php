<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('job') }}">{{ __('Job') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Detail') }}</li>
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
                <h5 class="card-title">{{ __('Detail') }}</h5>
                <div class="border-top"></div>

                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Type') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ ucwords($model->type) }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Place') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->place }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Company') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->position }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Role') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->role }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Description') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {!! $model->description !!}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Created By') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ isset($model->userCreated) ? $model->userCreated->name : '-' }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Updated By') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ isset($model->userUpdated) ? $model->userUpdated->name : '-' }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Created At') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->created_at }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Updated At') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->updated_at }}
                    </div>
                </div>


            </div>
        </div>

    </div>

</x-app-layout>