@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1 style="font-size: 40px">Forum</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-3">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Search
                            </div>

                            <div class="panel-body">
                                <form method="GET" action="/threads/search">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" placeholder="Search for something..." name="q" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        @if (count($trending))

                            <h3>Trending Threads</h3>

                            <ul class="list-group">
                                <a class="list-group-item active">All</a>
                                @foreach ($trending as $thread)

                                        <a class="list-group-item" href="{{ url($thread->path) }}">
                                            {{ $thread->title }}
                                        </a>

                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>


                <div class="col-md-9">
                    @include ('threads._list')

                    {{ $threads->render() }}
                </div>


            </div>



        </div>
    </div>
@endsection