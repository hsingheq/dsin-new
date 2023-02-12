<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brands extends Model
{
    protected $fillable= ['brand','slug','brandimage'];
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->slug = $post->generateSlug($post->brand);
            $post->save();
        });
    }
    private function generateSlug($name)
    {
        //myfunction for slug
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereBrand($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }  
}
