<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Masoudi\Laravel\Visitors\Contracts\Visitable;
use Masoudi\Laravel\Visitors\Traits\InteractsWithVisitors;

class Post extends Model implements Visitable
{
    use HasFactory, Sluggable, InteractsWithVisitors;

    protected $fillable = [
        'title',
        'image',
        'body'
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
