@extends('dashboard.layouts.master')
@section('content')
    <div class="alert alert-primary text-center">
        <span class="fw-semibold fs-2 text-center">Global faculty</span>
        <i class="fs-2 ph-info float-end ms-2"></i>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Full name</h4>
                </div>
                <div class="card-body">
                    <p>{{ $faculty->fullname }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Phone number</h4>
                </div>
                <div class="card-body">
                    <p>{{ $faculty->phone }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Job time</h4>
                </div>
                <div class="card-body">
                    <p>{{ $faculty->job_time }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Job position</h4>
                </div>
                <div class="card-body">
                    <p>{{ $faculty->job_position }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Description</h4>
                </div>
                <div class="card-body">
                    <p>{{ $faculty->description }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Object element -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Image</h5>
                </div>

                <div class="card-body">
                    @if($faculty->image)
                        <div class="ratio ratio-16x9">
                            <img class="w-100" src="{{ asset('storage/files/faculties/images/'.$faculty->image) }}"/>
                        </div>
                    @else
                        <div class="text-center">
                            <h5>Rasm mavjud emas!</h5>
                            <img class="w-25 h-25" src="{{ asset('404.png') }}" alt="">
                        </div>
                    @endif
                </div>
            </div>
            <!-- /object element -->
        </div>
    </div>
@endsection
