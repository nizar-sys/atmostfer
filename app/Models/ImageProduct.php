<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','filename'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
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
