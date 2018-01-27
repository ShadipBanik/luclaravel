@extends('layouts.app')


@section('header')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Forum</title>

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">


    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all-skins.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css.map')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection

@section('content')
    <body class="hold-transition skin-blue sidebar-mini">
    <div class=" wrapper">


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

                          <small class="label pull-right bg-green">{{$userAll->count()}}</small>
                        </span>
                        </a>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="padding-bottom: 300px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Lu Forum Admin Dashboard

                </h1>
                <ol class="breadcrumb">
                    <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="info-box">
                            <div class="content-wrap well">
                                <h1>Welcome</h1>
                            </div>
                            <div class="info-box-content">


                                <ul>
                                    <li>Total Number of <a href="/admin/user">User</a> Registerd : {{$userAll->count()}}</li>
                                    <li>Total Number of  <a href="/admin/threads">Thread</a> Created : {{$threads->count()}}</li>
                                    <li>Channels
                                        <ul>
                                    @foreach($channel as $channel)

                                                <li><a href="/threads/{{ $channel->slug }}">{{$channel->name}}</a></li>

                                        @endforeach
                                        </ul>
                                    </li>
                                </ul>

                                <hr>

                                <h2>Add new channel here</h2>
                                <form class="col-md-5" method="POST" action="channelcreate">
                                    {{ csrf_field() }}

                                    <div class="form-group">

                                        <input type="text"  class="form-control" id="channel" name="name" value="{{old('name')}}" required>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Publish</button>
                                    </div>


                                    @if (count($errors))
                                        <ul class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </form>

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


