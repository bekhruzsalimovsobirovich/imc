<?php

namespace App\Domain\Faculties\Actions;

use App\Domain\Faculties\DTO\StoreFacultyDTO;
use App\Domain\Faculties\DTO\UpdateFacultyDTO;
use App\Domain\Faculties\Models\Faculty;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpdateFacultyAction
{
    /**
     * @param UpdateFacultyDTO $dto
     * @return Faculty
     * @throws Exception
     */
    public function execute(UpdateFacultyDTO $dto): Faculty
    {
        DB::beginTransaction();
        try {
            $faculty = $dto->getFaculty();
            $faculty->fullname = $dto->getFullname();
            $faculty->phone = $dto->getPhone();
            $faculty->job_position = $dto->getJobPosition();
            $faculty->job_time = $dto->getJobTime();
            $faculty->description = $dto->getDescription();
            if ($dto->getImage() !== null) {
                File::delete('storage/files/faculties/images/' . $dto->getFaculty()->image);
                $image = $dto->getImage();
                $filename = Str::random(4) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/files/faculties/images', $filename);
                $faculty->image = $filename;
                $faculty->path = url('storage/files/faculties/images/' . $filename);
            }
            $faculty->update();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();

        return $faculty;
    }
}
