<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    //登録・更新可能なカラム
    protected $fillable = [
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'img_path',
    ];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function sales() {
        return $this->hasMany(Sale::class, 'product_id', 'id');
    }

    //情報取得用変数
    public function getIndex() {
        //productsテーブルからデータを取得
        $products = Product::all();
        return $products;
    }

    //登録処理
    public function registDrink($data, $img_path) {

        DB::table('products')->insert([
            'product_name' => $data->product_name,
            'company_id' => $data->company_name,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $img_path,
        ]);
        
    }

    //更新処理
    public function editDrink($data, $img_path) {
        
        DB::table('products')->where('id', $data->id)->update([
            'product_name' => $data->product_name,
            'company_id' => $data->company_name,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $img_path,
        ]);
    }
}
