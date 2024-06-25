@extends('dashboard.layouts.master')
@section('content')
    <div class="alert alert-primary text-center">
        @if($novelty->type == 'news')
            <span class="fw-semibold fs-2 text-center">News</span>
            <i class="fs-2 ph-info float-end ms-2"></i>
        @else
            <span class="fw-semibold fs-2 text-center">Events</span>
            <i class="fs-2 ph-info float-end ms-2"></i>
        @endif
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Title</h4>
                </div>
                <div class="card-body">
                    <p>{{ $novelty->title }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Description</h4>
                </div>
                <div class="card-body">
                    <p>{{ $novelty->description }}</p>
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
                    @if($novelty->image)
                        <div class="ratio ratio-16x9">
                            <img class="w-100" src="{{ asset('storage/files/news/images/'.$novelty->image) }}"/>
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
