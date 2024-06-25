@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h5 class="mb-0">News and events table</h5>
            <div>
                <a href="{{ route('novelties.create') }}" class="btn btn-sm btn-success">Qo'shish</a>
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
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($novelties as $novelty)
                        <tr>
                            <td>{{ ($novelties->currentPage()-1)*$novelties->perPage() + $loop->index+1 }}</td>
                            <td>{{ $novelty->title }}</td>
                            <td>{{ $novelty->type }}</td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <a style="margin-right: 10px;" href="{{ route('novelties.show', $novelty) }}" class="btn btn-sm btn-primary"><i class="ph-eye"></i></a>
                                    <a href="{{ route('novelties.edit',$novelty) }}" class="btn btn-sm btn-info"
                                       style="margin-right: 10px;"><i class="ph-pencil"></i></a>
                                    <form action="{{ route('novelties.destroy',$novelty) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Do you want to delete this news?');"
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
            {{ $novelties->links() }}
        </div>
    </div>
@endsection
