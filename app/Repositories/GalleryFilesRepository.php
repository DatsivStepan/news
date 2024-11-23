<?php

namespace App\Repositories;

use App\Models\GalleryFiles;

class GalleryFilesRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return GalleryFiles::class;
    }
}
