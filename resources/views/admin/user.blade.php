@extends('layouts.app')

@section('header')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Forum</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css.map')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">


    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all-skins.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection

@section('content')
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>

                    <li>
                        <a href="/admin/threads">
                            <i class="fa fa-envelope"></i> <span>Threads</span>
                            <span class="pull-right-container">

                          <small class="label pull-right bg-green">{{$threads->count()}}</small>

                        </span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/user">
                            <i class="fa fa-envelope"></i> <span>USERS</span>
                            <span class="pull-right-container">

                          <small class="label pull-right bg-green">{{$user->count()}}</small>

                        </span>
                        </a>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Version 2.0</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="info-box">
                            <h2>USERS</h2>
                            @forelse ($user as $user)

                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="display: flex;">
                                        <h3 class="panel-title"><a href="{{ route('profile', $user->name) }}">{{ $user->name }}</a></h3>

                                    </div>
                                    <div class="panel-body">

                                        <div class="col-md-2">
                                            @if( $user->avatar_path === NULL)
                                                {
                                                    <img class="img-responsive" src="images/avatars/default.jpg">
                                                }



                                            @else
                                                    <img class="img-responsive" src="{{ $user->avatar_path }}">

                                            @endif
                                        </div>
                                        <p>
                                            Email: {{ $user->email }}
                                        </p>

                                        <p>
                                            Student ID: {{ $user->std_id }}
                                        </p>
                                        <p>
                                            Roles : {{$user->role}}
                                        </p>
                                    </div>

                                    <div class="panel-footer">
                                        {{--//delete form--}}
                                        <form action="user/delete/{{ $user->id }}" method="POST" class="panel-title inline-it">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                                        </form>
                                    </div>

                                </div><!----panel end--->

                            @empty
                                <p>There are no relevant results at this time.</p>
                            @endforelse

                            <div class="info-box-content">

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
    </div>
    <!-- ./wrapper -->

    @endsection

    @section('scripts')
        {{--<script src="https://code.jquery.com/jquery-3.1.1.min.js"--}}
        {{--integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="--}}
        {{--crossorigin="anonymous"></script>--}}
        {{--<!-- Latest compiled and minified JS -->--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

        <script src="{{asset('js/adminlte.min.js')}}"></script>

@endsection

