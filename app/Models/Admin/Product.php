<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Payment;
use DB;

class Product extends Model
{
    protected $fillable = ['title', 'price'];

    public function sale($data)
    {
        DB::BeginTransaction();
        
        $this->client = $data['client'];
        $this->sold = 1;
        $venda = $this->save();

        $valorEnt = number_format($data['value'], 2, '.', '');
        $venciment = date('Ymd');
        $valorParc = (number_format($this->price_sale, 2, '.', '') - $valorEnt) / $data['x'];
        $i = 0;
        $d = '30';
        while ($i <= (int)$data['x']) {
            if($i == 0) {
                $entrada = $this->payments()->create([
                    'product_id' => $this->id,
                    'parc'       => 'E',
                    'value'      => $valorEnt,
                    'venciment'  => $venciment,
                    'paid'       => 1
                ]);
            } else {
                $parcela = $this->payments()->create([
                    'product_id' => $this->id,
                    'parc'       => $i,
                    'value'      => $valorParc,
                    'venciment'  => date('Ymd', strtotime("+".$d." days")),
                    'paid'       => 0
                ]);
                $d += '30';
            }
            $i++;
        }

        if ($venda && $entrada && $parcela) {
            
            DB::commit();

            return [
                'success' => true,
                'message' => 'sucesso na venda'
            ];
        } else {

            DB::rollback();
            
            return [
                'success' => false,
                'message' => 'erro ao vender'
            ];
        }
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getInfo()
    {
        $products = $this->with('payments')->get();
        
        $gasto = 0;
        $disponivel = 0;
        $aReceber = 0;
        $nParcel = 0;
        $faturamento = 0;
        foreach ($products as $product) {
            $gasto += $product->price_buy;
            $disponivel += $product->sold == '0' ? 1 : 0;
            foreach ($product->payments as $payment) {
                if ($payment->paid == '0') {
                    $aReceber += $payment->value;
                    $nParcel += 1;
                } else {
                    $faturamento += $payment->value;
                }
            }
        }
        return [
            'gasto'         => $gasto,
            'disponivel'    => $disponivel,
            'aReceber'      => $aReceber,
            'nParcel'       => $nParcel,
            'faturamento'   => $faturamento
        ];
    }
}