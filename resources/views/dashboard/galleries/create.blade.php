@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h5 class="mb-0">Create galleries</h5>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
            </div>

            <div class="card-body row">
                <div class="mb-3 col-md-6">
                    <label for="img" class="form-label">Galleries image upload <span class="text-danger">(png,jpeg,jpg)</span></label>
                    <input type="file" name="img" class="form-control" id="img">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="video" class="form-label">Galleries video upload <span class="text-danger">(mp4,avif)</span></label>
                    <input type="file" name="video" class="form-control" id="video">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">Save <i class="ph-paper-plane-tilt ms-2"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
