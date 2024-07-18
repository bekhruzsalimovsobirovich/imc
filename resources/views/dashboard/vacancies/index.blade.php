@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h5 class="mb-0">Vacancies table</h5>
            <div>
                <a href="{{ route('vacancies.create') }}" class="btn btn-sm btn-success">Create</a>
                <button type="button" class="btn btn-primary btn-sm">Filter</button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Salary</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vacancies as $vacancy)
                        <tr>
                            <td>{{ ($vacancies->currentPage()-1)*$vacancies->perPage() + $loop->index+1 }}</td>
                            <td>{{ $vacancy->title }}</td>
                            <td>{{ $vacancy->description }}</td>
                            <td>{{ $vacancy->salary }}</td>
                            <td>{{ $vacancy->type ?? null }}</td>
                            <td>
                                <div class="d-flex align-items-center">

{{--                                    <a style="margin-right: 10px;" href="{{ route('vacancies.show', $vacancy) }}" class="btn btn-sm btn-primary"><i class="ph-eye"></i></a>--}}
{{--                                    <a href="{{ route('vacancies.edit',$vacancy) }}" class="btn btn-sm btn-info"--}}
{{--                                       style="margin-right: 10px;"><i class="ph-pencil"></i></a>--}}
                                    <form action="{{ route('vacancies.destroy',$vacancy) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Do you want to delete this vacancy?');"
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
            {{ $vacancies->links() }}
        </div>
    </div>
@endsection
