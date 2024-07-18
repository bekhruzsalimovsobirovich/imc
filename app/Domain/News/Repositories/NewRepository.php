<?php

namespace App\Domain\News\Repositories;

use App\Domain\News\Models\Novelty;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NewRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function getNew(): LengthAwarePaginator
    {
        return Novelty::query()
            ->where('type','=','news')
            ->orderByDesc('id')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getEvent(): LengthAwarePaginator
    {
        return Novelty::query()
            ->where('type','=','events')
            ->orderByDesc('id')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getGraduation(): LengthAwarePaginator
    {
        return Novelty::query()
            ->where('type','=','graduation')
            ->orderByDesc('id')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getExchange(): LengthAwarePaginator
    {
        return Novelty::query()
            ->where('type','=','exchange')
            ->orderByDesc('id')
            ->paginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginate()
    {
        return Novelty::query()
            ->orderByDesc('id')
            ->paginate();
    }


}
