const imageUpload = document.getElementById('image-upload');
const previewImage = document.getElementById('preview-image');
const resetButton = document.getElementById('reset-button');

// حفظ الصورة الأصلية لإعادة التعيين
const originalImageSrc = previewImage.src;

// عند اختيار صورة جديدة
imageUpload.addEventListener('change', function(event) {
    const file = event.target.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;  // عرض الصورة المرفوعة
        }

        reader.readAsDataURL(file);
    } else {
        alert('يرجى اختيار صورة بصيغة JPG أو PNG أو GIF.');
    }
});

// إعادة تعيين الصورة الأصلية عند الضغط على زر إعادة تعيين
resetButton.addEventListener('click', function() {
    previewImage.src = originalImageSrc;
    imageUpload.value = '';  // مسح الاختيار
});
