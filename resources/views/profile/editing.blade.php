
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الملف الشخصي</title>
    <link rel="stylesheet" href="{{ asset('profileassets/css/editing.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="back-button">
        <button onclick="window.history.back()">
            <i class="fa fa-arrow-left"></i>
        </button>
    </div>

    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            إعدادات الحساب
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">عام</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">تغيير كلمة المرور</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">المعلومات</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">الروابط الاجتماعية</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">وسائل التواصل</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">الإشعارات</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80 fixed-avatar" id="preview-image">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        رفع صورة جديدة
                                        <input type="file" id="image-upload" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" id="reset-button" class="btn btn-default md-btn-flat">إعادة تعيين</button>
                                    <div class="text-light small mt-1">الصور المسموحة بامتداد JPG, GIF او PNG. الحجم الأقصى للصورة 800 كيلوبايت</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">اسم المستخدم</label>
                                    <input type="text" class="form-control mb-1" placeholder="{{ auth()->user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">الايميل</label>
                                    <input type="text" class="form-control mb-1" placeholder="{{ auth()->user()->email }}">
                                    {{-- <div class="alert alert-warning mt-3">
                                        .لم يتم تأكيد بريدك الإلكتروني. يرجى التحقق من صندوق الوارد الخاص بك<br>
                                        <a href="javascript:void(0)">إعادة إرسال التأكيد</a>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label class="form-label">الجنس</label>
                                    <select class="form-control" name="gender">
                                        <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                                        <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>أنثى</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">الشركة</label>
                                    <input type="text" class="form-control" placeholder="Company Ltd." >
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الحالية</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">تأكيد كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">القصة</label>
                                    <textarea class="form-control"
                                        rows="5"> {{ auth()->user()->story }} </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">تاريخ الميلاد</label>
                                    <input type="text" class="form-control" placeholder="{{ auth()->user()->birthday }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">الدولة</label>
                                    <select class="custom-select">
                                        <option>الولايات المتحدة الأمريكية</option>
                                        <option selected>كندا</option>
                                        <option>المملكة المتحدة</option>
                                        <option>ألمانيا</option>
                                        <option>فرنسا</option>
                                        <option>قطر</option>
                                        <option>مصر</option>
                                        <option>السعودية</option>
                                        <option>الأراضي الفلسطينية</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">التواصل</h6>
                                <div class="form-group">
                                    <label class="form-label">رقم الجوال</label>
                                    <input type="text" class="form-control" placeholder="{{ auth()->user()->phone }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">الموقع الالكتروني</label>
                                    <input type="text" class="form-control" value placeholder="{{ auth()->user()->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" placeholder="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" placeholder="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Google+</label>
                                    <input type="text" class="form-control" placeholder = "https://www.google.account.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" placeholder="https://www.LinkedIn.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" placeholder="https://www.instagram.com/user">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="card-body">
                                <button type="button" class="btn btn-twitter">الاتصال مع
                                    <strong>تويتر</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                            class="ion ion-md-close"></i> إزالة</a>
                                    <i class="ion ion-logo-google text-google"></i>
                                    أنت متصل ب جوجل
                                </h5>
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="f9979498818e9c9595b994989095d79a9694">[الايميل&#160;محمي]</a>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-facebook">الاتصال مع
                                    <strong>فيسبوك</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-instagram">الاتصال مع
                                    <strong>انستغرام</strong></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">النشاط</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">أرسل لي بريدًا إلكترونيًا إذا كان لديك أي تعليقات عني</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">أرسل لي بريدًا إلكترونيًا عندما يجيب شخص ما على موضوع المنتدى الخاص بي</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">أرسل لي بريدًا إلكترونيًا عندما يتابعني شخص ما</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">التطبيقات</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">الأخبار والإعلانات</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">تحديثات المنتج الاسبوعية</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">ملخص المدونة الاسبوعي</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" class="btn btn-primary">حفظ التغييرات</button>&nbsp;
            <button type="button" class="btn btn-default">إلغاء</button>
        </div>
    </div>

    <script src="{{ asset('profileassets/js/editing.js') }}"></script>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
