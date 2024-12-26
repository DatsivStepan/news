<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reactions
 *
 * @property $id
 * @property $news_id
 * @property $user
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reactions extends Model
{
    const TYPE_LIKE = 0;
    const TYPE_HEART = 1;
    const TYPE_laughter = 2;
    const TYPE_SADLY = 3;
    const TYPE_MALICE = 4;
    const TYPE_EMBRACE = 5;
    const TYPE_SURPRISE = 6;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['news_id','user', 'type'];
}
