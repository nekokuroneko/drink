@extends('layouts.app')

@section('title', '商品新規登録画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品新規登録画面</h1>
            <form action="#" method="post">
                @csrf

                <div class="form-group">
                    <label for="product">商品名</label>
                    <input type="text" class="form-control" id="product" name="product">
                </div>

                <div class="form-group">
                    <label for="company">メーカー名</label>
                    <input type="text" class="form-control" id="company" name="company">
                </div>

                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="form-group">
                    <label for="stock">在庫数</label>
                    <input type="text" class="form-control" id="stock" name="stock">
                </div>

                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea class="form-control" id="comment" name="comment"></textarea>
                </div>

                <div class="form-group">
                    <label for="photo">商品画像</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                </div>
                <form action="route('regist')" method="POST" enctype='multipart/form-data'>
	<input type="file" name="image">
	<input type="submit">
</form>

                <button type="submit" class="btn btn-regist">新規登録</button>

                <button type="submit" class="btn btn-return">戻る</button>
            </form>
        </div>
    </div>
@endsection