<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $file_path
 */
class Image extends Model
{
    protected $table = 'images';
    protected $guarded = false;

    public function getImageUrlAttribute(): string|UrlGenerator|Application
    {
        return url('storage/' . $this->file_path);
    }
}
