@extends('admin.layouts.master')
@section('admin_title','Quản lý sản phẩm')
@section('content')
    <div class="container-fluid">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-9" style="margin-bottom: 20px;">
                <div class="form-filter">
                    <form action="" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="id" placeholder="ID" value="{{ Request::get('id') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="n" placeholder="Name" value="{{ Request::get('n') }}">
                        </div>
                        <button class="btn btn-primary">Lọc</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.get.product.create') }}" class="btn btn-success pull-right"> + Thêm mới</a>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="3%">Ảnh</th>
                            <th width="8%" class="text-center">Tên Sản Phẩm</th>
                            <th width="4%" class="text-center">Bảo Hành</th>
                            <th width="5%" class="text-center">Mô Tả</th>
                            <th width="3%" class="text-center">Giá</th>
                            <th width="5%" class="text-center">Xử Lý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($products))
                            @foreach($products as $product)
                                <tr data-row-id="956" class="row_facebook" id="row_facebook_956">
                            <td>{{ $product->id }}</td>
                            <td align="center">
                                <img src="{{ asset('source/image/product/') }}/{{ $product->image }}" alt=""
                                class="img-thumbnail" style="width: 80px;height: 80px;">
                            </td>
                            <td>
                                <div>
                                        {{ $product->name }}
                                </div>
                            </td>
                            <TD>
                                <div>{{$product->warranty}}</div>
                            </TD>
                            <td align="center">
                                <p>{{ $product->description }}</p>
                            </td>
                            <td align="center" class="fb_sof_attempt">
                                <span>{{ number_format($product->unit_price,0,',','.') }} VNĐ / {{ $product->unit }}</span>
                            </td>
                            
                            <td align="center">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                            data-toggle="dropdown">
                                        Hoạt
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu source-menu-action" role="menu" aria-labelledby="dropdownMenu1">
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="{{ route('admin.get.product.update',$product->id) }}">Edit </a>
                                        </li>
                                        <li role="presentation"><a role="menuitem"
                                                                   data-url="" tabindex="-3" href="{{ route('admin.get.product.delete', $product->id) }}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="pagination-view">
                        {{ $products->currentPage() }} - {{ $products->perPage() }}/{{ $products->total() }} records
                        <div class="pull-right">
                            {!! $products->appends($query)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop