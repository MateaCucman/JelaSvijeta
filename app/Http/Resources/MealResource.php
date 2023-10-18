<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TagCollection;
use App\Http\Resources\IngredientCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;


class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id' => $this->id,
            'title' => $this->translate($request->lang)->title,
            'description' => $this->translate($request->lang)->description,
            'status' => $this->status,
            'category' => new CategoryResource($this->whenLoaded('categories')),
            'tags' => new TagCollection($this->whenLoaded('tags')),
            'ingredients' => new IngredientCollection($this->whenLoaded('ingredients'))
        ];
    }
}
