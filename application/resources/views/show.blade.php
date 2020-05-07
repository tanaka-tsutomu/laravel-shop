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
                <div class="row">
                    <div class="col-md-5">
                        <img class="img-thumbnail" @if($product->image_path == null)
                            src="/photo/no_image.png">
                        @else
                            src=/{{$product->image_path}}>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <h2 class="col-md">{{$product->name}}</h2>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md">
                                <span class="mr-3">価格:</span>
                                <soan class="h5 text-danger">¥{{number_format($product->price)}}</soan>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md">
                                {{$product->description}}
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md">
                        <a class="btn btn-primary" href="http://localhost/products/{{$product->id}}/product_reviews/create">レビューを書く</a>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md">
                        <ul class="list-unstyled">
                            <li class="media bg-white p-2 mb-3">
                                <img src="http://shop.illmatics.space/storage/user_images/n08V56kCHCBHSrBMRt5NBAcns0U4rWAc4emu3ef5" width="30" height="30" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h6>hoge G</h6>
                                    <h5>
                                        sugoi
                                    </h5>
                                    <div class="text-warning">★★★★</div>
                                    hogehoge.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
