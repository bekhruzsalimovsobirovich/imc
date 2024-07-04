@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <form action="{{ route('vacancies.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h5 class="mb-0">Create vacancy</h5>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
            </div>

            <div class="card-body row">
                <div class="mb-3 col-md-4">
                    <label for="title" class="form-label">Title<span class="text-danger fw-bold">*</span></label>
                    <textarea id="title" class="form-control" rows="10" cols="3"
                              name="title"
                              placeholder="Title">{{ old('title') }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="10" cols="3" class="form-control"
                              placeholder="Description">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" name="salary" class="form-control" id="salary">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">Save <i class="ph-paper-plane-tilt ms-2"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
