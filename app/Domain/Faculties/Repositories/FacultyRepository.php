<?php
namespace App\Domain\Faculties\Repositories;
use App\Domain\Faculties\Models\Faculty;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FacultyRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return Faculty::query()
            ->orderByDesc('id')
            ->paginate();
    }
}
