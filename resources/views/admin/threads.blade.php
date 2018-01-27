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
                            <div class="content-wrap well">
                                @forelse ($threads as $thread)
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="level">
                                                <div class="flex">
                                                    <h4>
                                                        <a href="{{ $thread->path() }}">
                                                            @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                                                                <strong>
                                                                    {{ $thread->title }}
                                                                </strong>
                                                            @else
                                                                {{ $thread->title }}
                                                            @endif
                                                        </a>
                                                    </h4>

                                                    <h5>
                                                        Posted By: <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a>
                                                    </h5>
                                                </div>

                                                <a href="{{ $thread->path() }}">
                                                    {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="body">{{ $thread->body }}</div>
                                        </div>
                                        <div class="actions">

                                            {{--//delete form--}}
                                            <form action="{{ $thread->path() }}" method="POST" class=" label ml-a">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-link">Delete Thread</button>
                                            </form>

                                        </div>
                                    </div><!----panel end--->
                                @empty
                                    <p>There are no relevant results at this time.</p>
                                @endforelse
                            </div>
                            <div class="info-box-content">

                                <br>


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

