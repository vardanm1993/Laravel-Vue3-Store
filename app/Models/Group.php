<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $table = 'groups';
    protected $guarded = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'group_id','id');
    }
}
