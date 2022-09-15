@extends('backend.layouts.master')

@section('title')
    Computer Type Show Admin 
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assetBE/assets/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assetBE/assets/type/index.css') }}">
@endsection


@section('js')
    <script src="{{ asset('assetBE/assets/main.js') }}"></script>
    <script src="{{ asset('assetBE/assets/vendors/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assetBE/assets/vendors/format_money/simple.money.format.js') }}"></script>
    <script>
        $('.price-format').simpleMoneyFormat()
    </script>
@endsection

@section('content')
    <div class="content-wrapper card">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Show Type</h4>

                <div class="dropdown">
                    <a href="{{ route('specId.create'). '/?type_id='.request()->type_id.'&&product_id='.request()->product_id }}" class="btn btn-primary dropdown-toggle float-btn" id="dropdownMenuIconButton8" >
                      <i class="ti-settings text-primary"></i>
                    </a>
                </div>

                
               
                <div class="table-responsive pt-3">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type_id</th>
                                <th>Product_id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if (!empty($specifications))
                                    <td>{{$specifications->id}}</td>
                                    <td>{{$specifications->name}}</td>
                                    <td>{{$specifications->type_id }}</td>
                                    <td>{{$specifications->product_id }}</td>
                                @endif
                                {{-- <td class="parent">
                                    <a href="{{ route('type.edit', $specifications->id) }}">
                                        <button type="button" class="btn btn-success btn-icon-text">
                                            Edit
                                            <i class="ti-file btn-icon-append"></i>                          
                                        </button>
                                    </a>
                                    <a href="" data-url="{{ route('type.destroy', $specifications->id) }}" class="active_delete">
                                        <button type="button" class="btn btn-danger btn-icon-text">
                                            Delete
                                            <i class="mdi mdi-delete"></i>                          
                                        </button>
                                    </a>
                                </td> --}}
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection