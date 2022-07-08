<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'merk_id'];

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function imageProducts()
    {
        return $this->hasMany(ImageProduct::class, 'product_id', 'id');
    }

    // first image of product
    public function image()
    {
        return $this->hasOne(ImageProduct::class, 'product_id', 'id')->orderBy('id', 'asc');
    }

    // boot function
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_at = now();
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }
}
