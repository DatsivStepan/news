<?php

namespace App\Models;

use App\Classes\Enum\NewsPublicationType;
use App\Classes\Enum\NewsStatus;
use App\Classes\Enum\NewsType;
use App\Filters\QueryFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

/**
 * Class News
 *
 * @property $id
 * @property $title
 * @property $slug
 * @property $subtitle
 * @property $mini_description
 * @property $description
 * @property $type_publication
 * @property $type
 * @property $author_id
 * @property $date_of_publication
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class News extends Model implements Viewable
{
    use SoftDeletes, InteractsWithViews;

    static $rules = [
        'tags' => 'required',
        'title' => 'required',
		'slug' => '',
		'image' => '',
		'author_id' => '',
		'show_author' => '',
		'subtitle' => 'required',
		'mini_description' => 'required',
		'description' => 'required',
		'category_id' => 'required',
		'type_publication' => 'required',
		'type' => 'required',
		'date_of_publication' => 'required',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'subtitle', 'mini_description', 'description', 'type_publication',
        'type', 'date_of_publication', 'show_author'
    ];

    protected $perPage = 20;

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('subtitle', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%')
            ->orWhere('mini_description', 'LIKE', '%'.$search.'%')
            ->orWhereHas('tags', function ($q) use($search){
                $q->where('name', 'LIKE', '%'.$search.'%');
            });
    }

    public function scopeTagSearch($query, $search)
    {
        return $query
            ->orWhereHas('tags', function ($q) use($search){
                $q->where('name', 'LIKE', '%'.$search.'%');
            });
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isShowAuthor()
    {
        return $this->show_author;
    }

    public function getMetaTitle()
    {
        return $this->getTitle() . " | Новини НТА ";
    }

    public function getMetaDescription()
    {
        $description = strip_tags($this->description);

        return "Інформаційне агентство “Новини НТА ” ⏩ " . mb_substr($description, 0, 150) . '...';
    }

    public function isImportment()
    {
        return $this->type == NewsPublicationType::IMPORTANT ? true : false;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getShortDescription($substr = null)
    {
        if ($substr) {
            return mb_substr($this->mini_description, 0, $substr) . '...';
        }
        return $this->mini_description;
    }

    public function getPublicationDate($time = true, $format = 'd.m.Y')
    {
        return Carbon::parse($this->date_of_publication)->format($format . ($time ? ' H:i' : ''));
    }

    public function getModifiedDate($time = true)
    {
        return Carbon::parse($this->updated_at)->format('d.m.Y ' . ($time ? 'H:i' : ''));
    }

    public function getUrl()
    {
        return route('news.show', ['slug' => $this->slug]);
    }

    public function getAuthor()
    {
        return $this->author ? $this->author->first() : '';
    }

    public function getAuthorFullName()
    {
        $author = $this->author->first();
        return $author ? $author->getFullName() : '';
    }

    public function getaDate()
    {

//        return Date::parse($this->date_of_publication)->format('Y-M-D');
//        return date('D d M Y, h:m', strtotime($this->date_of_publication)); ;
    }

    public function getImageUrl()
    {
        $image = $this->image->first();
        return $image ? $image->getPath() : '/public/default.png';
    }

    public function tag()
    {
        return $this->hasOne(Tag::class, 'id','news_id');
    }
    public function news_category()
    {
        return $this->hasOne(NewsCategory::class, 'news_id','id');
    }

    public function getCategoryName()
    {
        $category = $this->category()->first();
        return $category ? $category->name : '';
    }

    public function getCategory()
    {
       return $this->category()->first();
    }


    public function home_slider()
    {
        return $this->hasOne(HomeSlider::class, 'news_id','id');
    }

    public function paidNews()
    {
        return $this->hasOne(PaidNews::class, 'news_id','id');
    }

    public function getTypePublication()
    {
        $statuses = self::typePublicationList();

        return array_key_exists($this->type_publication, $statuses) ?  $statuses[$this->type_publication] : "";
    }

    public function getType()
    {
        $statuses = self::typeList();

        return array_key_exists($this->type, $statuses) ?  $statuses[$this->type] : "";
    }

    public function typeList()
    {
        return [
            NewsPublicationType::SIMPLE => 'Проста',
            NewsPublicationType::IMPORTANT => 'Важлива',
        ];
    }

    public function typePublicationList()
    {
        return [
            NewsType::PUBLISH => 'Опублікована',
            NewsType::DRAFT => ' В чернетках',
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tags', 'news_id', 'tags_id')
            ->withTimestamps();
    }

    public function image()
    {
        return $this->belongsToMany(File::class, 'news_images', 'news_id', 'image_id')
            ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'news_categories', 'news_id', 'category_id')
            ->withTimestamps();
    }

    public function author()
    {
        return $this->belongsToMany(Author::class, 'news_authors', 'news_id', 'author_id')
            ->withTimestamps();
    }
}
