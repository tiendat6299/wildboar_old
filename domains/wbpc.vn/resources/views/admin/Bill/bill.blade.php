@extends('admin.layouts.master')
@section('admin_title','Quản lý Bill')
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
                        <button class="btn btn-primary">Lọc</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="5%">Customer</th>
                            <th width="3%" class="text-center">Total</th>
                            <th width="12%" class="text-center">Note</th>
                            <th width="5%" class="text-center">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (isset($bill))
                                @foreach ($bill as $bill)
                                <tr>
                                    <td>
                                        {{ $bill->id }}
                                    </td>
                                    <td>
                                        {{ $bill->customer->name }}
                                    </td>
                                    <td>
                                        {{ $bill->total }}
                                    </td>
                                    <td>
                                        {{ $bill->note }}
                                    </td>
                                    <td align="center">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                                Đã xong
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu source-menu-action" role="menu" aria-labelledby="dropdownMenu1">
                                                <li role="presentation"><a role="menuitem" href="{{ route('admin.get.bill.delete', $bill->id) }}">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
