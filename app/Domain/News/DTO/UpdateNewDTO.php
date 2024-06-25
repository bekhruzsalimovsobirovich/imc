<?php

namespace App\Domain\News\DTO;

use App\Domain\News\Models\Novelty;
use Illuminate\Http\UploadedFile;

class UpdateNewDTO
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var string|null
     */
    private ?string $description = null;

    /**
     * @var UploadedFile|null
     */
    private ?UploadedFile $image = null;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var Novelty
     */
    private Novelty $novelty;

    /**
     * @param array $data
     * @return UpdateNewDTO
     */
    public static function fromArray(array $data): UpdateNewDTO
    {
        $dto = new self();
        $dto->setTitle($data['title']);
        $dto->setDescription($data['description'] ?? null);
        $dto->setImage($data['image'] ?? null);
        $dto->setType($data['type']);
        $dto->setNovelty($data['novelty']);

        return $dto;
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return Novelty
     */
    public function getNovelty(): Novelty
    {
        return $this->novelty;
    }

    /**
     * @param Novelty $novelty
     */
    public function setNovelty(Novelty $novelty): void
    {
        $this->novelty = $novelty;
    }
}
