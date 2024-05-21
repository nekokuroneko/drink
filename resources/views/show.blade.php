@extends('layouts.parent')

@section('title', '商品情報詳細画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品情報詳細画面</h1>
        </div>

        <div class="form">
            <table class="drinkDetail">
                <tr>
                    <td>ID</td>
                    <td>{{ $products->id }}.</td>
                </tr>
                <tr>
                    <td>画像</td>
                    <td><img src="{{ asset($products->img_path) }}"></td>
                </tr>
                <tr>
                    <td>商品名</td>
                    <td>{{ $products->product_name }}</td>
                </tr>
                <tr>
                    <td>メーカー名</td>
                    <td>{{ $products->company->company_name }}</td>
                </tr>
                <tr>
                    <td>価格</td>
                    <td>&yen{{ $products->price }}</td>
                </tr>
                <tr>
                    <td>在庫数</td>
                    <td>{{ $products->stock }}</td>
                </tr>
                <tr>
                    <td>コメント</td>
                    <td>{{ $products->comment }}</td>
                </tr>
            </table>
            <button id="btnHenshu" class="btnHenshu"><a href="{{ route('drink.edit', $products->id) }}">編集</a></button>
            <button id="btnModoru" class="btnModoru"><a href="{{ route('drink.index', $products) }}">戻る</a></button>
        </div>
    </div>
@endsection
