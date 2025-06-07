<!-- مودال إنشاء القروب -->
<div id="createGroupModal" class="modal-createGroup">
    <div class="modal-content-createGroup">
        <span id="closeGroupModalButton" class="close">&times;</span>
        <h2>Create a New Group</h2>
        <form id="createGroupForm">
            <!-- صورة القروب -->
            <div class="group-image-container">
                <label for="groupImageInput" class="group-image-label">
                    <img src="https://i.pinimg.com/736x/ea/d3/9e/ead39e3080d176f6c0ad4b5ba21c6d53.jpg" alt="Group Image"
                        class="group-image" id="groupImagePreview">
                    <span class="upload-text">Upload</span>
                </label>
                <input type="file" id="groupImageInput" name="groupImage" accept="image/*">
            </div>
            <div class="form-group">
                <label for="groupName">Group Name</label>
                <input type="text" id="groupName" name="groupName" placeholder="Enter group name" required>
            </div>
            <div class="form-group">
                <label for="groupDescription">Description</label>
                <textarea id="groupDescription" name="groupDescription" placeholder="Enter group description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <div class="select-members-container">
                    <span class="select-text">Select Members</span>
                    <span id="selected-count" class="count">0</span><span class="members-text"> Members Selected</span>
                </div>
                <div class="friends-container">
                    <div class="friend-item" data-id="1">
                        <img src="path/to/john-doe.jpg" alt="John Doe" class="friend-image">
                        <span>John Doe</span>
                        <input type="checkbox" name="members[]" value="1">
                    </div>
                    <div class="friend-item" data-id="2">
                        <img src="path/to/jane-smith.jpg" alt="Jane Smith" class="friend-image">
                        <span>Jane Smith</span>
                        <input type="checkbox" name="members[]" value="2">
                    </div>
                    <div class="friend-item" data-id="2">
                        <img src="path/to/jane-smith.jpg" alt="Jane Smith" class="friend-image">
                        <span>Jane Smith</span>
                        <input type="checkbox" name="members[]" value="2">
                    </div>
                    <div class="friend-item" data-id="2">
                        <img src="path/to/jane-smith.jpg" alt="Jane Smith" class="friend-image">
                        <span>Jane Smith</span>
                        <input type="checkbox" name="members[]" value="4">
                    </div>
                    <div class="friend-item" data-id="2">
                        <img src="path/to/jane-smith.jpg" alt="Jane Smith" class="friend-image">
                        <span>Jane Smith</span>
                        <input type="checkbox" name="members[]" value="2">
                    </div>
                    <div class="friend-item" data-id="2">
                        <img src="path/to/jane-smith.jpg" alt="Jane Smith" class="friend-image">
                        <span>Jane Smith</span>
                        <input type="checkbox" name="members[]" value="2">
                    </div>
                    <!-- إضافة بقية الأصدقاء هنا -->
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-secondary" id="cancelGroupModalButton">Cancel</button>
            </div>
        </form>
    </div>
</div>
