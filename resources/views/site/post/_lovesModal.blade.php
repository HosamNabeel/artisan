<div id="lovesModal" class="modal">
    <div class="modal-content">
        <span id="closeLovesModal" class="close-button">&times;</span>
        <h2>المعجبون ({{ $post->loves->count() }})</h2>
        <ul class="followers-list">
            @foreach ($post->loves as $love)
                <div class="follow-item">
                    <div class="user-info">
                        <img src="{{ asset('mainassets/img/ahmad.jpg') }}" alt="User Image"
                            class="user-image">
                        <div class="user-details">
                            <a href="{{ route('profile.show',$love->user->id) }}" style="text-decoration: none;">
                                <p class="username">{{ $love->user->name }}</p>
                            </a>
                            <p class="num-followers">15 متابع</p>
                        </div>
                    </div>
                    @if (auth()->user()->id != $love->user->id && !auth()->user()->following()->where('follow_id', $love->user->id)->exists())
                        <form action="{{ route('follow.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $love->user->id }}">
                            <button class="follow-btn">متابعة</button>
                        </form>
                    @elseif (auth()->user()->id != $love->user->id)
                        <form action="{{ route('follow.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $love->user->id }}">
                            <button class="unfollow-btn" wire:click="deleteFollow">تتابع</button>
                        </form>
                    @endif
                    {{-- <button class="follow-btn"><i class="fa-sharp fa-solid fa-user-plus"></i>
                        متابعة </button> --}}
                </div>
            @endforeach
        </ul>
    </div>
</div>
