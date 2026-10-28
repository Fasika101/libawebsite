<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'cover_image',
        'status',
        'channel',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function publicPath(): string
    {
        $page = $this->channel === 'travel' ? '/travel/blog-post.php' : '/blog-post.php';

        return $page.'?slug='.$this->slug;
    }
}
