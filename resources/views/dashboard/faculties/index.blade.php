@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h5 class="mb-0">global faculties table</h5>
            <div>
                <a href="{{ route('faculties.create') }}" class="btn btn-sm btn-success">Create</a>
                <button type="button" class="btn btn-primary btn-sm">Filter</button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Full name</th>
                        <th>Phone number</th>
                        <th>Job time</th>
                        <th>Job position</th>
{{--                        <th>Description</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faculties as $faculty)
                        <tr>
                            <td>{{ ($faculties->currentPage()-1)*$faculties->perPage() + $loop->index+1 }}</td>
                            <td>{{ $faculty->fullname }}</td>
                            <td>{{ $faculty->phone }}</td>
                            <td>{{ $faculty->job_time }}</td>
                            <td>{{ $faculty->job_position }}</td>
{{--                            <td>{{ \Illuminate\Support\Str::limit($faculty->description, 100, "...") }}</td>--}}
                            <td>
                                <div class="d-flex align-items-center">

                                    <a style="margin-right: 10px;" href="{{ route('faculties.show', $faculty) }}" class="btn btn-sm btn-primary"><i class="ph-eye"></i></a>
                                    <a href="{{ route('faculties.edit',$faculty) }}" class="btn btn-sm btn-info"
                                       style="margin-right: 10px;"><i class="ph-pencil"></i></a>
                                    <form action="{{ route('faculties.destroy',$faculty) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Do you want to delete this employee?');"
                                            type="submit" class="btn btn-sm btn-danger"><i class="ph-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $faculties->links() }}
        </div>
    </div>
@endsection
