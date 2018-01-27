
@component('profiles.activities.activity')
    @slot('heading')
        <a style="color:#fffdfdad;" href="{{ $activity->subject->favorited->path() }}">
            {{ $profileUser->name }} favorited a reply.
        </a>
    @endslot

    @slot('body')
        {{ $activity->subject->favorited->body }}
    @endslot
@endcomponent