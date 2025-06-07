@php
    $img = null;
    $name = null;
    $lastMessage = $conversation->messages()->latest()->first();
    if ($conversation->type == 'individual'){
        $user = $conversation->users->where('id', '!=', auth()->id())->first() ?? null;
        $img = $user->image;
        $name = $user->name;
    }else{
        $img = $conversation->group->image;
        $name = $conversation->group->name;
    }
@endphp
<li>
    <a href="#" data-conversation="#conversation{{ isset($isGroups)  ? '-group' :  ''}}-{{$conversation->id}}">
        <img class="content-message-image"
            src="{{ $img }}"
            alt="">
        <span class="content-message-info">
            <span class="content-message-name">
                {{ $name }}
            </span>
            <span class="content-message-text">
                @if($lastMessage)
                    {{ $lastMessage->message}}
                @endif
            </span>
        </span>
        <span class="content-message-more">
            <span class="content-message-unread">5</span>
            <span class="content-message-time">
                @if($lastMessage)
                {{ $lastMessage->created_at->format('h:i') }}
                @endif</span>
        </span>
    </a>
</li>
