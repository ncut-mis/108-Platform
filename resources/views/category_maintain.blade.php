@extends('layouts.master')

@section('title','商品類別維護')

<header>
    <nav class="navbar navbar-expand-md navbar-dark"  style="background-color: lightblue">
        <div class="container-fluid" style="margin-left:70%">
            <div class="collapse navbar-collapse navbar-right " id="navbarCollapse">
                <ul class="nav nav-pills nav-fill"><br>
                    <li class="nav-item">
                        <div class="navbar-nav align-items-center  ms-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-envelope me-lg-2"></i>
                                    <span class="d-none d-lg-inline-flex">Message</span> &nbsp;
                                </a>
{{--                                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">--}}
{{--                                    <a href="#" class="dropdown-item">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">--}}
{{--                                            <div class="ms-2">--}}
{{--                                                <h6 class="fw-normal mb-0">收到XXX訊息</h6>--}}
{{--                                                <small>15 minutes ago</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <hr class="dropdown-divider">--}}
{{--                                    <a href="#" class="dropdown-item text-center">See all message</a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-bell me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">Notificatin</span>&nbsp;
                            </a>
{{--                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">--}}
{{--                                <a href="#" class="dropdown-item">--}}
{{--                                    <h6 class="fw-normal mb-0">提醒XXX</h6>--}}
{{--                                    <small>15 minutes ago</small>--}}
{{--                                </a>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                                <a href="#" class="dropdown-item">--}}
{{--                                    <h6 class="fw-normal mb-0">提醒XXX</h6>--}}
{{--                                    <small>15 minutes ago</small>--}}
{{--                                </a>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                                <a href="#" class="dropdown-item text-center">See all notifications</a>--}}
{{--                            </div>--}}
                        </div>
                    </li>
                    <a href="#" class="sidebar-toggler flex-shrink-0" style="margin:auto">
                        &nbsp;<i class="bi bi-arrow-up-right-square-fill"></i>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="content">
            <div class="col-md-8" style="float: left;margin:2%">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3><a class="a1"><i class="bi bi-tools"></i>&nbsp; 商品類別維護</a></h3>
                    </div>
                    <div class="table-responsive" style="font-size: 18px;">
                        <tr>
                            <form action="{{route('adminhome.category_maintain')}}">
                                類別：<input type="text" name="new_category">&nbsp;
                                是否為品質檢測類別：
                                <input type="radio" name="status" value="1">是
                                <input type="radio" name="status" value="0">否&nbsp;
                                <button style="text-align:center" class="btn btn-sm btn-primary">新增</button>
                            </form>
                        </tr>
                        <table class="table text-start align-middle table-bordered table-hover mb-0" style="font-size: 18px;">
                            <thead>
                            <tr class="text-dark" style="text-align: center;vertical-align: middle">
                                <th scope="col" style="border: none;">Category</th>
                                <th scope="col" style="border: none;">是否為品質檢測類別</th>
                                <th scope="col" style="text-align: center;vertical-align: middle;border: none;" colspan='7' >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $type)
                                <tr>
                                    <td style="text-align: center;vertical-align: middle;border: none;">
                                        {{$type->name}}
                                    </td>
                                    <form action="{{route('adminhome.update_category')}}">
                                        <td style="text-align: center;vertical-align: middle; border: none;">
                                        @if($type->status == '1')
                                                <input type="hidden" name="id" value="{{ $type->id }}">
                                                <input type="radio" name="status1" value="1" checked>是
                                                <input type="radio" name="status1" value="0">否&nbsp;
                                        @else
                                                <input type="hidden" name="id" value="{{ $type->id }}">
                                                <input type="radio" name="status1" value="1">是
                                                <input type="radio" name="status1" value="0" checked>否&nbsp;
                                        @endif

                                        @if($type->disable == '0')
                                            <button style="text-align:center" class="btn btn-sm btn-primary">修改</button>
                                        @else
                                            <button style="text-align:center" class="btn btn-sm btn-primary" disabled>修改</button>
                                        @endif
                                        </td>
                                    </form>
                                    @if($type->disable == '0')
                                        <td style="text-align: center;vertical-align: middle; border: none;">
                                            <a href="{{route('adminhome.show',$type->id)}}" class="btn btn-sm btn-secondary">檢測項目維護</a>
                                            <a href="{{route('adminhome.disable_category',$type->id)}}" class="btn btn-sm btn-danger">停用</a>
                                        </td>
                                    @else
                                        <td style="text-align: center;vertical-align: middle; border: none;">
                                            <a href="{{route('adminhome.show',$type->id)}}" class="btn btn-sm btn-secondary">檢測項目維護</a>
                                            <a href="{{route('adminhome.able_category',$type->id)}}" class="btn btn-sm btn-warning">啟用</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br><br>



        </div>
    </div>

</main>
