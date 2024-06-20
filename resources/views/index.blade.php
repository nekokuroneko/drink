@extends('layouts.parent')

@section('title', '商品一覧画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品一覧画面</h1>
                <div class="search">
                    <form id="serchform">
                        <div class="kensaku1">
                            <input type="text" id="keyword" name="keyword" placeholder="検索キーワード">
                            <select class="kensaku" id="manufacturer" name="manufacturer">
                                <option value="">メーカー名</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="kensaku2">
                            <label for="kakaku" class="kakaku">価格</label>
                                <input type="number" id="kakakuKagen" name="kakakuKagen" placeholder="下限">
                                <input type="number" id="kakakuJougen" name="kakakuJougen" placeholder="上限">
                            <label for="zaiko" class="zaiko">在庫数</label>
                                <input type="number" id="zaikoKagen" name="zaikoKagen" placeholder="下限">
                                <input type="number" id="zaikoJougen" name="zaikoJougen" placeholder="上限">
                            <button type="button" id="btnKensaku" class="btnKensaku">検索</button>
                        </div>
                    </form>
                </div>
        </div>
        <div class="list">
            <table class="drinkList">
                <thead>
                    <tr>
                        <th>ID  ▼</th>
                        <th>商品画像</th>
                        <th>商品名  ▼</th>
                        <th>価格  ▼</th>
                        <th>在庫数  ▼</th>
                        <th>メーカー名  ▼</th>
                        <th><button id="btnShinki" class="btnShinki"><a href="{{ route('drink.create') }}">新規登録</a></button></th>
                    </tr>
                <thead>
                <tbody> 
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}.</td>
                        <td><img src="{{ asset($product->img_path) }}"></td>
                        <td>{{ $product->product_name }}</td>
                        <td>&yen{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->company->company_name }}</td>
                        <td>
                            <button id="btnShousai" class="btnShousai"><a href="{{ route('drink.show', $product->id) }}">詳細</a></button>
                        </td>
                        <td>                            
                            <input data-product_id="{{$product->id}}" type="button" class="btnSakujo" value="削除">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="paginate">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
