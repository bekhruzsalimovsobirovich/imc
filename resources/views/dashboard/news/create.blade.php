@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <form action="{{ route('novelties.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h5 class="mb-0">Create news and events</h5>
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
                    <label for="description" class="form-label">Description<span
                            class="text-danger fw-bold">*</span></label>
                    <textarea name="description" id="description" rows="10" cols="3" class="form-control"
                              placeholder="Description">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image" class="form-label">News or Events image enter <span class="text-danger">(png,jpeg,jpg)</span></label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-start">

                    <div class="form-check form-switch me-4">
                        <input type="radio" name="type" class="form-check-input form-check-input-success" id="news"
                               value="news" checked>
                        <label class="form-check-label" for="news">News <span
                                class="text-danger fw-bold">*</span></label>
                    </div>

                    <div class="form-check form-switch  me-4">
                        <input type="radio" name="type" class="form-check-input form-check-input-success" id="events"
                               value="events">
                        <label class="form-check-label" for="events">Events <span
                                class="text-danger fw-bold">*</span></label>
                    </div>

                    <div class="form-check form-switch me-4">
                        <input type="radio" name="type" class="form-check-input form-check-input-success" id="graduation"
                               value="graduation">
                        <label class="form-check-label" for="graduation">Graduation ceremony<span
                                class="text-danger fw-bold">*</span></label>
                    </div>

                    <div class="form-check form-switch me-4">
                        <input type="radio" name="type" class="form-check-input form-check-input-success" id="exchange"
                               value="exchange">
                        <label class="form-check-label" for="exchange">Exchange program <span
                                class="text-danger fw-bold">*</span></label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">Save <i class="ph-paper-plane-tilt ms-2"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
