@extends('backend.layouts.master')

@section('title')
    Computer Menu Show Admin 
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assetBE/assets/main.css') }}">
@endsection


@section('js')
    <script src="{{ asset('assetBE/assets/main.js') }}"></script>
    <script src="{{ asset('assetBE/assets/vendors/sweetalert2/sweetalert2@11.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper card">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Show Menu</h4>
        
                <div class="table-responsive pt-3">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Menu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{$menu->id}}</td>
                                    <td>{{$menu->name}}</td>
                                    <td class="parent">
                                        <a href="{{ route('menu.edit', $menu->id) }}">
                                            <button type="button" class="btn btn-success btn-icon-text">
                                                Edit
                                                <i class="ti-file btn-icon-append"></i>                          
                                            </button>
                                        </a>
                                        <a href="" data-url="{{ route('menu.destroy', $menu->id) }}" class="active_delete">
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
                        {{$menus->links()}}
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection