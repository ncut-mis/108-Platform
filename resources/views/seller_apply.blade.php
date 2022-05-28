@extends('layouts.master')

@section('title','賣家申請')

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
            <div class="col-md-11" style="margin-left:6%;margin-top:3%">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3><a class="a1"><i class="bi bi-journal-arrow-down"></i>&nbsp;賣家申請單</a></h3>
                    </div>
                    <div class="table-responsive">
                        <table   class="table text-start  align-middle table-bordered table-hover mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th scope="col" style="text-align: center;vertical-align: middle; border: none">會員ID</th>
                                <th scope="col" style="text-align: center;vertical-align: middle; border: none">會員名稱</th>
                                <th scope="col" style="text-align: center;vertical-align: middle; border: none">銀行代碼</th>
                                <th scope="col" style="text-align: center;vertical-align: middle; border: none">銀行帳號</th>
                                <th scope="col" style="text-align: center;vertical-align: middle; border: none">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applies as $apply)
                                <tr>
                                    <td style="text-align: center;vertical-align: middle; border: none"><div style="font-size: 18px;">{{$apply->member_id}}</div></td>
                                    <td style="text-align: center;vertical-align: middle; border: none"><div style="font-size: 18px;"><b>{{$apply->name}}</b></div></td>
                                    <td style="text-align: center;vertical-align: middle; border: none"><div style="font-size: 18px;">{{$apply->bank_branch}}</div></td>
                                    <td style="text-align: center;vertical-align: middle; border: none"><div style="font-size: 18px;">{{$apply->account}}</div></td>
                                    <td style="text-align: center;vertical-align: middle; border: none">
                                        <div style="font-size: 18px;">
                                        <a class="btn btn-sm btn-primary" href="{{route('apply.pass',$apply->member_id)}}">通過</a>&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-danger" href="{{route('apply.fail',$apply->id)}}">不通過</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
