<?php

namespace App\Domain\Faculties\Actions;

use App\Domain\Faculties\DTO\StoreFacultyDTO;
use App\Domain\Faculties\Models\Faculty;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreFacultyAction
{
    /**
     * @param StoreFacultyDTO $dto
     * @return Faculty
     * @throws Exception
     */
    public function execute(StoreFacultyDTO $dto): Faculty
    {
        DB::beginTransaction();
        try {
            $faculty = new Faculty();
            $faculty->fullname = $dto->getFullname();
            $faculty->phone = $dto->getPhone();
            $faculty->job_position = $dto->getJobPosition();
            $faculty->job_time = $dto->getJobTime();
            $faculty->description = $dto->getDescription();
            if ($dto->getImage() !== null) {
                $image = $dto->getImage();
                $filename = Str::random(4) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/files/faculties/images', $filename);
                $faculty->image = $filename;
                $faculty->path = url('storage/files/faculties/images/' . $filename);
            }
            $faculty->save();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();

        return $faculty;
    }
}
