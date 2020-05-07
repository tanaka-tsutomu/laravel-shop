@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-sm-12 px-4 py-2">

                <div class="row">
                    <div class="col-md">
                        <h3 class="border-bottom mb-3">新着</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <a href="http://localhost/products/{{$product->id}}">
                                    <img class="card-img-top bd-placeholder-img"
                                         @if($product->image_path == null)
                                         src="/photo/no_image.png"
                                         @else
                                         src=/{{$product->image_path}} @endif>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </main>
        </div>
    </div>
@endsection
