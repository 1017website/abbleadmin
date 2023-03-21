<x-app-layout>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Jobs') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="div-top">
            <a class="btn btn-default" href="{{ route('job.create') }}">{{ __('Create') }}</a>
        </div>

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
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Place') }}</th>
                                <th>{{ __('Company') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Created By') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($model as $row)
                            <tr>
                                <td align="center">{{ $no++; }}</td>
                                <td>{{ ucwords($row->type) }}</td>
                                <td>{{ $row->place }}</td>
                                <td>{{ $row->position }}</td>
                                <td>{{ $row->role }}</td>
                                <td>{{ isset($row->userCreated) ? $row->userCreated->name : '-' }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td class="action-button">
                                    <form action="{{ route('job.delete',$row->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('job.detail',$row->id) }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-default" href="{{ route('job.edit',$row->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
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