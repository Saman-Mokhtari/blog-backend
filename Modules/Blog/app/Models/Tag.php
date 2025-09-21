<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Blog\Database\Factories\TagFactory;


class Tag extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "name"
    ];
    public $timestamps = false;

    protected static function newFactory(): TagFactory
    {
        return TagFactory::new();
    }


    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'blog_tag', 'tag_id', 'blog_id');
    }
}
