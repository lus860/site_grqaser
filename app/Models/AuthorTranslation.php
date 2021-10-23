<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorTranslation extends Model
{
    protected $fillable = [
        'full_name', 'seo_key', 'seo_title', 'seo_description', 'biography'
    ];

    public $timestamps = false;
}
