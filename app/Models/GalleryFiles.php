<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryFiles extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'gallery_files';

    protected $fillable = [
        'gallery_id',
        'file_id',
    ];

//    public function user()
//    {
//        return $this->hasOne(User::class, 'id', 'user_id');
//    }
}
