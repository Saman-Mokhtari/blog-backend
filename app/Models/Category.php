<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];
    public $timestamps = false;

    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, "blog_category", "category_id", "blog_id");
    }
}
