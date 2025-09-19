<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    protected $casts = [
        'meta_data' => 'json',   // یا 'json' — فرقی نمی‌کنه
        'likes'     => 'integer',
        'views'     => 'integer',
    ];
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
}
