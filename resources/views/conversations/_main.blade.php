<div class="content-sidebar">
    <div class="content-sidebar-title">Chats</div>
    <form action="" class="content-sidebar-form">
        <input type="search" class="content-sidebar-input" placeholder="Search...">
        <button type="submit" class="content-sidebar-submit"><i
                class="ri-search-line"></i></button>
    </form>
    <div class="content-messages">
        <ul class="content-messages-list">

            <li class="content-message-title"><span>Recently</span></li>
            @foreach ($conversations as $conversation)
                @include('conversations._user', ['conversation' => $conversation])
            @endforeach
        </ul>
    </div>
</div>
@if (!$open_chat)
    <div class="conversation conversation-default active">
        <i class="ri-chat-3-line"></i>
        <p>Select chat and view conversation!</p>
    </div>
@else
    <div class="conversation active" id="conversation-{{ $open_chat }}">
        <div class="conversation-top">
            @include('conversations._header', ['conversation' => $open_chat])
        </div>
        <div class="conversation-main">
            <ul class="conversation-wrapper">
                @include('conversations._chat', ['conversation' => $open_chat])
            </ul>
        </div>
        @include('conversations._message', ['conversation' => $open_chat])
    </div>
@endif

@foreach ($conversations as $conversation)
    <div class="conversation" id="conversation{{ isset($isGroups)  ? '-group' :  ''}}-{{ $conversation->id }}">
        <div class="conversation-top">
            @include('conversations._header', ['conversation' => $conversation])
        </div>
        <div class="conversation-main">
            <ul class="conversation-wrapper-{{ $conversation->id }}"  data-conversation-id="{{ $conversation->id }}">
                @include('conversations._chat')
            </ul>
        </div>
        @include('conversations._message', ['conversation_id' => $conversation->id])
    </div>
@endforeach
