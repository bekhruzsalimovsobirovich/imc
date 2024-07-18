<?php

namespace App\Domain\Faculties\DTO;

use Illuminate\Http\UploadedFile;

class StoreFacultyDTO
{
    private string $fullname;
    private string $phone;
    private string $job_position;
    private string $job_time;
    private ?string $description = null;
    private ?UploadedFile $image = null;

    /**
     * @param array $data
     * @return StoreFacultyDTO
     */
    public static function fromArray(array $data): StoreFacultyDTO
    {
        $dto = new self();
        $dto->setFullname($data['fullname']);
        $dto->setPhone($data['phone']);
        $dto->setJobPosition($data['job_position']);
        $dto->setJobTime($data['job_time']);
        $dto->setDescription($data['description'] ?? null);
        $dto->setImage($data['image'] ?? null);

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
}
