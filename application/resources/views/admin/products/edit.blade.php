@extends('layouts.admin')

@section('content')
products {{$product->id}} ({{$product->name}})
    <div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active " href="http://localhost/admin/products">
                            商品管理
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="http://localhost/admin/product_categories">
                            商品カテゴリ管理
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="http://localhost/admin/users">
                            顧客管理
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="http://localhost/admin/admin_users">
                            管理者管理
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
            <div class="row pt-3">
                <div class="col-sm">
                    <form action="http://localhost/admin/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="0Zo8wxX25KWjvoTvAk8f7AnPSvlDndvhedH3rVKQ">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="product_category_id">商品カテゴリ</label>
                            <select class="custom-select " id="product_category_id" name="product_category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                    @if($category->id == $product->product_category_id)selected
                                    @endif>{{ $category->name }}</option>
                                @endforeach>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">名称</label>
                            <input type="text" class="form-control " id="name" name="name" value="{{$product->name}}" placeholder="名称" autofocus="">
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="number" class="form-control " id="price" name="price" value="{{$product->price}}" placeholder="価格">
                        </div>

                        <div class="form-group">
                            <label for="description">説明</label>
                            <textarea class="form-control " id="description" name="description" placeholder="説明">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image_path">イメージ</label>
                            <input type="file" class="form-control-file" id="image_path" name="image_path">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="delete_image" name="delete_image" value="1">
                            <label for="delete_image">削除</label>
                        </div>
                        <div>
                            <img class="img-thumbnail" src="http://13.113.124.239/storage/product_images/xu3T8gpkHXf8jByUYCOS4nYkpCMQT6EXC7uNAUQM.jpeg">
                        </div>

                        <hr class="mb-3">

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="http://localhost/admin/products" class="btn btn-secondary">キャンセル</a>
                            </li>
                            <li class="list-inline-item">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </main>

    </div>
</div>
@endsection
