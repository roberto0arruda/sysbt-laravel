<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = ['product_id', 'value', 'date', 'info'];

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }

    public function getValueAttribute($value)
    {
        return 'R$ '.number_format($value, 2, ',', '.');
    }

    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}
