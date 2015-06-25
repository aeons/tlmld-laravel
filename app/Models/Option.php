<?php

namespace Tlmld\Models;

class Option extends TlmldModel
{

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

}
