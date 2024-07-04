<?php
namespace App\Domain\Vacancies\Repositories;

use App\Domain\Vacancies\Models\Vacancy;

class VacancyRepository
{
    public function paginate()
    {
        return Vacancy::query()
            ->orderByDesc('id')
            ->paginate();
    }

    public function getAll()
    {
        return Vacancy::query()
            ->orderByDesc('id')
            ->get();
    }

//    API
    public function getPaginate()
    {
        return Vacancy::query()
            ->orderByDesc('id')
            ->paginate(10);
    }
}
