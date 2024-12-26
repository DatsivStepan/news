<?php

namespace App\Repositories;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Image;

class FileRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return File::class;
    }

    public function uploadAndCreate(UploadedFile $file, $type = 'news', string $name = '')
    {
        $pathMedium = $pathSmall = $path = $file->store('public/image/' . $type);
        $mimeType = $file->getClientMimeType();
        if ((strpos($mimeType, 'image') !== false) && env('MINIMIZE_IMAGE')) {

            $sourcePath = storage_path('app/' . $path);

            $pathMedium =  str_replace($type . "/", $type . "/resize_medium/", $path);
            $mediumOutputPath = storage_path('app/' . $pathMedium);
            Image::load($sourcePath)
                ->width(700)
                ->save($mediumOutputPath);

            $pathSmall =  str_replace($type . "/", $type . "/resize_small/", $path);
            $smallOutputPath = storage_path('app/' . $pathSmall);
            Image::load($sourcePath)
                ->width(700)
                ->save($smallOutputPath);
        }

        return $this->create([
            'name' => $name ?? basename($path),
            'path' => $path,
            'type' => $mimeType,
            'path_medium' => $pathMedium,
            'path_small' => $pathSmall,
        ]);
    }
}
