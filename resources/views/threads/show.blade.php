@extends('layouts.app')
@section('header')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">

@endsection

@section('content')
    <thread-view :thread="{{ $thread }}" inline-template>
        <div class="container" style="padding-top: 50px;">
        <div class="row">
            <div class="col-md-8" v-cloak>
                @include ('threads._question')

                <replies @added="repliesCount++" @removed="repliesCount--"></replies>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-body">
                            <p>
                                This thread was published {{ $thread->created_at->diffForHumans() }} by
                                <a href="#">{{ $thread->creator->name }}</a>, and currently
                                has <span v-html="repliesCount"></span> {{ str_plural('comment', $thread->replies_count) }}
                                .
                            </p>

                            <p>
                                <subscribe-button :active="{{ json_encode($thread->isSubscribedTo) }}"></subscribe-button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>
@endsection