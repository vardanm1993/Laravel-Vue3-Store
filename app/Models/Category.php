<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 */
class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
