@extends('layouts.parent')

@section('title', '商品一覧画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品一覧画面</h1>
                <div class="search">
                    <form action="{{ route('drink.index') }}" method="get">
                        @csrf
                        <input type="text" id="keyword" class="kensaku" name="keyword" placeholder="検索キーワード">
                        <select class="kensaku" id="manufacturer" name="manufacturer">
                            <option value="">メーカー名</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                        <button id="btnKensaku" class="btnKensaku">検索</button>
                    </form>
                </div>
        </div>
        <div class="list">
            <table class="drinkList">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
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
                        <td><button id="btnShousai" class="btnShousai"><a href="{{ route('drink.show', $product->id) }}">詳細</a></button></td>
                        <td><form action="{{ route('drink.destroy', $product) }}" method="post" onsubmit="return sakujo()">
                            @csrf
                            @method('delete')
                            <button type="submit" id="btnSakujo" class="btnSakujo">削除</button></form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="paginate">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
