<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">{{ __('Jobs') }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('job.apply') }}">{{ __('Jobs Apply') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Detail') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="div-top">
            <a class="btn btn-default" href="{{ route('job.apply') }}">{{ __('Back') }}</a>
        </div>

        <div class="card bg-white shadow default-border-radius">
            <div class="card-body">
                <h5 class="card-title">{{ __('Detail') }}</h5>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Place') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->job->place }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Company') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->job->position }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Role') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->job->role }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('First Name') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->first_name }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Last Name') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->last_name }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Email') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->email }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Phone') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        {{ $model->phone_code .'-'.$model->phone }}
                    </div>
                </div>

                <div class="border-top"></div>
                <div class="row p-3">
                    <div class="col-sm-2">
                        <strong>{{ __('Cv') }}</strong>
                    </div>
                    <div class="col-sm-10">
                        <?php if (!empty($model->cv)) { ?>
                            <a target="_blank" style="color:#2962FF;white-space: nowrap;" href="{{ $urlFrontend.$model->cv }}"><i class="fas fa-search"></i> Download</a>
                        <?php } ?>
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

            </div>
        </div>

    </div>

</x-app-layout>