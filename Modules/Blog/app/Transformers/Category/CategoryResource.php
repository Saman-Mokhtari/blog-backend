<?php

namespace Modules\Blog\Transformers\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Blog\Transformers\Blog\BlogCollection;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'blogs' => $this->whenLoaded('blogs', fn() => $this->blogs->isNotEmpty() ? new BlogCollection($this->blogs) : null),
        ];
    }
}
