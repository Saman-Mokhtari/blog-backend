<?php

namespace Modules\Taxonomy\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Taxonomy\Database\Factories\TermFactory;

// use Modules\Taxonomy\Database\Factories\TermFactory;

class Term extends Model
{
    use HasFactory, HasUuids, Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['term', 'slug', 'taxonomy_id', 'parent_id', 'description'];

    public function Sluggable(): array
    {
        return [
          'slug' => [
              'source' => 'term',
          ]
        ];
    }

     protected static function newFactory(): TermFactory
     {
          return TermFactory::new();
     }

    public function taxonomy(): BelongsTo
    {
        return $this->belongsTo(Taxonomy::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Term::class, 'parent_id');
    }
}
