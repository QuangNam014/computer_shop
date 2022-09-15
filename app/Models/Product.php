<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'name',
        'normal_price',
        'promotion_price',
        'feature_image_name',
        'feature_image_path',
        'description',
        'category_id',
        'slug',
        'type_id',
    ];

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'normal_price' => $this->normal_price,
        ];
    }
}
