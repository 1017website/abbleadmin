<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">{{ __('Jobs') }}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Jobs Apply') }}</li>
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

                <div class="table-responsive">
                    <table id="table-list" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th>{{ __('Place') }}</th>
                                <th>{{ __('Company') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($model as $row)
                            <tr>
                                <td align="center">{{ $no++; }}</td>
                                <td>{{ isset($row->job) ? $row->job->place : '-' }}</td>
                                <td>{{ isset($row->job) ? $row->job->position : '-' }}</td>
                                <td>{{ $row->first_name . ' '. $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td class="action-button">
                                    <a class="btn btn-info" href="{{ route('job.apply.detail',$row->id) }}"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <script>
        $('#table-list').DataTable();
    </script>

</x-app-layout>