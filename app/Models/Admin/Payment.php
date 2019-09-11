<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Payment extends Model
{
    protected $fillable = ['product_id', 'order_id', 'value', 'dt', 'paid'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
