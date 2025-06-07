@php
    $img = null;
    $name = null;
    if ($conversation->type == 'individual'){
        $user = $conversation->users->where('id', '!=', auth()->id())->first() ?? null;
        $img = $user->image;
        $name = $user->name;
    }else{
        $img = $conversation->group->image;
        $name = $conversation->group->name;
    }
@endphp

<button type="button" class="conversation-back">
    <i class="ri-arrow-left-line"></i></button>
<div class="conversation-user">
    <img class="conversation-user-image"
        src="{{$img}}" alt="">
    <div>
        <div class="conversation-user-name">
            {{$name}}
        </div>
        <div class="conversation-user-status online">online</div>
    </div>
</div>
<div class="conversation-buttons">
    <button type="button"><i class="ri-phone-fill"></i></button>
    <button type="button"><i class="ri-vidicon-line"></i></button>
    <button type="button"><i class="ri-information-line"></i></button>
</div>
