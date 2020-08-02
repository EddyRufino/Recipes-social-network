<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
	protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    // public function setTitleAttribute($title)
    // {
    //     $this->attributes['title'] = $title;
    //     $this->attributes['slug'] = Str::slug($title);
    // }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public static function create(array $attributes = []) {

      $attributes['user_id'] = auth()->id();

      $recipe = static::query()->create($attributes);

      $slug = Str::slug($attributes['title']);

      if (static::whereSlug($slug)->exists()) {

        $recipe->slug = Str::slug($attributes['title']) . "-{$recipe->id}";
      } else {

        $recipe->slug = Str::slug($attributes['title']);
      }

      $recipe->save();

      //$recipe->generateslug();

      return $recipe;

    }
}
