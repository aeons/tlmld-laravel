<?php

namespace Tlmld\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends TlmldModel implements SluggableInterface
{
    use SoftDeletes, SluggableTrait;

    protected $fillable = [
        'title',
        'description',
        'starts_at',
        'ends_at',
        'active_on',
        'inactive_on',
        'payment_needed',
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'on_update'  => true,
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
        'active_on',
        'inactive_on',
        'deleted_at',
    ];

    public function registrations() {
        return $this->hasMany(Registration::class);
    }

    public function options() {
        return $this->hasMany(Option::class);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeCurrent($query)
    {
        return $query->where('starts_at', '>', Carbon::now());
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive($query)
    {
        $now = Carbon::now();
        return $query
            ->where('active_on', '<', $now)
            ->whereRaw('ifnull(`inactive_on`, `starts_at`) > ?', [$now]);
    }
}
