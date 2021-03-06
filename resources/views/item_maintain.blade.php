@extends('layouts.master')

@section('title','品質檢測項目維護')

<header>
    <nav class="navbar navbar-expand-md navbar-dark"  style="background-color: lightblue">
        <div class="container-fluid" style="margin-left:70%">
            <div class="collapse navbar-collapse navbar-right " id="navbarCollapse">
                <ul class="nav nav-pills nav-fill"><br>
                    <li class="nav-item">
                        <div class="navbar-nav align-items-center  ms-auto">
                            <div class="nav-item dropdown">
{{--                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">--}}
{{--                                    <i class="fa fa-envelope me-lg-2"></i>--}}
{{--                                    <span class="d-none d-lg-inline-flex">Message</span> &nbsp;--}}
{{--                                </a>--}}
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
{{--                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">--}}
{{--                                <i class="fa fa-bell me-lg-2"></i>--}}
{{--                                <span class="d-none d-lg-inline-flex">Notificatin</span>&nbsp;--}}
{{--                            </a>--}}
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
{{--                    <a href="#" class="sidebar-toggler flex-shrink-0" style="margin:auto">--}}
{{--                        &nbsp;<i class="bi bi-arrow-up-right-square-fill"></i>--}}
{{--                    </a>--}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="content">
            <div class="col-md-10" style="float: left;margin:2%">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3> <a class="a1"><i class="bi bi-tools"></i>&nbsp; {{$name->name}}檢測項目維護</a></h3>
                    </div>
                    <div class="table-responsive" style="font-size: 18px;">
                        <tr>
                            <form action="#">
                                Quality_item：<input type="text" style="width:300px;"  name="new_item">&nbsp;
                                Extra_item：
                                <input type="radio" name="extra" value="1">是
                                <input type="radio" name="extra" value="0">否&nbsp;
                                <button style="text-align:center" class="btn btn-sm btn-primary">新增</button>
                            </form>
                        </tr>
                        <table class="table text-start align-middle table-bordered table-hover mb-0" style="font-size: 18px;">
                            <thead>
                            </thead>
                            <tbody>
                                <tr class="text-dark">
                                    <th scope="col" style="border: none;">Quality_item</th>
                                    <th scope="col" style="text-align: center;vertical-align: middle; border: none;">Extra_item</th>
                                    <th scope="col" style="text-align: center;vertical-align: middle; border: none;" colspan='7'>Action</th>
                                </tr>
                                @foreach($items as $quality)
                                    @if(isset($_GET['id']) && isset($_GET['category_id']))
                                        @if($quality->id == $_GET['id'] && $quality->category_id == $_GET['category_id'])
                                            <form action="{{route('adminhome.update_item')}}">
                                                <tr>
                                                    <td style="border: none">
                                                        <input type="text" style="width:300px"  name="content" value="{{$quality->content}}">
                                                    </td>
                                                    <td style="border: none;">
                                                        @if($quality->extra == '1')
                                                            <input type="radio" name="extra1" value="1" checked>是
                                                            <input type="radio" name="extra1" value="0">否&nbsp;
                                                        @else
                                                            <input type="radio" name="extra1" value="1">是
                                                            <input type="radio" name="extra1" value="0" checked>否&nbsp;
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;vertical-align: middle; border: none">
                                                        <input type="hidden" name="id" value="{{$quality->id}}">
                                                        <input type="hidden" name="category_id" value="{{$quality->category_id}}">
                                                        <button style="text-align:center" class="btn btn-sm btn-primary">修改</button>&nbsp;/&nbsp;
                                                        <a href="{{route('adminhome.show',$quality->category_id)}}" class="btn btn-sm btn-danger">返回</a>
                                                    </td>
                                                </tr>
                                            </form>
                                        @else
                                            <tr>
                                                <td style="border: none">{{$quality->content}}</td>
                                                @if($quality->extra == '1')
                                                    <td style="text-align: center;vertical-align: middle; border: none">是</td>
                                                @else
                                                    <td style="text-align: center;vertical-align: middle; border: none">&nbsp; </td>
                                                @endif
                                                <td style="text-align: center;vertical-align: middle; border: none">
                                                    <form action="{{--{{route('adminhome.item_maintain')}}--}}">
                                                        <input type="hidden" name="id" id="id" value="{{$quality->id}}">
                                                        <input type="hidden" name="category_id" value="{{$quality->category_id}}">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @else
                                        <tr>
                                            <td style="border: none">{{$quality->content}}</td>
                                            @if($quality->extra == '1')
                                                <td style="text-align: center;vertical-align: middle; border: none">是</td>
                                            @else
                                                <td style="text-align: center;vertical-align: middle; border: none">&nbsp; </td>
                                            @endif
                                            <td style="text-align: center;vertical-align: middle; border: none">
                                                <form action="{{--{{route('adminhome.item_maintain')}}--}}">
                                                    <input type="hidden" name="id" id="id" value="{{$quality->id}}">
                                                    <input type="hidden" name="category_id" value="{{$quality->category_id}}">
                                                    <button style="text-align:center" class="btn btn-sm btn-primary">修改</button>
                                                </form>
                                            </td>
                                            <td style="text-align: center;vertical-align: middle; border: none">
                                                <form action="{{route('adminhome.delete_item',$quality->id)}}">
                                                    <input type="hidden" name="category_id" value="{{$quality->category_id}}">
                                                    <button style="text-align:center" class="btn btn-sm btn-danger" OnClick="return confirm('確定要刪除嗎?')">刪除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table><br><br>
                        <tr>
                            <td style="text-align: center;vertical-align: middle; border: none" colspan='8'>
                                <a href="{{route('adminhome.category_maintain')}}" class="btn btn-sm btn-danger">返回</a>
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</main>
