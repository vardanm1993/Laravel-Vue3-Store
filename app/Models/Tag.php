<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static firstOrCreate(mixed $data)
 */
class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = false;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_tag','tag_id','product_id');
    }

}
