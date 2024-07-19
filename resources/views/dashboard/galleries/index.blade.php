@extends('dashboard.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h5 class="mb-0">Galleries table</h5>
            <div>
                <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-success">Create</a>
                <button type="button" class="btn btn-primary btn-sm">Filter</button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($galleries as $gallery)
                    @if($gallery->img)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Image</h5>
                                </div>

                                <div class="card-body">
                                    <div class="ratio ratio-16x9">
                                        <img class="w-100"
                                             src="{{ asset('storage/files/galleries/images/'.$gallery->img) }}"/>
                                    </div>
                                </div>
                                <div class="card-footer" style="text-align: right">
                                    <form action="{{ route('galleries.destroy',$gallery) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Do you want to delete this gallery?');"
                                            type="submit" class="btn btn-sm btn-danger w-100"><i class="ph-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($gallery->video)
                        <div class="col-md-4">
                            <!-- Object element -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Video</h5>
                                </div>

                                <div class="card-body">
                                    <div class="ratio ratio-16x9">
                                        <img class="w-100"
                                             src="{{ asset('storage/files/galleries/videos/'.$gallery->video) }}"/>
                                    </div>
                                    {{--                                        <div class="text-center">--}}
                                    {{--                                            <h5>Video mavjud emas!</h5>--}}
                                    {{--                                            <img class="w-25 h-25" src="{{ asset('404.png') }}" alt="">--}}
                                    {{--                                        </div>--}}
                                </div>
                                <div class="card-footer" style="text-align: right">
                                    <form action="{{ route('galleries.destroy',$gallery) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Do you want to delete this gallery?');"
                                            type="submit" class="btn btn-sm btn-danger w-100"><i class="ph-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="card-footer">
            {{ $galleries->links() }}
        </div>
    </div>
@endsection
