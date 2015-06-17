<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableTrait;

class Event extends \Eloquent
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
}
