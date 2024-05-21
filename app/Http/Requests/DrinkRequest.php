<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){

            return [
            'product_name' => 'required | max:50',
            'company_name' => 'required',
            'price' => 'required | integer',
            'stock' => 'required | integer',
            'comment' => 'max:100',
            'img_path' => 'image',
        ];
    }

    //項目名
    public function attributes(){

        return [
            'product_name' => '商品名',
            'company_name' => 'メーカー名',
            'price' => '価格',
            'stock' => '在庫数',
            'comment' => 'コメント',
            'img_path' => '画像'
        ];
    }

    //エラーメッセージ
    public function messages(){

        return [
            'product_name.required' => ':attributeは必須項目です。',
            'product_name.max' => ':attributeは:max字以内で入力してください。',
            'company_name.required' => ':attributeは必須項目です。',
            'price.required' => ':attributeは必須項目です。',
            'price.integer' => ':attributeは数字で入力してください。',
            'stock.required' => ':attributeは必須項目です。',
            'stock.integer' => ':attributeは数字で入力してください。',
            'comment.max' => ':attributeは:max字以内で入力してください。',
            'img_path.image' => ':attributeファイルを選択してください。',
        ];
    }
}
