<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon'
    ];

    /* Relacion uno a muchos */
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    /* Relacion muchos a muchos */
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    /* Relacion uno a muchos a traves de subcategorias*/
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    // url amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
