@php
    $messages = $conversation->messages;
    $fileIcons = [
        'pdf' => 'ri-file-pdf-line',
        'doc' => 'ri-file-word-line',
        'docx' => 'ri-file-word-line',
        'xls' => 'ri-file-excel-line',
        'xlsx' => 'ri-file-excel-line',
        'default' => 'ri-file-line',
    ];
    $lastMessageDate = null;
@endphp

@foreach ($messages as $message)
    @php
        $messageDate = $message->created_at->format('Y-m-d');
        $messageClass = $message->sender_id == auth()->id() ? 'me' : '';
    @endphp

    @if ($lastMessageDate !== $messageDate)
        <div class="coversation-divider">
            <span>{{ $message->created_at->format('F j, Y') }}</span>
        </div>
        @php
            $lastMessageDate = $messageDate;
        @endphp
    @endif

    <li class="conversation-item {{ $messageClass }}">
        <div class="conversation-item-side">
            <img class="conversation-item-image" src="{{ $message->sender->image ?? asset('default-image.jpg') }}"
                alt="Sender Image">
        </div>
        <div class="conversation-item-content">
            <div class="conversation-item-wrapper">
                <div class="conversation-item-box">
                    <div class="conversation-item-text">
                        @if ($message->files->isNotEmpty())
                            <div class="message-files">
                                @foreach ($message->files as $file)
                                    @php
                                        $fileExtension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                                        $iconClass = $fileIcons[$fileExtension] ?? $fileIcons['default'];
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <div class="file-thumbnail">
                                            <img src="{{ asset($file->file_path) }}" alt="File Preview"
                                                onclick="openImageModal('{{ asset($file->file_path) }}')">
                                        </div>
                                    @elseif (str_contains($file->file_type, 'video'))
                                        <video controls class="conversation-file-video">
                                            <source src="{{ asset($file->file_path) }}" type="{{ $file->file_type }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <div class="file-item-chat">
                                            <div class="file-icon-chat">
                                                <i class="{{ $iconClass }}"></i>
                                            </div>
                                            <div class="file-name-chat">
                                                <a href="{{ asset($file->file_path) }}"
                                                    target="_blank">{{ basename($file->file_path) }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        @if (!empty($message->message))
                            <p>{{ $message->message }}</p>
                        @endif
                        <div class="conversation-item-time">{{ $message->created_at->format('h:i A') }}</div>
                    </div>
                    <div class="conversation-item-dropdown">
                        <button type="button" class="conversation-item-dropdown-toggle"><i
                                class="ri-more-2-line"></i></button>
                        <ul class="conversation-item-dropdown-list">
                            <li><a href="#"><i class="ri-share-forward-line"></i> Forward</a></li>
                            <li><a href="#"><i class="ri-delete-bin-line"></i> Delete</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
<div id="imageModal" class="modal-img">
    <button class="close-img" onclick="closeModal()">X</button>
    <div class="modal-content-img">
        <img id="modalImage" class="modal-image" src="" alt="">
    </div>
</div>
