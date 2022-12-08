<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('total_price', 'total_quantity');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->with('properties');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'product_properties');
    }

    public function property_values()
    {
        return $this->belongsToMany(Property_value::class, 'product_property_values');
    }

    // public function price(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => str_replace('.', ',', $value / 100)
    //     );
    // }

    public function getImageUrlAttribute($value)
    {
        return Storage::url($value);
    }
}
