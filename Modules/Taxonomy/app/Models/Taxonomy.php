<?php

namespace Modules\Taxonomy\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Taxonomy\Database\Factories\TaxonomyFactory;


class Taxonomy extends Model
{
    use HasFactory, HasUuids, Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'slug', 'description', 'hierarchical'];

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

     protected static function newFactory(): TaxonomyFactory
     {
          return TaxonomyFactory::new();
     }

    public function terms(): HasMany
    {
        return $this->hasMany(Term::class);
    }
}
