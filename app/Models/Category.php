<?php

namespace App\Models;

use App\Filters\QueryFilter;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $slug
 * @property $parent_id
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model implements Viewable
{
    use InteractsWithViews;

    static $rules = [
		'name' => 'required',
		'parent_id' => '',
		'description' => 'string',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    public function getName()
    {
        return $this->name;
    }

    public function parent()
    {
        return $this->hasOne(CategoryRelative::class, 'category_id','id');
    }

    public function daughterCategory()
    {
        return $this->hasOne(CategoryRelative::class, 'parent_id','id');
    }
    /**
     * @var string
     */
    public function getUrl(): string
    {
        return route('category.show', $this->slug);
    }
    /**
     * @var string
     */
    public function getAdminUrl(): string
    {
        return route('admin.categories.show', $this->slug);
    }

    /**
     * @var string
     */
    public function getShortDescription():?string
    {
        return $this->description;
    }

    /**
     * @var string
     */
    public function getMetaTitle():?string
    {
        return $this->getName() . " | Інформаційне агентство “Король Данило”";
    }

    /**
     * @var string
     */
    public function getMetaDescription():?string
    {
        return "Читати ⏩ " . $this->getName() . " | Інформаційне агентство “Король Данило” - головні новини України та Світу";
    }

    /**
     * @var string
     */
    public function getDecription():?string
    {
        return $this->description;
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_categories', 'category_id', 'news_id')
            ->withTimestamps();
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
