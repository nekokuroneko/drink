<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'product_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    //購入処理
    public function purchaseDrink($data) {
        
        Sale::create([
            'product_id' => $data,
        ]);
    }
}
