<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;
use App\Models\Sale;
use App\Http\Requests\DrinkRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //一覧表示
    public function showIndex(Request $request) {
        //インスタンス生成
        $model = new Product();
        $products = $model->getIndex();
        $companies = Company::all();

        $keyword = $request->input('keyword');
        $manufacturer = $request->input('manufacturer');

        $query = Product::query();
        
        if(!empty($keyword)) {
            $query->where('product_name', 'like', '%' . $keyword . '%');
        }

        if(!empty($manufacturer)) {
            $query->where('company_id', 'like', $manufacturer)->get();
        }
        $products = $query->paginate(8);
        
        return view('index', ['products' => $products, 'companies' => $companies, 'keyword' => $keyword, 'manufacturer' => $manufacturer]);
    }

    //削除処理
    public function destroy($id) {
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('drink.index');
    }

    //新規登録画面表示
    public function create() {
        $products = Company::all();
        return view('create', ['products' => $products]);
    }

    //新規登録
    public function store(DrinkRequest $request) {
       
        $image = $request->file('img_path');
        if($image) {
            $file_name = $image->getClientOriginalName();
            $image->storeAs('public/image', $file_name);
            $img_path = 'storage/image/' . $file_name;
        } else {
            $img_path = null;
        }

        DB::beginTransaction();
        
        try{
            $model = new Product();
            $model->registDrink($request, $img_path);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return back();
        }

        return redirect(route('drink.create'));
    }
    
    //詳細画面表示
    public function show($id) {
        $products = Product::find($id);
        return view('show', ['products' => $products]);
    }

    //編集画面表示
    public function edit($id) {
        $products = Product::find($id);
        $companies = Company::all();
        return view('edit', ['products' => $products, 'companies' => $companies]);
    }

    //更新
    public function update(DrinkRequest $request, $id) {

        $image = $request->file('img_path');
        if($image) {
            $file_name = $image->getClientOriginalName();
            $image->storeAs('public/image', $file_name);
            $img_path = 'storage/image/' . $file_name;
        } else {
            $img_path = null;
        }

        DB::beginTransaction();
        
        try{
            $products = Product::find($id);
            $products->editDrink($request, $img_path);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return back();
        }
            return redirect()->route('drink.edit', ['id' => $id]);
    }
}
