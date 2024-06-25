<?php

namespace App\Domain\News\Actions;

use App\Domain\News\DTO\StoreNewDTO;
use App\Domain\News\DTO\UpdateNewDTO;
use App\Domain\News\Models\Novelty;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpdateNewAction
{
    /**
     * @param UpdateNewDTO $dto
     * @return Novelty
     * @throws Exception
     */
    public function execute(UpdateNewDTO $dto): Novelty
    {
        DB::beginTransaction();
        try {

            $new = $dto->getNovelty();
            $new->title = $dto->getTitle();
            $new->description = $dto->getDescription() ?? $dto->getNovelty()->description;
            if ($dto->getImage() !== null) {
                File::delete('storage/files/news/images/' . $dto->getNovelty()->image);
                $image = $dto->getImage();
                $filename = Str::random(4) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/files/news/images', $filename);
                $new->image = $filename;
                $new->path = url('storage/files/news/images/' . $filename);
            }
            $new->update();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $new;
    }
}
