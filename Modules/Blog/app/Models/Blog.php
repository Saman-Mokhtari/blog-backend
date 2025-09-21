<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use Modules\Blog\Database\Factories\BlogFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerp',
        'content',
        'likes',
        'status',
        'cover',
        'views',
        'meta_data',
    ];

    protected static function newFactory(): BlogFactory
    {
        return BlogFactory::new();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "blog_category", "blog_id", "category_id");
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, "blog_tag", "blog_id", "tag_id");
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "blog_user", "blog_id", "author_id");
    }

    // ===== Convert array to json while creating the record =====
    public function setMetaDataAttribute($value)
    {
        $this->attributes['meta_data'] = is_array($value)
            ? json_encode($value)
            : $value;
    }
}
