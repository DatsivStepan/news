<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;

class GalleryRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Gallery::class;
    }
}
