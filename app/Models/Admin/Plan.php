<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    protected static function booted()
    {
        static::creating(function ($plan) {
            $plan->url = Str::kebab($plan->name);
        });

        static::updating(function ($plan) {
            $plan->url = Str::kebab($plan->name);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function search($filter = null)
    {
        return $this->where('name', 'LIKE', "%{$filter}%")->orWhere('description', 'LIKE', "%{$filter}%")->paginate();
    }
}
