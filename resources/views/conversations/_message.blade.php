<form id="messageForm" method="post" action="{{ route('conversations.show') }}"  enctype="multipart/form-data">
    @csrf
    <div class="conversation-form">
        <div class="file-upload">
            <label for="file">
                <i class="ri-attachment-line"></i>
                <input type="file" id="file" name="files[]" multiple>
            </label>
        </div>
        <!-- منطقة عرض آخر ملف -->
        <div id="last-file-preview" class="file-preview" style="display: none;">
            <div class="last-file-item">
                <span id="last-file-name"></span>
                <button type="button" id="view-all-button" class="btn-primary">عرض الكل</button>
            </div>
        </div>
        <!-- مودال عرض جميع الملفات -->
        <div id="file-modal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" id="close-modal">&times;</span>
                <h3>الملفات المختارة</h3>
                <div id="all-files-container"></div>
            </div>
        </div>
        <div class="conversation-form-group">
            <textarea name="message" id="message" class="conversation-form-input" rows="1" placeholder="Type here..."></textarea>
            <input type="hidden" name="conversation_id" value="{{ $conversation->id }}">
            @if ($conversation->id == 0)
                @php
                    $resever_id = $conversation->users->where('id', '!=', auth()->id())->first()->id ?? null;
                @endphp
                <input type="hidden" name="resever_id" value="{{ $resever_id }}">
            @endif
            <button type="button" class="conversation-form-record"><i class="ri-mic-line"></i></button>
        </div>
        <button type="submit" class="conversation-form-button conversation-form-submit"><i
                class="ri-send-plane-2-line"></i></button>
    </div>
</form>
