@extends('layouts.admin')

@section('content')
users {{$user->id}} ({{$user->name}})
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
                        <a class="nav-link " href="http://localhost/admin/product_categories">
                            商品カテゴリ管理
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="http://localhost/admin/users">
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
                    <form action="http://13.113.124.239/admin/admin_users/11" method="POST">
                        <input type="hidden" name="_token" value="0Zo8wxX25KWjvoTvAk8f7AnPSvlDndvhedH3rVKQ">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input type="text" class="form-control " id="name" name="name" value="{{$user->name}}" placeholder="名称" autocomplete="name" autofocus="">
                        </div>

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="text" class="form-control " id="email" name="email" value="{{$user->email}}" placeholder="メールアドレス" autocomplete="email">
                        </div>

                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="password" class="form-control " id="password" name="password" placeholder="パスワード" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">パスワード(確認)</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="パスワード(確認)" autocomplete="new-password">
                        </div>

                        <hr class="mb-3">

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="http://localhost/admin/users/{{$user->id}}" class="btn btn-secondary">キャンセル</a>
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
