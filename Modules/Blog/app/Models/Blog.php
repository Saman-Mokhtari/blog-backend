<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Blog\Database\Factories\BlogFactory;
use Modules\Taxonomy\Models\Term;

class Blog extends Model
{
    use HasFactory, HasUuids, Sluggable;

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

    public function categories(): MorphToMany
    {
        return $this->morphToMany(
            Term::class,
            "termable",
            "term_relationships",
            "termable_id",
            "term_id"
        )->whereHas('taxonomy', function ($q) {
            $q->where('name', 'Category');
        });
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(
            Term::class,
            "termable",
            "term_relationships",
            "termable_id",
            "term_id"
        )->whereHas('taxonomy', function ($q) {
            $q->where('name', 'Tag');
        });
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "blog_user", "blog_id", "author_id");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // ===== Convert array to json while creating the record =====
    public function setMetaDataAttribute($value)
    {
        $this->attributes['meta_data'] = is_array($value)
            ? json_encode($value)
            : $value;
    }
}
