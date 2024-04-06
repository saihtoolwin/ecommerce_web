<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model
{
    use HasFactory;
    use InteractsWithMedia;

    protected $appends = ['image'];
    protected $fillable = [
        'name',
        'description',
        'price',
        'qty',
        'discount',
        'category_id',
        // 'rating_id',
        'image',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        // $this->addMediaCollection('image');
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
