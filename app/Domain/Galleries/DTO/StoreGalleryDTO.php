<?php
namespace App\Domain\Galleries\DTO;

use Illuminate\Http\UploadedFile;

class StoreGalleryDTO
{
    /**
     * @var UploadedFile|null
     */
    private ?UploadedFile $img;

    /**
     * @var UploadedFile|null
     */
    private ?UploadedFile $video;

    /**
     * @param array $data
     * @return StoreGalleryDTO
     */
    public static function fromArray(array $data): StoreGalleryDTO
    {
        $dto = new self();
        $dto->setImg($data['img'] ?? null);
        $dto->setVideo($data['video'] ?? null);

        return $dto;
    }

    /**
     * @return UploadedFile|null
     */
    public function getImg(): ?UploadedFile
    {
        return $this->img;
    }

    /**
     * @param UploadedFile|null $img
     */
    public function setImg(?UploadedFile $img): void
    {
        $this->img = $img;
    }

    /**
     * @return UploadedFile|null
     */
    public function getVideo(): ?UploadedFile
    {
        return $this->video;
    }

    /**
     * @param UploadedFile|null $video
     */
    public function setVideo(?UploadedFile $video): void
    {
        $this->video = $video;
    }
}
