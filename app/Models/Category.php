<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['category', 'slug', 'status'];
    use HasFactory;
    protected static function boot()
    {
        parent::boot();
        static::created(function ($category) {
            $category->slug = $category->generateSlug($category->category);
            $category->save();
        });
    }
    private function generateSlug($name)
    {
        //myfunction for slug
        if (static::whereSlug($slug = Str::slug($name))->exists()) {

            $max = static::whereCategory($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
                return "{$slug}";
            } else {

                return "{$slug}-2";
            }
        }
        return $slug;
    }
}
