<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTranslation extends Model
{
    protected $fillable = [
        'full_name', 'seo_key', 'seo_title', 'seo_description', 'description', 'content'
    ];

    public $timestamps = false;

}
