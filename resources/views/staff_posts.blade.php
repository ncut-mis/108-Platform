@extends('layouts.second')

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
                    <?php //if(\Illuminate\Support\Facades\Auth::check()){ $un=auth()->user()->name; echo "歡迎使用者:&nbsp;".$un;}else{}?>

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
            <div class="col-md-11" style="float: left;margin:2%">
                <div class="bg-light text-center rounded p-4">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0" frame="void">
                            <thead>
                            @if(isset($post1))
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h3> <a class="a1"><i class="bi bi-brush"></i>&nbsp; 公告區</a></h3>
                                </div>
                                <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>標題</th>
                                    <th> </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tbody>
                                @foreach($post1 as $p1)
                                    <tr>
                                        <td><div>{{$p1->date}}</div></td>
                                        <td><div>{{$p1->title}}</div></td>
                                        <td><div>
                                                <form action="{{route('staff.show_post',$p1->id)}}">
                                                    <input type="hidden" name="id" value="{{$p1->id}}">
                                                    <button style="text-align:center; vertical-align:center; color: black" class="btn btn-sm btn-link">詳細內容</button>
                                                </form>
                                            </div></td>
                                    </tr>
                                @endforeach
                                @endif
                                @if(isset($post2))
                                    <table>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <h3> <a class="a1"><i class="bi bi-brush"></i>&nbsp; {{$post2->title}}</a></h3>
                                        </div>
                                        <tr><td><div>
                                                    <p style="white-space: pre-line; font-size: 20px;">{{$post2->content}}</p>
                                        </div></td></tr>
                                    </table>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</main>
