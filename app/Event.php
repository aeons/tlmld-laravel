<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Eloquent implements SluggableInterface
{
    use SoftDeletes, SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $dates = ['deleted_at'];
}
