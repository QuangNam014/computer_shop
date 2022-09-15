@extends('backend.layouts.master')

@section('title')
    Computer Product Show Admin 
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('assetBE/assets/product/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assetBE/assets/main.css') }}">
@endsection


@section('js')
    <script src="{{ asset('assetBE/assets/main.js') }}"></script>
    <script src="{{ asset('assetBE/assets/vendors/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ asset('assetBE/assets/vendors/format_money/simple.money.format.js') }}"></script>
    <script>
        $( function() {
            $('.price-format').simpleMoneyFormat();
            $("#slider-range").slider({
                range: true,
                min: {{$min_price_range}},
                max: {{$max_price_range}},
                step: 500000,
                values: [ {{$min_price}}, {{$max_price}} ],
                // KHI SLIDER THAY ĐỔI
                slide: function( event, ui ) {
                    
                    $( "#amount_min" ).val(ui.values[ 0 ]).simpleMoneyFormat();
                    $( "#amount_max" ).val(ui.values[ 1 ] ).simpleMoneyFormat();
                    $( "#max_price" ).val(ui.values[ 0 ]);
                    $( "#min_price" ).val(ui.values[ 1 ]);
                }
            });
            // HIỂN THỊ SỰ THAY ĐỔI
            // $( "#amount" ).val( "VNĐ " + $( "#slider-range" ).slider( "values", 0 ) +
            // " - VNĐ " + $( "#slider-range" ).slider( "values", 1 ) ).simpleMoneyFormat();
            $( "#amount_min" ).val($( "#slider-range" ).slider( "values", 0 )).simpleMoneyFormat();
            $( "#amount_max" ).val($( "#slider-range" ).slider( "values", 1 )).simpleMoneyFormat();
        });
    </script>
@endsection

@section('content')
    <div class="content-wrapper card">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Show Product</h4>

                <div class="col-md-4">
                    <label for="">Filter price</label>
                    <form action="{{ route('product.search') }}" method="post">
                        @csrf
                        <div id="slider-range"></div>

                        <div style="display: flex; width: 70%; margin: 0 auto;">
                            <b style="width: 56%;">Giá từ:</b>
                            <input type="text" id="amount_min" readonly style="border:0; color:#f6931f; font-weight:bold; width: 100%;">
                            <b style="width: 17%;">-</b>
                            <input type="text" id="amount_max" readonly style="border:0; color:#f6931f; font-weight:bold; width: 100%;">
                        </div>

                        <input type="hidden" name="max_price" id="max_price">
                        <input type="hidden" name="min_price" id="min_price">
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                        </div>
                    </form>
                </div>

                <div class="table-responsive pt-3">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Promo price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td class="price-format">{{$product->normal_price}}</td>
                                    <td class="price-format">{{$product->promotion_price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <img id="image_index_product" src="{{ asset($product->feature_image_path) }}" alt="{{$product->feature_image_name}}">
                                    </td>
                                    <td>{{optional($product->category)->name}}</td>
                                    <td class="parent">
                                        <a href="{{ route('specId.index'). '/?product_id='.$product->id.' &&type_id='.$product->type_id }}">
                                            <button type="button" class="btn btn-success btn-icon-text">
                                                Type
                                                <i class="ti-file btn-icon-append"></i>                          
                                            </button>
                                        </a>
                                        <a href="{{ route('product.edit', $product->id) }}">
                                            <button type="button" class="btn btn-success btn-icon-text">
                                                Edit
                                                <i class="ti-file btn-icon-append"></i>                          
                                            </button>
                                        </a>
                                        <a href="" data-url="{{ route('product.destroy', $product->id) }}" class="active_delete">
                                            <button type="button" class="btn btn-danger btn-icon-text">
                                                Delete
                                                <i class="mdi mdi-delete"></i>                          
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12 margin-paginate-slider-index">
                        {{$products->links()}}
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection