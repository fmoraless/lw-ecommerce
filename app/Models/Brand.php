<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;

    /* uno  a muchos */
    public function products(){
        return $this->hasMany(Product::class);
    }

    /* muchos a muchos */
    public function categories(){
        return $this->BelongsToMany(Category::class);
    }
}
