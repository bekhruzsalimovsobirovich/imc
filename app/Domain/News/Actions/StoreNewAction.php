<?php

namespace App\Domain\News\Actions;

use App\Domain\News\DTO\StoreNewDTO;
use App\Domain\News\Models\Novelty;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreNewAction
{
    /**
     * @param StoreNewDTO $dto
     * @return Novelty
     * @throws Exception
     */
    public function execute(StoreNewDTO $dto): Novelty
    {
        DB::beginTransaction();
        try {
            $new = new Novelty();
            $new->title = $dto->getTitle();
            $new->description = $dto->getDescription();
            $new->type = $dto->getType();
            if ($dto->getImage() !== null) {
                $image = $dto->getImage();
                $filename = Str::random(4) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/files/news/images', $filename);
                $new->image = $filename;
                $new->path = url('storage/files/news/images/' . $filename);
            }
            $new->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $new;
    }
}
