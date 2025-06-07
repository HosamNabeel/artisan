<head>
    <link rel="stylesheet" href="{{ asset('registerassets/style.css') }}">
</head>
<div class="container">
    <header>انشاء حساب</header>
    <div class="progress-bar">
        <div class="step">
            <p>الاسم</p>
            <div class="bullet">
                <span>1</span>
            </div>
            <div class="check fas fa-check"></div>
        </div>
        <div class="step">
            <p>التواصل</p>
            <div class="bullet">
                <span>2</span>
            </div>
            <div class="check fas fa-check"></div>
        </div>
        <div class="step">
            <p>الميلاد</p>
            <div class="bullet">
                <span>3</span>
            </div>
            <div class="check fas fa-check"></div>
        </div>
        <div class="step">
            <p>التسجيل</p>
            <div class="bullet">
                <span>4</span>
            </div>
            <div class="check fas fa-check"></div>
        </div>

    </div>
    <div class="form-outer">
        <form  method="post" action="{{ route('register') }}">
            @csrf
            <div class="page slide-page">
                <div class="title">المعلومات الرئيسية:</div>
                <div class="field">
                    <div class="label">الاسم:</div>
                    <input  name="name"  id="name" placeholder="الاسم" type="text"
                    autofocus class="input-field">
                    <div id="nameError" class="error-message">الاسم مطلوب</div>

                </div>
                <div class="field">
                    <div class="label">عنوان الايميل:</div>
                    <input  name="email"  id="email" placeholder="الايميل" type="text"
                    required="" class="input-field">
                    <span id="emailError" class="error-message">البريد الإلكتروني غير صحيح أو مستخدم</span>
                </div>
                <div class="fieldButtons">
                    <button type="button" class="firstNext next">التالي</button>
                </div>
            </div>

            <div class="page">
                <div class="title">معلومات التواصل:</div>
                <div class="field">
                    <div class="label">رقم الجوال:</div>
                    <input  name="phone"  id="phone" placeholder="رقم الجوال" type="text"
                    required="" class="input-field">
                    <div id="phoneError" class="error-message">رقم الجوال غير صحيح</div>
                </div>
                <div class="field">
                    <div class="label">العنوان:</div>
                    <input  name="address"  id="address" placeholder="العنوان" type="text"
                    required="" class="input-field">
                    <div id="addressError" class="error-message">هذا الحقل مطلوب</div>
                </div>
                <div class="fieldButtons btns">
                    <button type="button" class="prev-1 prev">السابق</button>
                    <button type="button" class="next-1 next">التالي</button>
                </div>
            </div>

            <div class="page">
                <div class="title">معلومات الميلاد:</div>
                <div class="field">
                    <div class="label">تاريخ الميلاد</div>
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
                    <div id="dateError" class="error-message">ادخل تاريخ الميلاد</div>
                </div>
                <div class="field">
                    <div class="label">الجنس:</div>
                    <select name="gender">
                        <option>ذكر</option>
                        <option>أنثى</option>
                    </select>
                </div>
                <div class="fieldButtons btns">
                    <button type="button" class="prev-2 prev">السابق</button>
                    <button type="button" class="next-2 next">التالي</button>
                </div>
            </div>

            <div class="page">
                <div class="title">معلومات التأكيد:</div>
                <div class="field">
                    <div class="label">كلمة السر</div>
                    <input  name="password"  id="password" placeholder="كلمة السر" type="password"
                    required="" class="input-field">
                    <div id="passwordError" class="error-message">ادخل كلمة مرور</div>
                    <div id="numPasswordError" class="error-message">كلمة المرور على الأقل 8 حروف</div>
                </div>
                <div class="field">
                    <div class="label">تأكيد كلمة السر</div>
                    <input  name="password_confirmation"  id="confirm-password" placeholder="تأكيد كلمة المرور" type="password"
                    required="" class="input-field">
                    <div id="confPasswordError" class="error-message">ادخل كلمة مرور</div>
                    <div id="matchPasswordError" class="error-message">كلمة المرور غير متطابقة</div>
                </div>
                <div class="fieldButtons btns">
                    <button type="button" class="prev-3 prev">السابق</button>
                    <button type="submit" class="submit">تسجيل</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('registerassets/script.js') }}"></script>
