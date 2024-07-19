<?php

namespace App\Domain\Galleries\Repositories;

use App\Domain\Galleries\Models\Gallery;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GalleryRepository
{
    /**
     * @param $paginate
     * @return LengthAwarePaginator
     */
    public function paginate($paginate): LengthAwarePaginator
    {
        return Gallery::query()
            ->orderByDesc('id')
            ->paginate($paginate);
    }
}
