<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BlogCategory;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'user' => join(" ", array($this->user->first_name,$this->user->last_name)),
            'body' => $this->description,
            'featured_image' => get_uploaded_image_url($this->thumbnail_img),
            'post_categories' => $this->categories_name($this->category_ids),
            'published_date' => date('M d, Y', strtotime($this->created_at)),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }

    public function categories_name($request) {
        $categories = array();
        if($request) {
            $request = json_decode($request);
            foreach($request as $id) {
                $categories[] = BlogCategory::where('id','=', $id)->get();
            }
        }
        return response()->json($categories); 
    }
}