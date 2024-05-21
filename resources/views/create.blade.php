@extends('layouts.parent')

@section('title', '商品新規登録画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品新規登録画面</h1>
        </div>

        <div class="form">
        <form action="{{ route('drink.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="product_name" class="product_name">商品名</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}">
                @if($errors->has('product_name'))
                    <p>{{ $errors->first('product_name') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="company_name" class="company_name">メーカー名</label>
                <select class="form-control" id="company_name" name="company_name">
                    <option value="">メーカー名</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @if(old('company_name') == $product->id) selected @endif>
                            {{ $product->company_name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('company_name'))
                    <p>{{ $errors->first('company_name') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="price" class="price">価格</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                @if($errors->has('price'))
                    <p>{{ $errors->first('price') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="stock" class="stock">在庫数</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
                @if($errors->has('stock'))
                    <p>{{ $errors->first('stock') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="comment" class="comment">コメント</label>
                <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>
                @if($errors->has('comment'))
                    <p>{{ $errors->first('comment') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="img_path" class="img_path">商品画像</label>
	            <input type="file" id="img_path" name="img_path" value="{{ old('img_path') }}">
                @if($errors->has('img_path'))
                    <p>{{ $errors->first('img_path') }}</p>
                @endif
            </div>

            <button type="submit" id="btnTouroku" class="btnTouroku">新規登録</button>
            <button id="btnModoru" class="btnModoru"><a href="{{ route('drink.index') }}">戻る</a></button>
        </form>  
        </div>      
    </div>
@endsection
