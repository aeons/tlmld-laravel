<?php

namespace Tlmld\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends TlmldModel
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function choices()
    {
        return $this->belongsToMany(Choice::class);
    }
}
