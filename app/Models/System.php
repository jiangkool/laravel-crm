<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
     protected $fillable = [
        'domain', 'site_title','seo_title', 'site_keywords', 'site_description',
    ];
}
