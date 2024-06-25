@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <form action="{{ route('novelties.update',$novelty) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h5 class="mb-0">Create news and events change</h5>
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
                              placeholder="Title">{{ $novelty->title }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="description" class="form-label">Description<span
                            class="text-danger fw-bold">*</span></label>
                    <textarea name="description" id="description" rows="10" cols="3" class="form-control"
                              placeholder="Description">{{ $novelty->description }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="image" class="form-label">News or Events image enter <span class="text-danger">(png,jpeg,jpg)</span></label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-start">
                    @if($novelty->type == 'news')
                        <div class="form-check form-switch me-4">
                            <input type="radio" name="type" class="form-check-input form-check-input-success" id="news"
                                   value="news" checked>
                            <label class="form-check-label" for="news">News <span
                                    class="text-danger fw-bold">*</span></label>
                        </div>
                        <div class="form-check form-switch">
                            <input type="radio" name="type" class="form-check-input form-check-input-success"
                                   id="events"
                                   value="events">
                            <label class="form-check-label" for="events">Events <span
                                    class="text-danger fw-bold">*</span></label>
                        </div>
                    @elseif($novelty->type == 'events')
                        <div class="form-check form-switch me-4">
                            <input type="radio" name="type" class="form-check-input form-check-input-success" id="news"
                                   value="news">
                            <label class="form-check-label" for="news">News <span
                                    class="text-danger fw-bold">*</span></label>
                        </div>
                        <div class="form-check form-switch">
                            <input checked type="radio" name="type" class="form-check-input form-check-input-success"
                                   id="events"
                                   value="events">
                            <label class="form-check-label" for="events">Events <span
                                    class="text-danger fw-bold">*</span></label>
                        </div>
                    @else
                        <div class="form-check form-switch me-4">
                            <input type="radio" name="type" class="form-check-input form-check-input-success" id="news"
                                   value="news">
                            <label class="form-check-label" for="news">News <span
                                    class="text-danger fw-bold">*</span></label>
                        </div>
                        <div class="form-check form-switch">
                            <input type="radio" name="type" class="form-check-input form-check-input-success"
                                   id="events"
                                   value="events">
                            <label class="form-check-label" for="events">Events <span
                                    class="text-danger fw-bold">*</span></label>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">Update <i class="ph-paper-plane-tilt ms-2"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
