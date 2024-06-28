<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function purchase(Request $request) {

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        
        DB::beginTransaction();

        try{
            $products = Product::find($productId);

            if(!$products) {
                return response()->json(['message' => '選択された商品が存在しません。'], 404);
            }
            if($products->stock < $quantity) {
                return response()->json(['message' => '選択された商品の在庫が不足しています。'], 400);
            }

            $products->stock -= $quantity;
            $products->save();

            $model = new Sale();
            $sales = $model->purchaseDrink($productId);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return back();
        }
        return response()->json(['message' => '購入に成功しました。']);
    }
}
