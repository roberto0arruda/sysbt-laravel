<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Invoice extends Model
{
    protected $fillable = ['sale_id', 'value', 'date_vnc', 'date_bxa'];

    public function baixar($date)
    {
        return $this->update(['date_bxa' => $date]);
    }
}
