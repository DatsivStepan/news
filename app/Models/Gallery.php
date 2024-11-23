<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'name'
    ];

    public function files()
    {
        return $this->belongsToMany(File::class, 'gallery_files', 'gallery_id', 'file_id');
    }
}
