<?php

namespace App\Domain\Vacancies\DTO;

class StoreVacancyDTO
{
    private string $title;
    private ?string $description = null;
    private ?float $salary = null;
    private ?string $type=null;

    public static function fromArray(array $data)
    {
        $dto = new self();
        $dto->setTitle($data['title']);
        $dto->setDescription($data['description'] ?? null);
        $dto->setSalary($data['salary'] ?? null);
        $dto->setType($data['type'] ?? null);
        return $dto;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     * @return float|null
     */
    public function getSalary(): ?float
    {
        return $this->salary;
    }

    /**
     * @param float|null $salary
     */
    public function setSalary(?float $salary): void
    {
        $this->salary = $salary;
    }
}
