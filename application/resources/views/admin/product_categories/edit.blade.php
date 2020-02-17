@extends('layouts.admin')

@section('content')
products {{$productCategory->id}} ({{$productCategory->name}})
    <div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="http://localhost/admin/products">
                            商品管理
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="http://localhost/admin/product_categories">
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
                    <form action="http://localhost/admin/product_categories/1" method="POST">
                        <input type="hidden" name="_token" value="0Zo8wxX25KWjvoTvAk8f7AnPSvlDndvhedH3rVKQ">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input type="text" class="form-control " id="name" name="name" value="{{$productCategory->name}}" placeholder="名称" autocomplete="name" autofocus="">
                        </div>

                        <div class="form-group">
                            <label for="order-no">並び順番号</label>
                            <input type="number" class="form-control " id="order-no" name="order_no" value="{{$productCategory->order_no}}" placeholder="並び順番号">
                        </div>

                        <hr class="mb-3">

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="http://localhost/admin/product_categories/{{$productCategory->id}}" class="btn btn-secondary">キャンセル</a>
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
