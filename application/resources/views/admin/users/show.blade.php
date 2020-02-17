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
                        <a class="nav-link" href="http://localhost/admin/admin_users">
                            管理者管理
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
            <ul class="list-inline pt-3">
                <li class="list-inline-item">
                    <a href="http://localhost/admin/users" class="btn btn-light">一覧</a>
                </li>
                <li class="list-inline-item">
                    <a href="http://localhost/admin/users/{{$user->id}}/edit" class="btn btn-success">編集</a>
                </li>
                <li class="list-inline-item">
                    <form action="http://localhost/admin/users/{{$user->id}}" method="POST">
                        <input type="hidden" name="_token" value="0Zo8wxX25KWjvoTvAk8f7AnPSvlDndvhedH3rVKQ">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </li>
            </ul>

            <table class="table">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th>名称</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{$user->email}}</td>
                </tr>
                </tbody>
            </table>

        </main>

    </div>
</div>
@endsection
