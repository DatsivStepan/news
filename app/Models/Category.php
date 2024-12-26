<?php

namespace App\Models;

use App\Filters\QueryFilter;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function childrenCategories()
    {
        return $this->belongsToMany(Category::class, 'category_relation', 'parent_id', 'category_id')
            ->withTimestamps();
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
        return $this->getName() . " | НТА - ПРЯМА МОВА ЛЬВОВА”";
    }

    /**
     * @var string
     */
    public function getMetaDescription():?string
    {
        return "Читати ⏩ " . $this->getName() . " | НТА - ПРЯМА МОВА ЛЬВОВА";
    }

    public function children()
    {
        return $this->hasMany(CategoryRelative::class, 'parent_id', 'id');
    }

    public function relation()
    {
        return $this->hasOne(CategoryRelative::class, 'category_id', 'id');
    }

    public function parentRelation()
    {
        return $this->hasOne(CategoryRelative::class, 'category_id', 'id');
    }

    public function getParentsList()
    {
        $parents = [];
        $current = $this;

        while ($current->parentRelation && $current->parentRelation->parent_id) {
            $parent = Category::find($current->parentRelation->parent_id);
            if (!$parent) {
                break;
            }
            $parents[] = [
                'url' => $parent->getUrl(),
                'name' => $parent->getName(),
            ];
            $current = $parent;
        }

        $parents[] = [
            'url' => $this->getUrl(),
            'name' => $this->getName(),
        ];
        return $parents;
    }

    /**
     * @var string
     */
    public function getDecription():?string
    {
        return $this->description;
    }

    public function latestNews()
    {
        return $this->belongsToMany(News::class, 'news_categories', 'category_id', 'news_id')
            ->withTimestamps()
            ->latest('news.date_of_publication');
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

    public static function getCategoryHierarchy()
    {
        $categories = DB::table('categories as c')
            ->select('c.id', 'c.name', 'cr.parent_id')
            ->leftJoin('category_relation as cr', 'c.id', '=', 'cr.category_id')
            ->get()
            ->groupBy('parent_id');

        return self::buildTree($categories);
    }

    private static function buildTree($categories, $parentId = null)
    {
        $tree = [];
        foreach ($categories[$parentId] ?? [] as $category) {
            $tree[] = [
                'id' => $category->id,
                'name' => $category->name,
                'children' => self::buildTree($categories, $category->id),
            ];
        }
        return $tree;
    }
}
