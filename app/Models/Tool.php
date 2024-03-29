<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $table = "tools";

    protected $fillable = [
        'title',
        'link',
        'description',
        'tags'
    ];
}
