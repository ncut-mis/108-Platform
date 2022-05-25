@extends('layouts.master')

@section('title','修改公告')

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
                                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                    <a href="#" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                            <div class="ms-2">
                                                <h6 class="fw-normal mb-0">收到XXX訊息</h6>
                                                <small>15 minutes ago</small>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a href="#" class="dropdown-item text-center">See all message</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-bell me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">Notificatin</span>&nbsp;
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">提醒XXX</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">提醒XXX</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all notifications</a>
                            </div>
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
            <div class="col-md-11" style="margin-left:6%;margin-top:3%">
                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0" frame="void">
                            <thead>
                            </thead>
                            <tfoot>
                            <tbody>
                            @if(isset($post3))
                                <form action="{{route('posts.update_post',$post3->id)}}">
                                    <tr><td><div><h3><a class="a1"><i class="bi bi-brush"></i>&nbsp; {{$post3->title}}</a></h3></div></td></tr>
                                    <tr><td><div>日期：<input type="text" name="date" value="{{$post3->date}}"></div></td></tr>
                                    <tr><td><div>標題：<input type="text" name="title" value="{{$post3->title}}"></div></td></tr>
                                    <tr><td><div><p style="white-space: pre-line;">內容：
                                          <textarea name="content" rows="10" cols="80">{{$post3->content}}</textarea>
                                    </p></div></td></tr>
                                    <td style="border: none">
                                        公布對象：
                                        @if($post3->for == '1')
                                            <input type="radio" name="for" value="1" checked>檢測人員
                                            <input type="radio" name="for" value="0">賣家&nbsp;
                                        @else
                                            <input type="radio" name="for" value="1">檢測人員
                                            <input type="radio" name="for" value="0" checked>賣家&nbsp;
                                        @endif
                                    </td>
                                    <tr style="text-align: center">
                                        <td>
                                            {{--<a class="btn btn-sm btn-primary" href="{{route('posts.update_post',$post3->id)}}">修改</a>--}}
                                            <button style="text-align:center" class="btn btn-sm btn-primary">修改</button>
                                        </td>
                                    </tr>
                                </form>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

