<?php

namespace Modules\Blog\Transformers\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Blog\Transformers\Category\CategoryCollection;
use Modules\Blog\Transformers\Category\CategoryResource;
use Modules\Blog\Transformers\Tag\TagCollection;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'excerp' => $this->excerp,
            'content' => $this->content,
            'likes' => $this->likes,
            'status' => $this->status,
            'cover' => $this->cover,
            'views' => $this->views,
            'updated_at' => optional($this->updated_at)->format('Y-m-d'),
            'meta_data' => json_decode($this->meta_data),
            'categories' => $this->whenLoaded(
                'categories',
                fn() => $this->categories->isNotEmpty()
                    ? CategoryResource::collection($this->categories)
                    : null,
            ),
            'tags' => $this->whenLoaded(
                'tags',
                fn() => $this->tags->isNotEmpty()
                    ? new TagCollection($this->tags)
                    : null,
            ),
        ];
    }
}
