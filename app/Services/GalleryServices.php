<?php

namespace App\Services;

use App\Models\Gallery;
use App\Models\Image;

use App\Repositories\FileRepository;
use App\Repositories\GalleryFilesRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Support\Arr;


/**
 * Class FlightServices
 */
class GalleryServices
{

    private $repository;
    private $fileRepository;
    private $galleryFilesRepository;

    public function __construct(
        GalleryRepository $galleryRepository,
        FileRepository $fileRepository,
        GalleryFilesRepository $galleryFilesRepository
    )
    {
        $this->repository = $galleryRepository;
        $this->fileRepository = $fileRepository;
        $this->galleryFilesRepository = $galleryFilesRepository;
    }

    /**
     * @param array $data
     * @param int $userId
     * @param bool $publish
     *
     * @return Model
     * @throws \Exception
     */
    public function create(array $data): Gallery
    {
        $gallery = $this->repository->create([
            'name' => $data['name']
        ]);

        $galleryId = $gallery->id;

        $files = !empty($data['files']) ? json_decode($data['files']) : null;
        if ($files = $this->fileRepository->getByConditions(['name' => $files])) {
            $fGallery = Arr::map($files->toArray(), function ($value, $key) use($galleryId) {
                return [
                    'gallery_id' => $galleryId,
                    'file_id' => $value['id']
                ];
            });

            $this->galleryFilesRepository->insertBatch($fGallery);
        }

        return $gallery;
    }

    /**
     * @param array $data
     * @param int $gallery
     *
     * @return Model
     * @throws \Exception
     */
    public function update(Gallery $gallery, array $data): Gallery
    {
        $gallery = $this->repository->update($gallery, [
            'name' => $data['name']
        ]);

        $galleryId = $gallery->id;

        $files = !empty($data['files']) ? json_decode($data['files']) : null;
        $this->galleryFilesRepository->massDeleteByConditions([
            'gallery_id' => $galleryId
        ]);

        if ($files = $this->fileRepository->getByConditions(['name' => $files])) {
            $fGallery = Arr::map($files->toArray(), function ($value, $key) use($galleryId) {
                return [
                    'gallery_id' => $galleryId,
                    'file_id' => $value['id']
                ];
            });

            $this->galleryFilesRepository->insertBatch($fGallery);
        }

        return $gallery;
    }

    public function prepareToUpdate(&$gallery)
    {
        $gallery->files_array = null;
        if ($files = $gallery->files->toArray()) {
            $gallery->files_array = json_encode(Arr::map($files, function ($value, $key) {
                return $value['name'];
            }));
        }
    }
}
?>
