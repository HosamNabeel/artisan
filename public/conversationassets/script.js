document.addEventListener('click', (event) => {

    // تحديد العناصر الأساسية
    const target = event.target; // العنصر الذي تم النقر عليه
    const menuItems = document.querySelectorAll('.chat-sidebar-menu li');
    const sections = document.querySelectorAll('.content-section');
    const groupItem = document.querySelector('.chat-sidebar-groups');
    const groupDropdown = document.querySelector('.chat-sidebar-groups-dropdown');

    // التحقق إذا كان النقر خارج القائمة المنسدلة لإغلاقها
    if (!groupItem.contains(target) && !groupDropdown.contains(target)) {
        groupDropdown.style.display = 'none';
    }

    // إذا كان العنصر عنصر قائمة جانبية
    if (target.closest('.chat-sidebar-menu li')) {
        const clickedItem = target.closest('.chat-sidebar-menu li');

        // إذا كان العنصر ليس القروب
        if (!clickedItem.classList.contains('chat-sidebar-groups')) {
            // تحديث الأقسام: إخفاء جميع الأقسام وإظهار القسم المرتبط
            const sectionId = clickedItem.getAttribute('data-section');
            sections.forEach(section => section.classList.remove('active'));
            if (sectionId) {
                const targetSection = document.getElementById(sectionId);
                if (targetSection) targetSection.classList.add('active');
            }

            // إخفاء القائمة المنسدلة
            groupDropdown.style.display = 'none';
        } else {
            // إذا كان العنصر هو القروب: عرض/إخفاء القائمة المنسدلة
            groupDropdown.style.display = groupDropdown.style.display === 'block' ? 'none' : 'block';
        }

        // تحديث العنصر النشط في القائمة الجانبية
        menuItems.forEach(item => item.classList.remove('active'));
        clickedItem.classList.add('active');
    }

    // إذا كان العنصر في القائمة المنسدلة للقروب
    if (target.closest('.chat-sidebar-groups-dropdown li a')) {
        const link = target.closest('.chat-sidebar-groups-dropdown li a');
        const sectionId = link.getAttribute('data-section');
        if (sectionId) {
            // تحديث الأقسام: إظهار القسم المرتبط
            sections.forEach(section => section.classList.remove('active'));
            const targetSection = document.getElementById(sectionId);
            if (targetSection) targetSection.classList.add('active');
        }

        // إخفاء القائمة المنسدلة
        groupDropdown.style.display = 'none';
    }
});



// start: Coversation
document.querySelectorAll('.conversation-item-dropdown-toggle').forEach(function(item) {
    item.addEventListener('click', function(e) {
        e.preventDefault()
        if(this.parentElement.classList.contains('active')) {
            this.parentElement.classList.remove('active')
        } else {
            document.querySelectorAll('.conversation-item-dropdown').forEach(function(i) {
                i.classList.remove('active')
            })
            this.parentElement.classList.add('active')
        }
    })
})

document.addEventListener('click', function(e) {
    if(!e.target.matches('.conversation-item-dropdown, .conversation-item-dropdown *')) {
        document.querySelectorAll('.conversation-item-dropdown').forEach(function(i) {
            i.classList.remove('active')
        })
    }
})

document.querySelectorAll('.conversation-form-input').forEach(function(item) {
    item.addEventListener('input', function() {
        this.rows = this.value.split('\n').length
    })
})

document.querySelectorAll('[data-conversation]').forEach(function(item) {
    item.addEventListener('click', function(e) {
        e.preventDefault();

        // إزالة الفعالية عن المحادثات الأخرى
        document.querySelectorAll('.conversation').forEach(function(i) {
            i.classList.remove('active');
        });

        // تعيين المحادثة النشطة
        const conversationSelector = this.dataset.conversation;
        const targetConversation = document.querySelector(conversationSelector);
        if (targetConversation) {
            targetConversation.classList.add('active');

            // العثور على عنصر الرسائل داخل المحادثة
            const wrapperElement = targetConversation.querySelector('.conversation-wrapper');
            if (wrapperElement) {
                // التمرير إلى أسفل المحادثة (أخر رسالة)
                wrapperElement.scrollTop = wrapperElement.scrollHeight;
            }
        }
    });
});





document.querySelectorAll('.conversation-back').forEach(function(item) {
    item.addEventListener('click', function(e) {
        e.preventDefault()
        this.closest('.conversation').classList.remove('active')
        document.querySelector('.conversation-default').classList.add('active')
    })
})
// end: Coversation

// create new group
// تحديد العناصر الرئيسية
const modal = document.getElementById('createGroupModal');
const groupDropdownButton = document.querySelector('.chat-sidebar-groups'); // الزر الخاص بالقائمة المنسدلة
const closeModalButton = document.getElementById('closeGroupModalButton');
const cancelModalButton = document.getElementById('cancelGroupModalButton');

// إظهار المودال عند الضغط على زر القائمة المنسدلة
groupDropdownButton.addEventListener('click', () => {
    modal.style.display = 'flex';
});

// إغلاق المودال عند الضغط على زر الإغلاق أو زر الإلغاء
[closeModalButton, cancelModalButton].forEach(button => {
    button.addEventListener('click', () => {
        modal.style.display = 'none';
    });
});

// إغلاق المودال عند النقر خارج محتواه
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

let checkboxes = 0;
document.querySelectorAll('.friend-item').forEach(item => {
    item.addEventListener('click', () => {
        const checkbox = item.querySelector('input[type="checkbox"]');
        const selectedCountSpan = document.getElementById('selected-count');
        console.log(checkboxes);

        // عكس حالة التحديد
        checkbox.checked = !checkbox.checked;

        // تحديث تصميم العنصر
        if (checkbox.checked) {
            item.classList.add('active');
            checkboxes += 1;
        } else {
            item.classList.remove('active');
            checkboxes -= 1;
        }

        selectedCountSpan.textContent = checkboxes;
        console.log(checkboxes);
    });
});
// عرض معاينة الصورة عند اختيار صورة جديدة
document.getElementById('groupImageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('groupImagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});



// // التحقق من اختيار الأعضاء عند إرسال النموذج
// createGroupForm.addEventListener('submit', (event) => {
//     event.preventDefault(); // منع إرسال النموذج الافتراضي

//     // التحقق من اختيار الأعضاء
//     const selectedMembers = friendsListContainer.querySelectorAll('input[type="checkbox"]:checked');
//     if (selectedMembers.length === 0) {
//         alert('Please select at least one member to create a group.');
//         return; // إيقاف العملية إذا لم يتم اختيار أي عضو
//     }

//     // الحصول على اسم القروب
//     const groupName = document.getElementById('groupName').value.trim();
//     if (!groupName) {
//         alert('Please enter a group name.');
//         return; // إيقاف العملية إذا لم يتم إدخال اسم القروب
//     }

//     // رسالة تأكيد
//     alert(`Group "${groupName}" created successfully with ${selectedMembers.length} member(s).`);

//     // إعادة تعيين النموذج
//     createGroupForm.reset();
//     modal.style.display = 'none';
// });
// end: create new group

// modal to view file
const fileInput = document.getElementById('file');
const lastFilePreview = document.getElementById('last-file-preview');
const lastFileName = document.getElementById('last-file-name');
const viewAllButton = document.getElementById('view-all-button');
const fileModal = document.getElementById('file-modal');
const allFilesContainer = document.getElementById('all-files-container');
const closeModal = document.getElementById('close-modal');

let selectedFiles = [];

// عند اختيار الملفات
fileInput.addEventListener('change', function (event) {
    const files = Array.from(event.target.files);

    if (files.length > 0) {
        selectedFiles = files; // حفظ الملفات

        // عرض آخر ملف فقط
        const lastFile = files[files.length - 1];
        lastFileName.textContent = lastFile.name;

        // إظهار منطقة آخر ملف
        lastFilePreview.style.display = 'flex';
    }
});

// عند الضغط على "عرض الكل"
viewAllButton.addEventListener('click', function () {
    allFilesContainer.innerHTML = ''; // تفريغ المحتوى السابق

    // عرض جميع الملفات في المودال
    selectedFiles.forEach((file, index) => {
        const fileItem = document.createElement('div');
        fileItem.classList.add('file-item');

        const fileName = document.createElement('span');
        fileName.textContent = file.name;

        const removeButton = document.createElement('button');
        removeButton.textContent = 'حذف';
        removeButton.classList.add('btn-primary');
        removeButton.style.backgroundColor = '#ff4d4f';

        // حدث حذف الملف
        removeButton.addEventListener('click', function () {
            selectedFiles.splice(index, 1);
            updateModal();
            if (selectedFiles.length > 0) {
                const lastFile = selectedFiles[selectedFiles.length - 1];
                lastFileName.textContent = lastFile.name;
            } else {
                lastFilePreview.style.display = 'none';
            }
        });

        fileItem.appendChild(fileName);
        fileItem.appendChild(removeButton);
        allFilesContainer.appendChild(fileItem);
    });

    // إظهار المودال
    fileModal.style.display = 'flex';
});

// تحديث المودال بعد حذف ملف
function updateModal() {
    allFilesContainer.innerHTML = ''; // مسح المحتوى القديم
    viewAllButton.click(); // إعادة العرض
}

// إغلاق المودال
closeModal.addEventListener('click', function () {
    fileModal.style.display = 'none';
});

const file_modal = document.getElementById('file-modal');
window.addEventListener('click', function(event) {
    if (event.target === file_modal) {
        file_modal.style.display = 'none';
    }
});
// end: modal to view file

// فتح الـ Modal وعرض الصورة
function openImageModal(imageUrl) {
    var modalOpenImage = document.getElementById("imageModal");
    var modalImage = document.getElementById("modalImage");

    modalImage.src = imageUrl;
    modalOpenImage.style.display = "block";
}

function closeImageModal() {
    var modalOpenImage = document.getElementById("imageModal");
    modalOpenImage.style.display = "none"; // إخفاء المودال عند الضغط على الـ X
}

document.querySelectorAll('.close-img').forEach(function(button) {
    button.addEventListener('click', function(event) {
        var modal = button.closest('.modal-img');
        modal.style.display = 'none';
    });
});


// document.querySelector('#sendMessageForm').addEventListener('submit', function (e) {
//     e.preventDefault();  // منع التحديث التلقائي للصفحة

//     const formData = new FormData(this);
//     fetch("{{ route('conversations.show') }}", {
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         },
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         // هنا يمكن إضافة الكود لعرض الرسالة المرسلة في الـ DOM
//         console.log('Message sent', data);
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// });

// window.Echo.channel('conversation.' + conversationId)
//     .listen('MessageSent', (event) => {
//         console.log('New message:', event.message);
//         console.log('Sender:', event.sender_id);  // هذا هو كائن المرسل

//         // الوصول إلى الصورة من كائن المرسل
//         const senderImage = event.sender.image ?? 'default-image.jpg'; // استخدم صورة المرسل أو صورة افتراضية

//         // بناء الرسالة الجديدة
//         const messageContainer = document.querySelector('.conversation-wrapper');
//         const newMessage = document.createElement('li');
//         newMessage.classList.add('conversation-item');

//         newMessage.innerHTML = `
//             <div class="conversation-item-side">
//                 <img class="conversation-item-image" src="${senderImage}" alt="Sender Image">
//             </div>
//             <div class="conversation-item-content">
//                 <div class="conversation-item-wrapper">
//                     <div class="conversation-item-box">
//                         <div class="conversation-item-text">
//                             ${event.message}
//                             <div class="conversation-item-time">${event.timestamp}</div>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         `;

//         // إضافة الرسالة إلى المحادثة
//         messageContainer.appendChild(newMessage);

//         // التمرير لأسفل لعرض الرسالة الأخيرة
//         messageContainer.scrollTop = messageContainer.scrollHeight;
//     });

// document.getElementById('messageForm').addEventListener('submit', function (e) {
//     e.preventDefault(); // منع إعادة تحميل الصفحة

//     const formData = new FormData(this); // الحصول على بيانات النموذج
//     const url = this.action; // عنوان الـ action المرسل للنموذج

//     fetch(url, {
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         },
//         body: formData,
//     })
//     .then(response => {
//         if (!response.ok) {
//             // إذا كان هناك خطأ HTTP (مثل 404 أو 500)
//             throw new Error(`HTTP error! Status: ${response.status}`);
//         }
//         return response.json(); // حاول تحويل الرد إلى JSON
//     })
//     .then(data => {
//         console.log('Response:', data);

//         // التعامل مع البيانات المستلمة
//         const messagesContainer = document.querySelector('.conversation-wrapper');
//         const newMessage = document.createElement('li');
//         newMessage.classList.add('conversation-item', 'me');
//         newMessage.innerHTML = `
//             <div class="conversation-item-side">
//                 <img class="conversation-item-image" src="${data.sender.image}" alt="Sender Image">
//             </div>
//             <div class="conversation-item-content">
//                 <div class="conversation-item-wrapper">
//                     <div class="conversation-item-box">
//                         <div class="conversation-item-text">
//                             <p>${data.message}</p>
//                             <div class="conversation-item-time">${new Date(data.timestamp).toLocaleTimeString()}</div>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         `;
//         messagesContainer.appendChild(newMessage);
//         messagesContainer.scrollTop = messagesContainer.scrollHeight;
//         document.getElementById('messageForm').reset();
//     })
//     .catch(error => {
//         console.error('Error:', error); // طباعة الخطأ لمعرفة المشكلة
//     });

// });


document.getElementById('messageForm').addEventListener('submit', function (e) {
    e.preventDefault(); // منع إعادة تحميل الصفحة

    const formData = new FormData(this); // الحصول على بيانات النموذج
    const url = this.action; // عنوان الـ action المرسل للنموذج

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // ضمان أمان الطلب
        },
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Response:', data);

        // إضافة الرسالة الجديدة إلى الواجهة دون تحديث الصفحة
        const messagesContainer = document.querySelector('.conversation-wrapper-' + data.conversation_id);
        const newMessage = document.createElement('li');
        newMessage.classList.add('conversation-item', 'me');

        newMessage.innerHTML = `
            <div class="conversation-item-side">
                <img class="conversation-item-image" src="${data.sender.image}" alt="Sender Image">
            </div>
            <div class="conversation-item-content">
                <div class="conversation-item-wrapper">
                    <div class="conversation-item-box">
                        <div class="conversation-item-text">
                            <p>${data.message}</p>
                            <div class="conversation-item-time">${new Date(data.timestamp).toLocaleTimeString()}</div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        messagesContainer.appendChild(newMessage);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        // إعادة تعيين الحقول في النموذج
        document.getElementById('messageForm').reset();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
