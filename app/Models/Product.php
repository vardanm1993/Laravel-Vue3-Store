<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property Color $colors
 * @property Tag $tags
 * @property Category $category
 * @property Product $preview_image
 * @property int $is_published
 * @method  static firstOrCreate(array $array, mixed $data)
 */
class Product extends Model
{
    const IS_PUBLISHED_TRUE = 1;
    const IS_PUBLISHED_FALSE = 0;

    protected $table = 'products';
    protected $guarded = false;

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class,'product_color','product_id','color_id');
    }

    public  function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public  function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public static function getStatus (): array
    {
        return [
            self::IS_PUBLISHED_TRUE => 'published',
            self::IS_PUBLISHED_FALSE => 'unpublished',

        ];
    }

    public function getStatusAttribute(): string
    {
        return self::getStatus()[$this->is_published];
    }

    public function getImageUrlAttribute(): string|UrlGenerator|Application
    {
        return url('storage/' . $this->preview_image);
    }
}
