<?php

namespace App\Http\Controllers\Galleries;

use App\Domain\Galleries\Actions\StoreGalleryAction;
use App\Domain\Galleries\DTO\StoreGalleryDTO;
use App\Domain\Galleries\Models\Gallery;
use App\Domain\Galleries\Repositories\GalleryRepository;
use App\Domain\Galleries\Requests\StoreGalleryRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class GalleryController extends Controller
{
    /**
     * @var mixed|GalleryRepository
     */
    public mixed $galleries;

    /**
     * @param GalleryRepository $galleryRepository
     */
    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->galleries = $galleryRepository;
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('dashboard.galleries.index', [
            'galleries' => $this->galleries->paginate(9)
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('dashboard.galleries.create');
    }

    public function store(StoreGalleryRequest $request, StoreGalleryAction $action)
    {
        try {
            $request->validated();
        } catch (ValidationException $validationException) {
            return redirect()->back();
        }

        try {
            $dto = StoreGalleryDTO::fromArray($request->validated());
            $action->execute($dto);
            return redirect()->route('galleries.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->img) {
            File::delete('storage/files/galleries/images/' . $gallery->img);
        }
        if ($gallery->video) {
            File::delete('storage/files/galleries/videos/' . $gallery->video);
        }

        $gallery->delete();

        return redirect()->back();
    }

//    API
    public function paginate()
    {
        return response()->json([
            'status' => true,
            'data' => $this->galleries->paginate(9)
        ]);
    }
}
