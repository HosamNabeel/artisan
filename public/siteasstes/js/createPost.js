document.getElementById('post-image').addEventListener('change', function(event) {
    var fileInput = event.target;
    var fileCount = fileInput.files.length;

    // إذا كان هناك ملفات مرفوعة، عرض أول صورة
    if (fileCount > 0) {
        // العثور على العدد داخل الأيقونة
        var countDiv = document.getElementById('carousel-count');
        countDiv.style.display = 'block'; // إظهار العدد
        countDiv.textContent = `${fileCount}+`; // تحديث العدد المعروض

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            // تحديث الصورة المعروضة بـ image التي تم رفعها
            document.getElementById('upload-icon').src = e.target.result;
        }

        reader.readAsDataURL(file); // قراءة الصورة وتحويلها إلى رابط يمكن عرضه في الـ img

        // تحديث عدد الصور المرفوعة
        document.getElementById('image-count').textContent = 'عدد الصور المرفوعة: ' + fileCount;
    }


});
