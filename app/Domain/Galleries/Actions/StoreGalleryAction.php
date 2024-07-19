<?php

namespace App\Domain\Galleries\Actions;

use App\Domain\Galleries\DTO\StoreGalleryDTO;
use App\Domain\Galleries\Models\Gallery;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreGalleryAction
{
    /**
     * @param StoreGalleryDTO $dto
     * @return Gallery
     * @throws Exception
     */
    public function execute(StoreGalleryDTO $dto): Gallery
    {
        DB::beginTransaction();
        try {
            $gallery = new Gallery();
            if ($dto->getImg() !== null) {
                $img = $dto->getImg();
                $filename_img = Str::random(4) . '_' . time() . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/files/galleries/images', $filename_img);
                $gallery->img = $filename_img;
                $gallery->img_path = url('storage/files/galleries/images/' . $filename_img);
            }
            if ($dto->getVideo() !== null) {
                $video = $dto->getVideo();
                $filename_video = Str::random(4) . '_' . time() . '.' . $video->getClientOriginalExtension();
                $video->storeAs('public/files/galleries/videos', $filename_video);
                $gallery->video = $filename_video;
                $gallery->video_path = url('storage/files/galleries/videos/' . $filename_video);
            }
            $gallery->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();

        return $gallery;
    }
}
