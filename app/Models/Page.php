<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title_key', 'description_key', 'content_key', 'show_image', 'image', 'show_in_header', 'show_in_footer', 'active', 'sort', 'seo_title', 'seo_keywords', 'seo_description'
    ];
}
