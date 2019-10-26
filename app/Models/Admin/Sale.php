<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Sale extends Model
{
    protected $fillable = ['buy_id', 'customer_id', 'value', 'date'];

    public function getValueAttribute($value)
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public function newInvoices($data)
    {
        if (isset($data['e'])) {
            $valorParc = ($data['value'] - $data['e']) / $data['x'];
        } else {
            $data['x'] = '1';
        }

        $i = 0;
        $days = 30;
        while ($i <= (int) $data['x']) {
            if ($i == 0) {
                $entrada = $this->invoices()->create([
                    'sale_id' => $this->id,
                    'value'      => isset($data['e']) ? $data['e'] : $data['value'],
                    'date_vnc'  => $data['date']
                ]);
                $entrada->baixar($data['date']);
            } else {
                $this->invoices()->create([
                    'sale_id' => $this->id,
                    'value'      => $valorParc,
                    'date_vnc'  => date('Y-m-d', strtotime('+'.$days.' days', strtotime($data['date']))),
                ]);
                $days += 30;
            }
            $i++;
        }

        return [
            'success' => true,
            'message' => 'sucesso na venda'
        ];
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function buy()
    {
        return $this->belongsTo(Buy::class);
    }
}
