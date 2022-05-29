@extends('layouts.master')

@section('title','公告管理')

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
            <div class="col-md-11" style="margin-left:6%;margin-top:3%">
                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0" frame="void">
                            <thead>
                            @if(isset($post1))
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h3> <a class="a1"><i class="bi bi-brush"></i>&nbsp; 公告管理</a></h3>
                                </div>
                                <div style="vertical-align: center; text-align: right">
                                    <a class="btn btn-sm btn-warning" href="{{route('posts.create_post')}}">發布公告</a>
                                </div>
                            <thead>
                            <tr>
                                <th>日期</th>
                                <th>標題</th>
                                <th>公告對象</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tbody>
                            @foreach($post1 as $p1)
                                <tr>
                                <td><div>{{$p1->date}}</div></td>
                                <td><div style="font-size: 18px;">{{$p1->title}}</div></td>
                                @if($p1->for == '0')
                                    <td><div style="font-size: 18px;">賣家</div></td>
                                @else
                                    <td><div style="font-size: 18px;">檢測人員</div></td>
                                @endif
                                <td><div>
                                        <form action="{{route('posts.show_post',$p1->id)}}">
                                            <input type="hidden" name="id" value="{{$p1->id}}">
                                            <button style="text-align:center; vertical-align:center; color: black; font-size: 18px;" class="btn btn-sm btn-link">詳細內容</button>
                                        </form>
                                </div></td>
                                <td><div>
                                        <a class="btn btn-sm btn-primary" href="{{route('posts.update_post',$p1->id)}}">修改</a>&nbsp;/&nbsp;
                                        <a class="btn btn-sm btn-danger" href="{{route('posts.delete_post',$p1->id)}}"  OnClick="return confirm('確定要刪除嗎?')">刪除</a>
                                </div></td>
                            @endforeach
                            @endif
                            @if(isset($post2))
                                <div style="vertical-align: center; text-align: right">
                                    <a class="btn btn-sm btn-danger" href="{{route('posts.index')}}">返回</a>
                                </div>
                                <table>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h3> <a class="a1"><i class="bi bi-brush"></i>&nbsp; {{$post2->title}}</a></h3>
                                    </div>
                                    <tr><td><div>
                                         <p style="white-space: pre-line; font-size: 20px;">{{$post2->content}}</p>
                                    @if($post2->id == 4)
                                        <?php
                                        $check = \App\Models\Category::where('categories.status','=','1')->get();?>
                                        @foreach($check as $cc)
                                            <tr><td><div>
                                                        <form action="{{route('posts.show_item',$cc->id)}}">
                                                            <input type="hidden" name="category_id" value="{{$cc->id}}">
                                                            <button style="text-align:center; vertical-align:center; color: black; font-size: 18px;" class="btn btn-sm btn-link">{{$cc->name}}</button>
                                                        </form>
                                                    </div></td></tr>
                                        @endforeach
                                        @if(isset($quality))
                                            <tr>
                                                <th>Quality_item</th>
                                                <th>Extra_item</th>
                                            </tr>
                                            @foreach($quality as $qq)
                                                <div style="font-size: 16px;">
                                                    <tr>
                                                        <td>
                                                            {{$qq->content}}
                                                        </td>
                                                        @if($qq->extra == 1)
                                                            <td style="text-align: center">是</td>
                                                        @else
                                                            <td style="text-align: center">  </td>
                                                        @endif
                                                    </tr>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                    </div></td></tr>
                                </table>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
