<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    const PATH_SMALL = 'small';
    const PATH_MEDIUM = 'medium';

    public static $paths = [
        self::PATH_SMALL,
        self::PATH_MEDIUM,
    ];

    protected $table = 'file';

    protected $fillable = ['name', 'path', 'path_medium', 'path_small', 'type'];

    public function isImage()
    {
        return strpos($this->type, 'image') !== false ? true : false;
    }

    public function getPath($type = '')
    {
        $path = $this->path;
        if ($this->isImage() && in_array($type, self::$paths)) {
            $path = $this->{'path_' . $type};
        }
        return asset(Storage::url($path));
    }
}
