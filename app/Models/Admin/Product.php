<?php

namespace App\Models\Admin;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Uuid;

    public $incrementing = false;

    protected $fillable = ['title', 'price', 'description', 'stock', 'photo1', 'photo2', 'photo3'];

    protected $dates = ['deleted_at'];

    protected $keyType = 'string';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function buys()
    {
        return $this->hasMany(Buy::class);
    }

    public function sales()
    {
        return $this->hasManyThrough(Sale::class, Buy::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function stockUp()
    {
        return $this->update(['stock' => $this->stock + 1]);
    }

    public function stockDown()
    {
        return $this->update(['stock' => $this->stock - 1]);
    }
}
