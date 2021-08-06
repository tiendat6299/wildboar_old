@extends('admin.layouts.master')
@section('admin_title','Quản lý thành viên')
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
                        <button class="btn btn-primary"><i class="fa fa-filter"></i> Lọc</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th width="2%">ID</th>
                            <th width="7%" class="text-center">Name</th>
                            <th width="10%" class="text-center">Email</th>
                            <th width="5%" class="text-center">Phone</th>
                            <th width="10%" class="text-center">Address</th>
                            <th width="5%" class="text-center">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($users))
                            @foreach($users as $user)
                                <tr data-row-id="956" class="row_facebook" id="row_facebook_956">
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div>
                                            <a href="" target="_blank">
                                                {{ $user->full_name }}
                                            </a>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <p>{{ $user->email }}</p>
                                    </td>
                                    <td align="center">
                                        <p>{{ $user->phone }}</p>
                                    </td>
                                    <td align="center">
                                        <p>{{ $user->address }}</p>
                                    </td>
                                    <td align="center">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                    data-toggle="dropdown">
                                                Actions
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu source-menu-action" role="menu" aria-labelledby="dropdownMenu1">
                                                <li role="presentation">
                                                    <a role="menuitem" href="{{ route('admin.get.user.delete', $user->id) }}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="pagination-view">
                        {{ $users->currentPage() }} - {{ $users->perPage() }}/{{ $users->total() }} records
                        <div class="pull-right">
                            {!! $users->appends($query ?? [])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop