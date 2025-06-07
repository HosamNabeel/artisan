<div>
    <h3> {{ $post->comments->count() == 0 ? 'لا يوجد تعليقات' : 'التعليقات (' . $post->comments->count() . ')' }} </h3>

    <div class="comments">
        @foreach ($post->comments as $comment)
            @if (!$comment->parent)
                @include('site.post._comment', ['comment' => $comment])
            @endif
        @endforeach
    </div>
</div>
