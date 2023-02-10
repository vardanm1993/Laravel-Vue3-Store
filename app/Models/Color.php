<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    protected $table = 'colors';
    protected $guarded = false;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_color','color_id','product_id');
    }
}
