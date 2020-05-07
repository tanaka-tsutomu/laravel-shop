@extends('layouts.app')

@section('content')
    hoge　{{$product->id}} ({{$product->name}})
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="http://localhost/home">Shopping</a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="form-inline my-2 my-lg-0" action="http://localhost/product">
                <select class="custom-select" id="product_category" name="product_category">
                    <option value="all">すべてのカテゴリー</option>

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                                @if ($productCategory == $category->id) selected
                            @endif>{{ $category->name }}</option>
                    @endforeach>

                </select>
                <input class="form-control mr-sm-2" type="search" name="keyword" value="" placeholder="商品検索">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="http://localhost/register" class="nav-link">新規登録</a>
                </li>
                <li class="nav-item">
                    <a href="http://localhost/login" class="nav-link">ログイン</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-sm-12 px-4 py-2">
                <div class="row pt-3">
                    <div class="col-sm">
                        <form action="http://localhost/products/{{$product->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">タイトル</label>
                                <input type="text" class="form-control " id="title" name="title" value="" placeholder="タイトル" autofocus="">
                                <span class="help-block" style="font-weight: bold; color: red">{{$errors->first('title')}}</span>
                            </div>

                            <div class="form-group">
                                <label for="body">本文</label>
                                <input type="text" class="form-control " id="body" name="body" value="" placeholder="本文">
                                <span class="help-block" style="font-weight: bold; color: red">{{$errors->first('body')}}</span>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="rank1" name="rank" value="1" checked="">
                                <label class="form-check-label" for="rank1">星1つ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="rank2" name="rank" value="2">
                                <label class="form-check-label" for="rank2">星2つ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="rank3" name="rank" value="3">
                                <label class="form-check-label" for="rank3">星3つ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="rank4" name="rank" value="4">
                                <label class="form-check-label" for="rank4">星4つ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="rank5" name="rank" value="5">
                                <label class="form-check-label" for="rank5">星5つ</label>
                            </div>

                            <hr class="mb-3">

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="http://localhost/products/{{$product->id}}" class="btn btn-secondary">商品へ戻る</a>
                                </li>
                                <li class="list-inline-item">
                                    <button type="submit" class="btn btn-primary">レビュー</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
