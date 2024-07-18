<?php

namespace App\Domain\Faculties\DTO;

use App\Domain\Faculties\Models\Faculty;
use Illuminate\Http\UploadedFile;

class UpdateFacultyDTO
{
    private string $fullname;
    private string $phone;
    private string $job_position;
    private string $job_time;
    private ?string $description = null;
    private ?UploadedFile $image = null;
    private Faculty $faculty;

    /**
     * @param array $data
     * @return UpdateFacultyDTO
     */
    public static function fromArray(array $data): UpdateFacultyDTO
    {
        $dto = new self();
        $dto->setFullname($data['fullname']);
        $dto->setPhone($data['phone']);
        $dto->setJobPosition($data['job_position']);
        $dto->setJobTime($data['job_time']);
        $dto->setDescription($data['description'] ?? null);
        $dto->setImage($data['image'] ?? null);
        $dto->setFaculty($data['faculty']);

        return $dto;
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getJobPosition(): string
    {
        return $this->job_position;
    }

    /**
     * @param string $job_position
     */
    public function setJobPosition(string $job_position): void
    {
        $this->job_position = $job_position;
    }

    /**
     * @return string
     */
    public function getJobTime(): string
    {
        return $this->job_time;
    }

    /**
     * @param string $job_time
     */
    public function setJobTime(string $job_time): void
    {
        $this->job_time = $job_time;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return UploadedFile|null
     */
    public function getImage(): ?UploadedFile
    {
        return $this->image;
    }

    /**
     * @param UploadedFile|null $image
     */
    public function setImage(?UploadedFile $image): void
    {
        $this->image = $image;
    }

    /**
     * @return Faculty
     */
    public function getFaculty(): Faculty
    {
        return $this->faculty;
    }

    /**
     * @param Faculty $faculty
     */
    public function setFaculty(Faculty $faculty): void
    {
        $this->faculty = $faculty;
    }
}
