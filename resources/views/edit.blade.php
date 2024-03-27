@extends('layouts.app')

@section('title', '商品情報編集画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品情報編集画面</h1>
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

                <button type="submit" class="btn btn-regist">更新</button>

                <button type="submit" class="btn btn-return">戻る</button>
            </form>
        </div>
    </div>
@endsection