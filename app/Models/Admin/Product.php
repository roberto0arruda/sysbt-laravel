<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price', 'description', 'stock', 'photo1', 'photo2', 'photo3'];

    public function orders()
    {
        return $this->hasMany(Order::class);
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
