<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'type', 'value', 'dt', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
