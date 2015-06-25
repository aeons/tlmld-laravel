<?php

namespace Tlmld\Models;

class Choice extends TlmldModel
{
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function choosers()
    {
        return $this->belongsToMany(Registration::class);
    }
}
