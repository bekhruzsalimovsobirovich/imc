@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <form action="{{ route('faculties.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h5 class="mb-0">Create global faculty</h5>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
            </div>

            <div class="card-body row">
                <div class="mb-3 col-md-4">
                    <label for="fullname" class="form-label">Full name<span class="text-danger fw-bold">*</span></label>
                    <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Full name" value="{{ old('fullname') }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="phone" class="form-label">Phone number<span class="text-danger fw-bold">*</span></label>
                    <input type="number" id="phone" class="form-control" name="phone" placeholder="Full name" value="{{ old('phone') }}">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="job_time" class="form-label">Job time<span class="text-danger fw-bold">*</span></label>
                    <input type="text" id="job_time" class="form-control" name="job_time" placeholder="08:30 - 18:00" value="{{ old('job_time') }}">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="job_position" class="form-label">Job position<span
                            class="text-danger fw-bold">*</span></label>
                    <textarea name="job_position" id="job_position" rows="10" cols="3" class="form-control"
                              placeholder="Job position">{{ old('job_position') }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="10" cols="3" class="form-control"
                              placeholder="Description">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image" class="form-label">Image <span class="text-danger">(png,jpeg,jpg)</span></label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">Save <i class="ph-paper-plane-tilt ms-2"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
