<?php

namespace App\Domain\Vacancies\Actions;

use App\Domain\Vacancies\DTO\StoreVacancyDTO;
use App\Domain\Vacancies\Models\Vacancy;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreVacancyAction
{
    public function execute(StoreVacancyDTO $dto)
    {
        DB::beginTransaction();
        try {
            $vacancy = new Vacancy();
            $vacancy->title = $dto->getTitle();
            $vacancy->description = $dto->getDescription();
            $vacancy->salary = $dto->getSalary();
            $vacancy->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $vacancy;
    }
}
